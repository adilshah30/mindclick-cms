<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->admin_target = 'admin/';
	}
	public function index()
	{
		$data['partial'] = $this->admin_target.'public/form-login';
		$this->load->view('layout_admin_login',$data);
	}
	
	/*
	| 	Login Validation Function, Checks are perform to see if user Exists.
	*/
	function login(){	 	
		//$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules( 'Username' ,'Username', 'callback_Username[Username, Password]');
		$this->form_validation->set_error_delimiters(ERROR_STYLE_OPEN, ERROR_STYLE_CLOSE);
		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run() == FALSE){
			//if the username / password doesnt match, redirect to Login Screen.			
			$this->index();		
		} else {
			$get_current_login = $this->UserModel->get_by_field('Username', $this->input->post('Username'))->row();	
			$newdata = array(
				'USER_ID' => $get_current_login->ID ,
				'is_logged_in' => 1
			);
			print_r($newdata);
			//exit;			
			$this->session->set_userdata($newdata);
			redirect($this->admin_target.'dashboard');
		}		
	}
		
	/*
	| 	Form Fields Validation Function. 
	|	Check to see if form Fileds Contain Valid Data.
	*/
	

	
	function Username($str,$params){
			if($this->UserModel->check_login($this->input->post('Username'), $this->input->post('Password'))){
				return TRUE;
			}else{
				$this->form_validation->set_message('Username','Invalid Username/Password');
				return FALSE;
			}
	}
}
