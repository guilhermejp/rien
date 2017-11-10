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
            $this->load->model('Patient_model');
            $this->db->cache_off();
            
        }
        
        public function index($erros=""){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }

            $hospitals = $this->Hospital_model->get_all();
            $technicians = $this->Technician_model->get_all();
            $doctors = $this->Doctor_model->get_all();
            $agreements = $this->Agreement_model->get_all();
            $patients = $this->Patient_model->get_all();

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
            
            $data['patients'] = "";
            if($patients != false){
                foreach($patients as $value){
                    $data['patients'] .= '"'.$value->name.'",';
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
            
            if($assistance->technician2 > 0){
                $technician2 = $this->Technician_model->get($assistance->technician2);
                $assistance->technician2 = $technician2->name;
            }
            
            if($assistance->technician3 > 0){
                $technician3 = $this->Technician_model->get($assistance->technician3);
                $assistance->technician3 = $technician3->name;
            }
            
            if($assistance->doctor > 0){
                $doctor = $this->Doctor_model->get($assistance->doctor);
                $assistance->doctor = $doctor->name;
            }
            
            if($assistance->patient > 0){
                $patient = $this->Patient_model->get($assistance->patient);
                $assistance->patient = $patient->name;
            }
            
            if($assistance->agreement > 0){
                $agreement = $this->Agreement_model->get($assistance->agreement);
                $assistance->agreement = $agreement->name;
            }
            
            $assistance->date = date('d/m/Y',strtotime($assistance->date));
            
            $this->index(json_decode(json_encode($assistance),true));
        }
        
        public function dash(){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }

            $this->load->view('assistance_list');
        }
        
        public function save(){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }

            $this->load->helper('security');
            
            $config = array(
                            array(  'field' => 'date',
                                    'label' => 'Data',
                                    'rules' => 'required',
                                    'errors' => array('required' => "Data deve ser preenchida<br>")),
                            array(  'field' => 'hospital',
                                    'label' => 'Hospital',
                                    'rules' => 'required',
                                    'errors' => array('required' => "Hospital deve ser preenchido<br>")),
                            array(  'field' => 'patient',
                                    'label' => 'Paciente',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Paciente deve ser preenchido<br>')),
                            array(  'field' => 'bed',
                                    'label' => 'Leito',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Leito deve ser preenchido<br>')),
                            array(  'field' => 'technician',
                                    'label' => 'Técnico',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Técnico deve ser preenchido<br>')),
                            array(  'field' => 'doctor',
                                    'label' => 'Médico',
                                    'rules' => 'required',
                                    'errors' => array('required' => 'Médico deve ser preenchido<br>'))
                );

            $input = $this->input->post();
            $this->form_validation->set_rules($config);
            $this->form_validation->set_error_delimiters('<p>', '</p>');

            if ($this->form_validation->run() == FALSE){
                $erros = array('messages' => validation_errors());
                $erros = array_merge($erros, $input);
                $this->index($erros);
                return false;
            }
            
            $encoding = mb_internal_encoding();
            //Search if exists Hospital in autocomplete
            $hospital_name = mb_strtoupper(trim($input['hospital']), $encoding);
            $hospital_search = $this->Hospital_model->where('name LIKE',$hospital_name)->get();

                // Hospital autocomplete detected
            if(is_object($hospital_search)){
                $hospital_id = $hospital_search->id;
                // Hospital autocomplete not detected, it will insert
            }else{
                $hospital_id = $this->Hospital_model->insert(array('name'=>$hospital_name));
            }

            // TECHNICIAN 1 
            //Search if exists Technician in autocomplete
            if($input['technician'] != ""){
                $technician_name = mb_strtoupper(trim($input['technician']), $encoding);
                $technician_search = $this->Technician_model->where('name LIKE',$technician_name)->get();

                    // Technician autocomplete detected
                if(is_object($technician_search)){
                    $technician_id = $technician_search->id;
                    // Technician autocomplete not detected, it will insert
                }else{
                    $technician_id = $this->Technician_model->insert(array('name'=>$technician_name));
                }
            }
            
            // TECHNICIAN 2
            //Search if exists Technician in autocomplete
            if($input['technician2'] != ""){
                $technician_name2 = mb_strtoupper(trim($input['technician2']), $encoding);
                $technician_search2 = $this->Technician_model->where('name LIKE',$technician_name2)->get();

                    // Technician autocomplete detected
                if(is_object($technician_search2)){
                    $technician_id2 = $technician_search2->id;
                    // Technician autocomplete not detected, it will insert
                }else{
                    $technician_id2 = $this->Technician_model->insert(array('name'=>$technician_name2));
                }
            }
            
            // TECHNICIAN 3
            //Search if exists Technician in autocomplete
            if($input['technician3'] != ""){
                $technician_name3 = mb_strtoupper(trim($input['technician3']), $encoding);
                $technician_search3 = $this->Technician_model->where('name LIKE',$technician_name3)->get();

                    // Technician autocomplete detected
                if(is_object($technician_search3)){
                    $technician_id3 = $technician_search3->id;
                    // Technician autocomplete not detected, it will insert
                }else{
                    $technician_id3 = $this->Technician_model->insert(array('name'=>$technician_name3));
                }
            }
            

            //Search if exists Doctor in autocomplete
            $doctor_name = mb_strtoupper(trim($input['doctor']), $encoding);
            $doctor_search = $this->Doctor_model->where('name LIKE',$doctor_name)->get();

                // Doctor autocomplete detected
            if(is_object($doctor_search)){
                $doctor_id = $doctor_search->id;
                // Doctor autocomplete not detected, it will insert
            }else{
                $doctor_id = $this->Doctor_model->insert(array('name'=>$doctor_name));
            }
            
            //Search if exists Patient in autocomplete
            $patient_name = mb_strtoupper(trim($input['patient']), $encoding);
            $patient_search = $this->Patient_model->where('name LIKE',$patient_name)->get();

                // Patient autocomplete detected
            if(is_object($patient_search)){
                $patient_id = $patient_search->id;
                // Patient autocomplete not detected, it will insert
            }else{
                $patient_id = $this->Patient_model->insert(array('name'=>$patient_name));
            }

            //Search if exists Agreement in autocomplete
            $agreement_name = mb_strtoupper(trim($input['agreement']), $encoding);
            $agreement_search = $this->Agreement_model->where('name LIKE',$agreement_name)->get();

                // Agreement autocomplete detected
            if(is_object($agreement_search)){
                $agreement_id = $agreement_search->id;
                // Agreement autocomplete not detected, it will insert
            }else{
                $agreement_id = $this->Agreement_model->insert(array('name'=>$agreement_name));
            }
            
            $date = @implode("-",@array_reverse(@explode("/", @$input['date'])));

            $insert = array(    'date'          => @$date,
                                'situation'	=> @$input['situation'],
                                'hospital'	=> @$hospital_id,
                                'nm'		=> @$input['nm'],
                                'patient'	=> @$patient_id,
                                'bed'		=> @$input['bed'],
                                'technician'	=> @$technician_id,
                                'technician2'	=> @$technician_id2,
                                'technician3'	=> @$technician_id3,
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
            
            redirect(base_url('assistance/dash'));

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
