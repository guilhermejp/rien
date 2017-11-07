<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assistance extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Assistance_model');
            $this->load->model('Hospital_model');
            $this->load->model('Technician_model');
            $this->load->model('Doctor_model');
            $this->load->model('Agreement_model');
            $this->db->cache_off();
        }
        
        public function index(){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }

            $data['hospitals'] = $this->Hospital_model->get_all();
            $data['technicians'] = $this->Technician_model->get_all();
            $data['doctors'] = $this->Doctor_model->get_all();
            $data['agreements'] = $this->Agreement_model->get_all();

            $this->load->view('assistance');
        }
        
        // Function for update datatable via AJAX
        public function ajax_list($period_start=false, $period_end=false){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }
            
                if($period_start != false){
                   $p_start = DateTime::createFromFormat('d/m/Y', $period_start)->format('Y-m-d');
                }

                if($period_end != false){
                    $p_end = DateTime::createFromFormat('d/m/Y', $period_end)->format('Y-m-d'); 
                }

		$list = $this->Assistance_model->get_datatables($this->input->post('start'), $this->input->post('lenght'), $this->input->post('search_value'), $this->input->post('order'), $p_start, $p_end);
		$data = array();
		$no = @$this->input->post('start');
		foreach ($list as $assistance) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $assistance->id;
                        $row[] = $assistance->date;
                        $row[] = $assistance->hospital;
                        $row[] = $assistance->nm;
                        $row[] = $assistance->patient;
                        $row[] = $assistance->bed;
                        $row[] = $assistance->technician;
                        $row[] = $assistance->destination;
                        $row[] = $assistance->sus;
                        $row[] = $assistance->proc;
                        $row[] = $assistance->time;
                        $row[] = $assistance->start;
                        $row[] = $assistance->end;
                        $row[] = $assistance->access;
                        $row[] = $assistance->site;
                        $row[] = $assistance->precaution;
                        $row[] = $assistance->maq;
                        $row[] = $assistance->or;
                        $row[] = $assistance->home_choice;
                        $row[] = $assistance->doctor;
                        $row[] = $assistance->agreement;
                        $row[] = $assistance->note;
			$data[] = $row;
		}

                $output = array(
                            "draw" => @$this->input->post('draw'),
                            "recordsTotal" => $this->Assistance_model->count_all(),
                            "recordsFiltered" => $this->Assistance_model->count_filtered($this->input->post('search_value'), $this->input->post('order')),
                            "data" => $data,
                        );
                
		//output to json format
		echo json_encode($output);
                return true;

	}
        
        public function save(){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }

            $config = array(
                            array(  'field' => 'hospital',
                                    'label' => 'Hospital',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Hospital deve ser preenchido')),
                            array(  'field' => 'patient',
                                    'label' => 'Paciente',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Paciente deve ser preenchido')),
                            array(  'field' => 'bed',
                                    'label' => 'Leito',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Leito deve ser preenchido')),
                            array(  'field' => 'technician',
                                    'label' => 'Técnico',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Técnico deve ser preenchido')),
                            array(  'field' => 'doctor',
                                    'label' => 'Médico',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Médico deve ser preenchido'))
                );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE){
                $erros = array('messages' => validation_errors());
                $this->load->view('assistance',$erros);
                return false;
            }

            //Search if exists Hospital in autocomplete
            $hospital_name = strtoupper(trim($input['hospital']));
            $hospital_search = $this->Hospital_model->where(array('name'=>$hospital_name))->get();

                // Hospital autocomplete detected
            if($hospital_search->id !== null){
                $hospital_id = $hospital_search->id;
                // Hospital autocomplete not detected, it will insert
            }else{
                $hospital_id = $this->Hospital_model->insert(array('name'=>$hospital_name));
            }

            //Search if exists Technician in autocomplete
            $technician_name = strtoupper(trim($input['technician']));
            $technician_search = $this->Technician_model->where(array('name'=>$technician_name))->get();

                // Technician autocomplete detected
            if($technician_search->id !== null){
                $technician_id = $technician_search->id;
                // Technician autocomplete not detected, it will insert
            }else{
                $technician_id = $this->Technician_model->insert(array('name'=>$technician_name));
            }

            //Search if exists Doctor in autocomplete
            $doctor_name = strtoupper(trim($input['doctor']));
            $doctor_search = $this->Doctor_model->where(array('name'=>$doctor_name))->get();

                // Doctor autocomplete detected
            if($doctor_search->id !== null){
                $doctor_id = $doctor_search->id;
                // Doctor autocomplete not detected, it will insert
            }else{
                $doctor_id = $this->Doctor_model->insert(array('name'=>$doctor_name));
            }

            //Search if exists Doctor in autocomplete
            $agreement_name = strtoupper(trim($input['agreement']));
            $agreement_search = $this->Agreement_model->where(array('name'=>$agreement_name))->get();

                // Agreement autocomplete detected
            if($agreement_search->id !== null){
                $agreement_id = $agreement_search->id;
                // Agreement autocomplete not detected, it will insert
            }else{
                $agreement_id = $this->Agreement_model->insert(array('name'=>$agreement_name));
            }

            $insert = array('hospital'		=> $hospital_id,
                                'nm'		=> $input['nm'],
                                'patient'	=> $input['patient'],
                                'bed'		=> $input['bed'],
                                'technician'	=> $technician_id,
                                'destination'	=> $input['destination'],
                                'sus'		=> $input['sus'],
                                'proc'		=> $input['proc'],
                                'time'		=> $input['time'],
                                'start'		=> $input['start'],
                                'end'		=> $input['end'],
                                'access'	=> $input['access'],
                                'site'		=> $input['site'],
                                'precaution'	=> $input['precaution'],
                                'maq'		=> $input['maq'],
                                'or'		=> $input['or'],
                                'home_choice'	=> $input['home_choice'],
                                'doctor'	=> $doctor_id,
                                'agreement'	=> $agreement_id,
                                'note'		=> $input['note']);
                
            if(trim($input['id']) == ""){
                // Insert
                $assistance_id = $this->Assistance_model->insert($insert);

            }else{
                // Update
                $this->Assistance_model->where('id',$assistance_id)->update($insert);
            }

            return true;
        }
        
        public function get(){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }
            
            $id = $this->input->post('id');
            $assistance = $this->Assistance_model->where('id',$id)->get();

            $this->load->view('assistance',$assistance);
            
            return true;
            
        }
               
}
