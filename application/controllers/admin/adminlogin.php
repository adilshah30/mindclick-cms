<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	function __construct() {
		parent::__construct();		
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
		$this->form_validation->set_rules('Username' ,'Username', 'callback_Username[Username, Password]');
		$this->form_validation->set_error_delimiters(ERROR_STYLE_OPEN, ERROR_STYLE_CLOSE);
		if($this->form_validation->run() == FALSE){
			//if the username / password doesnt match, redirect to Login Screen.			
			$this->index();		
		} else {
			$get_current_login = $this->UserModel->get_by_field('Username', $this->input->post('Username'))->row();
			$get_current_user_role_feature_per = $this->RolePermissionModel->get_role_feature_permission($get_current_login->RoleID)->result_array();	
			$get_user_role_info = $this->RoleModel->get_by_id($get_current_login->RoleID)->row();
			$newdata = array(
							  'logged_in' => true,
							  'USER_ID' => $get_current_login->ID,
							  'UserName' => $get_current_login->Username,
							  'FirstName' => $get_current_login->FirstName,
							  'LastName' => $get_current_login->LastName,
							  'Email' => $get_current_login->Email,
							  'UserRolePermissions' => $get_current_user_role_feature_per,
							  'RoleID' => $get_user_role_info->RoleID,
							  'RoleName' => $get_user_role_info->RoleName,
							  'UserRole' => $get_user_role_info->RoleCode
							);						
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

?>