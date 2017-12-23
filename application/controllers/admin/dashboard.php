<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	function __construct() {
		parent::__construct();				
		$this->current_user = $this->sessionlib->current_user();
	} 
	
	function index(){
		$data['Role'] = $this->session->userdata('Role');
		$data['partial'] = 'admin/dashboard/home';
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin', $data);
	}
	
}


?>