<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');
class Logout extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		//Empty All userdata
		$this->session->userdata = array();
		//$this->session->unset_userdata('FirstName');
		//Destroy All Sessions
		$this->session->sess_destroy();
		//Redirect To login
		redirect('/admin');	
	}
}
?>