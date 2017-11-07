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
        
        public function index($erros=""){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }

            $hospitals = $this->Hospital_model->get_all();
            $technicians = $this->Technician_model->get_all();
            $doctors = $this->Doctor_model->get_all();
            $agreements = $this->Agreement_model->get_all();

            $data['hospitals'] = "";
            if($hospitals != false){
                foreach($hospitals as $value){
                    $data['hospitals'] .= '"'.$value->name.'",';
                }
            }
            
            $data['technicians'] = "";
            if($technicians != false){
                foreach($technicians as $value){
                    $data['technicians'] .= '"'.$value->name.'",';
                }
            }
            
            $data['doctors'] = "";
            if($doctors != false){
                foreach($doctors as $value){
                    $data['doctors'] .= '"'.$value->name.'",';
                }
            }
            
            $data['agreements'] = "";
            if($agreements != false){
                foreach($agreements as $value){
                    $data['agreements'] .= '"'.$value->name.'",';
                }
            }
            if(is_array($erros)){
                $data = array_merge($data, $erros);
            }

            $this->load->view('assistance_insert', $data);
        }
        
        public function update($id=""){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }
            
            if($id == ""){
                $this->index();
                return true;
            }
            
            $assistance = $this->Assistance_model->get($id);
            
            if($assistance->hospital > 0){
                $hospital = $this->Hospital_model->get($assistance->hospital);
                $assistance->hospital = $hospital->name;
            }
            
            if($assistance->technician > 0){
                $technician = $this->Technician_model->get($assistance->technician);
                $assistance->technician = $technician->name;
            }
            
            if($assistance->doctor > 0){
                $doctor = $this->Doctor_model->get($assistance->doctor);
                $assistance->doctor = $doctor->name;
            }
            
            if($assistance->agreement > 0){
                $agreement = $this->Agreement_model->get($assistance->agreement);
                $assistance->agreement = $agreement->name;
            }
            
            
            $this->index(json_decode(json_encode($assistance),true));
        }
        
        public function dash(){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }

            $this->load->view('assistance_list');
        }
        
        // Function for update datatable via AJAX
        public function ajax_list($period_start=false, $period_end=false){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }
            
                if($period_start != false){
                   $p_start = DateTime::createFromFormat('d/m/Y', $period_start)->format('Y-m-d');
                }else{
                    $p_start = false;
                }

                if($period_end != false){
                    $p_end = DateTime::createFromFormat('d/m/Y', $period_end)->format('Y-m-d'); 
                }else{
                    $p_end = false;
                }

		$list = $this->Assistance_model->get_datatables($this->input->post('start'), $this->input->post('lenght'), $this->input->post('search_value'), $this->input->post('order'), $p_start, $p_end);
		$data = array();
		$no = @$this->input->post('start');
		foreach ($list as $assistance) {
			$no++;
			$row = array();
			$row[] = $assistance->id;
                        $row[] = date('d/m/Y',strtotime($assistance->date));
                            $hospital = $this->Hospital_model->get($assistance->hospital);
                            $row[] = is_object($hospital) ? $hospital->name : "";
                        $row[] = $assistance->nm;
                        $row[] = $assistance->patient;
                        $row[] = $assistance->bed;
                            $technician = $this->Technician_model->get($assistance->technician);
                            $row[] = is_object($technician) ? $technician->name : "";
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
                            $doctor = $this->Doctor_model->get($assistance->doctor);
                            $row[] = is_object($doctor) ? $doctor->name : "";
                            $agreement = $this->Agreement_model->get($assistance->agreement);
                            $row[] = is_object($agreement) ? $agreement->name : "";
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
                $this->index($erros);
                return false;
            }

            $input = $this->input->post();
            
            //Search if exists Hospital in autocomplete
            $hospital_name = strtoupper(trim($input['hospital']));
            $hospital_search = $this->Hospital_model->where('name LIKE',$hospital_name)->get();

                // Hospital autocomplete detected
            if(is_object($hospital_search)){
                $hospital_id = $hospital_search->id;
                // Hospital autocomplete not detected, it will insert
            }else{
                $hospital_id = $this->Hospital_model->insert(array('name'=>$hospital_name));
            }

            //Search if exists Technician in autocomplete
            $technician_name = strtoupper(trim($input['technician']));
            $technician_search = $this->Technician_model->where('name LIKE',$technician_name)->get();

                // Technician autocomplete detected
            if(is_object($technician_search)){
                $technician_id = $technician_search->id;
                // Technician autocomplete not detected, it will insert
            }else{
                $technician_id = $this->Technician_model->insert(array('name'=>$technician_name));
            }

            //Search if exists Doctor in autocomplete
            $doctor_name = strtoupper(trim($input['doctor']));
            $doctor_search = $this->Doctor_model->where('name LIKE',$doctor_name)->get();

                // Doctor autocomplete detected
            if(is_object($doctor_search)){
                $doctor_id = $doctor_search->id;
                // Doctor autocomplete not detected, it will insert
            }else{
                $doctor_id = $this->Doctor_model->insert(array('name'=>$doctor_name));
            }

            //Search if exists Doctor in autocomplete
            $agreement_name = strtoupper(trim($input['agreement']));
            $agreement_search = $this->Agreement_model->where('name LIKE',$agreement_name)->get();

                // Agreement autocomplete detected
            if(is_object($agreement_search)){
                $agreement_id = $agreement_search->id;
                // Agreement autocomplete not detected, it will insert
            }else{
                $agreement_id = $this->Agreement_model->insert(array('name'=>$agreement_name));
            }

            $insert = array('hospital'		=> @$hospital_id,
                                'nm'		=> @$input['nm'],
                                'patient'	=> @$input['patient'],
                                'bed'		=> @$input['bed'],
                                'technician'	=> @$technician_id,
                                'destination'	=> @$input['destination'],
                                'sus'		=> @$input['sus'],
                                'proc'		=> @$input['proc'],
                                'time'		=> @$input['time'],
                                'start'		=> @$input['start'],
                                'end'		=> @$input['end'],
                                'access'	=> @$input['access'],
                                'site'		=> @$input['site'],
                                'precaution'	=> @$input['precaution'],
                                'maq'		=> @$input['maq'],
                                'or'		=> @$input['or'],
                                'home_choice'	=> @$input['home_choice'],
                                'doctor'	=> @$doctor_id,
                                'agreement'	=> @$agreement_id,
                                'note'		=> @$input['note']);
                
            if(trim($input['id']) == ""){
                // Insert
                $input['id'] = $this->Assistance_model->insert($insert);
                $input['message'] = "Cadastramento efetuado com sucesso!";
                $input['result'] = true;
            }else{
                // Update
                $this->Assistance_model->where('id',$input['id'])->update($insert);
                $input['message'] = "Alteração efetuada com sucesso!";
                $input['result'] = true;
            }
            
            $this->index($input);

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
