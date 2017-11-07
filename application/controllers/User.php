<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('User_model');
            $this->db->cache_off();
        }
        
        public function login(){
            
            $this->session->unset_userdata('username');
            $this->load->view('login');
            
        }
        
        public function logon(){

            $this->session->unset_userdata('username');

            if($this->input->post()){
                $data['username'] = $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->User_model->get(array('username' => $username));
                
                if($user === false || password_verify($password, $user->password) === false){
                   $data['return'] = false;
                   $data['message'] = "Usuário e/ou senha Inválidos";
                }else{
                    $this->session->set_userdata('username', $username);
                    redirect(base_url('assistance/dash'));
                    return true;
                }
                
            }
            
            $this->load->view('login', $data);
            
        }
        
}
