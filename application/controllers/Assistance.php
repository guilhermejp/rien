<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assistance extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Assistance_model');
            $this->db->cache_off();
        }
        
        public function index(){
            $this->load->view('assistance');
        }
        
        public function ajax_list(){
		$list = $this->Assistance_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $customers) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $customers->FirstName;
			$row[] = $customers->LastName;
			$row[] = $customers->phone;
			$row[] = $customers->address;
			$row[] = $customers->city;
			$row[] = $customers->country;

			$data[] = $row;
		}

                $output = array(
                            "draw" => @$_POST['draw'],
                            "recordsTotal" => $this->Assistance_model->count_all(),
                            "recordsFiltered" => $this->Assistance_model->count_filtered(),
                            "data" => $data,
                        );
                
		//output to json format
		echo json_encode($output);
                print_r($_POST);
                return true;
	}
        
        public function save(){
            if(!$this->session->userdata('username')){ redirect(''); return false; }

            if($this->input->post()){
                $input = $this->input->post();
                $data['message'] = "";
                
                if(trim($input['nome']) == ""){
                    $data['return'] = false;
                    $data['message'] = "Nome deve ser preenchido";
                    echo json_encode($data);
                    return false;
                }
                if(isset($input['email'])){
                    if(trim($input['email']) == ""){
                        $data['return'] = false;
                        $data['message'] = "Email deve ser preenchido";
                        echo json_encode($data);
                        return false;
                    }
                }
                if(@$input['grupo'] != "1" && @$input['grupo'] != "9"){
                    unset($input['grupo']);
                }

                if(isset($input['senha'])){
                    if($input['senha'] != $input['conf_senha']){
                        $data['return'] = false;
                        $data['message'] = "As senhas não são idênticas!";
                        echo json_encode($data);
                        return false;
                    }
                    if($input['senha'] == ""){
                        unset($input['senha']);
                    }else{
                        $input['senha'] = sha1(md5($input['senha']));
                    }
                }
                
                unset($input['conf_senha']);
                
                if(!empty($input['id'])){
                    $this->Usuarios_model->update($input,$input['id'],true);
                    $data['message'] = "Usuário alterado com sucesso!";
                }else{
                    $userExist = $this->Usuarios_model->where('email',$input['email'])->get();
                    if(@$userExist->id){
                        $data['message'] = "E-mail já cadastrado para outro usuário!";
                        $data['return'] = false;
                        echo json_encode($data);
                        return false;
                    }
                    unset($input['id']);
                    $id = $this->Usuarios_model->insert($input);
                    $data['message'] = "Usuário inserido com sucesso! Verifique a conta de e-mail ".$input['email']." para continuar.";
                    // Enviar e-mail de novo cadastro para cliente.
                    $email['assunto'] = "Cadastro de Acesso Flashwill";
                    $email['email'] = $input['email'];
                    $email['nome'] = $input['nome'];
                    $email['link'] = $this->link_cadastro_senha($email['email']);
                    $email['view'] = "nova_senha";
                    $this->email($email);
                }
                
                $data['return'] = true;
                echo json_encode($data);
                return true;
            }
        }
        
        public function logon(){
            
            $this->session->unset_userdata('username');
            $data['message'] = "";

            if($this->input->post()){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->Usuarios_model->get(array('email' => $username, 'senha' => sha1(md5($password))));

                if(isset($user->ativo) && $user->ativo == true){
                    $this->session->set_userdata('username',$user->email);
                    $data['return'] = true;
                }else if(isset($user->ativo) && $user->ativo == false){
                    $data['message'] = "Usuário não está ativo!";
                    $data['return'] = false;
                }else{
                    $data['message'] = "Usuário e/ou senha Inválidos";
                    $data['return'] = false;
                }
            }
            echo json_encode($data);

        }
        
        public function senha($codigo=""){
            $this->session->unset_userdata('username');
            
            if($codigo == ""){
                redirect(''); return false;
            }else{
                $email = "";
                $usuarios = $this->Usuarios_model->get_all();

                if(is_array($usuarios)){
                    foreach($usuarios as $value){
                        if($this->testa_link($codigo,$value->email)){
                            $email = $value->email;
                        }
                    }
                }else{
                    redirect(''); return false;
                }
                
                if($email == ""){
                    redirect(''); return false;
                }else{
                    $data['email'] = $email;
                    $data['code'] = $codigo;
                    $this->load->view('senha',$data);
                }
            }
	}
        
        
        
        
        
        public function datatable(){

            if(!$this->session->userdata('username')){ redirect(''); return false; }
            
            $usuarios = $this->Usuarios_model->get_all();
            
            $data= array("data");
            
            if(is_array($usuarios)){
                foreach($usuarios as $value){
                    $grupo = $value->grupo == "9" ? "Administrador" : "Colaborador";
                    $ativo = $value->ativo == true ? "Ativo" : "Inativo";
                    $data['data'][] = array($value->nome, $value->email, $grupo, $ativo, $value->id);
                }
            }else{
                $data['data'][] = array("","","","");
            }
            
            echo json_encode($data);
            
            return true;
            
        }
        
        public function get(){
            
            if(!$this->session->userdata('username')){ return false; }
            $id = $this->input->post('id');
            $usuarios = $this->Usuarios_model->where('id',$id)->get();

            echo json_encode($usuarios);
            return true;
            
        }
        
        
        
        public function recupera_senha(){
            
            if($this->input->post()){
                if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                    $data['message'] = "Este não é um e-mail válido!";
                    $data['return'] = false;
                }else{
                    // Verifica se existe o e-mail na base
                    $user = $this->Usuarios_model->get(array('email' => $this->input->post('email')));
                    
                    if(isset($user->id) && ($user->ativo == true)){
                        $email['assunto'] = "Recuperar Senha";
                        $email['email'] = $this->input->post('email');
                        $email['nome'] = $user->nome;
                        $email['link'] = $this->link_cadastro_senha($email['email']);
                        $email['view'] = "recuperar_senha";
                        $this->email($email);

                        $data['message'] = "Email enviado com sucesso, verifique sua caixa de e-mail para continuar!";
                        $data['return'] = true;
                    }else if(isset($user->ativo) && $user->ativo == false){
                        $data['message'] = "Usuário não está ativo, ação não permitida!";
                        $data['return'] = false;
                    }else{
                        $data['message'] = "Não cadastrado, envie e-mail para gustavo@flashwill.com.br solicitando acesso!";
                        $data['return'] = false;
                    }
                    
                }
            }else{
                $data['message'] = "Preencha o e-mail para recuperar a senha!";
                $data['return'] = false;
            }
            
            echo json_encode($data);
            return false;
        }
        
        private function email($data){
            $this->load->library('email');

            //$config['protocol'] = 'mail';
            $config['wordwrap'] = TRUE;
            $config['validate'] = TRUE;
            
            $config['smtp_host'] = 'smtp.ipage.com';
            $config['smtp_port'] = 587;
            $config['smtp_user'] = 'flashwill@gcoder.com.br';
            $config['smtp_pass'] = 'Crm@2018';
            $config['protocol']  = 'smtp';
            $config['validate']  = TRUE;
            $config['mailtype']  = 'html';
            //$config['charset']   = 'utf-8';
            //$config['newline']   = "\r\n";

            $this->email->initialize($config);
            $this->email->from('flashwill@gcoder.com.br', 'Flashwill Gerenciamento de CRM');
            $this->email->to($data['email'],$data['nome']);

            $this->email->subject($data['assunto']);

            $this->email->message($this->load->view($data['view'],$data, TRUE));

            $send = $this->email->send();

            if(!$send){
                $data['return'] = true;
                $data['message'] = $this->email->print_debugger();
                echo json_encode($data);
                return true;
            }
            
            return true;
        }
        
        private function link_cadastro_senha($email){
            $link = base_url('senha')."/";
            $link .= sha1(md5("#recuperaçãode&".date('Ymd').$email.date('Ymd')."&senha#"));
            return $link;
        }
        
        private function testa_link($codigo,$email){
            $link = sha1(md5("#recuperaçãode&".date('Ymd').$email.date('Ymd')."&senha#"));
            if($link == $codigo){
                return true;
            }else{
                return false;
            }
        }
}
