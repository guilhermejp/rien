<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_assistance extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('View_assistance_model');
            $this->db->cache_off();
        }
        
        // Function for update datatable via AJAX
        public function ajax_list($period_start=false, $period_end=false){
            if(!$this->session->userdata('username')){ redirect('user/login'); return false; }
            
                if($period_start != false){
                   $p_start = DateTime::createFromFormat('Ymd', $period_start)->format('Y-m-d');
                }else{
                    $p_start = false;
                }

                if($period_end != false){
                    $p_end = DateTime::createFromFormat('Ymd', $period_end)->format('Y-m-d'); 
                }else{
                    $p_end = false;
                }

		$list = $this->View_assistance_model->get_datatables($this->input->post('start'), $this->input->post('length'), $this->input->post('search[value]'), $this->input->post('order'), $p_start, $p_end);
		$data = array();
		$no = @$this->input->post('start');
		foreach ($list as $assistance) {
			$no++;
			$row = array();
			$row[] = $assistance->id;
                        $row[] = $assistance->date;
                        $row[] = $assistance->hospital;
                        $row[] = $assistance->nm;
                        $row[] = $assistance->patient;
                        $row[] = $assistance->bed;
                        $row[] = $assistance->technician;
                        $row[] = $assistance->technician2;
                        $row[] = $assistance->technician3;
                        $row[] = $assistance->destination;
                        $row[] = $assistance->sus;
                        $row[] = $assistance->proc;
                        $row[] = $assistance->time;
                        $row[] = substr($assistance->start,0,5);
                        $row[] = substr($assistance->end,0,5);
                        $row[] = $assistance->access;
                        $row[] = $assistance->site;
                        $row[] = $assistance->precaution==1?"Sim":"Não";
                        $row[] = $assistance->maq;
                        $row[] = $assistance->or;
                        $row[] = $assistance->home_choice;
                        $row[] = $assistance->doctor;
                        $row[] = $assistance->agreement;
                        $row[] = $assistance->note;
                        $row[] = $assistance->situation;
			$data[] = $row;
		}

                $output = array(
                            "draw" => @$this->input->post('draw'),
                            "recordsTotal" => $this->View_assistance_model->count_all(),
                            "recordsFiltered" => $this->View_assistance_model->count_filtered($this->input->post('search[value]'), $this->input->post('order')),
                            "data" => $data,
                        );
                
		//output to json format
		echo json_encode($output);
                return true;

	}
               
}
