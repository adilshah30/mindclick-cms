<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->current_user = $this->sessionlib->current_user();	
	}
	
	function index(){
		$data['partial'] = 'admin/users/list';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr']= $this->AdminMenuModel->get_admin_nav_menu();	
		$this->load->view('layout_admin', $data);	
	}
	
	function new_record(){
		$data['dt'] = NULL;
		$data['partial'] = 'admin/users/new';
		//Fetch Admin Left navigation
		$data['nav_panel_arr']= $this->AdminMenuModel->get_admin_nav_menu();
			
		$this->load->view('layout_admin' ,$data);
	}
	function edit_record($ID = NULL){
		$data['dt'] = $this->UserModel->get_by_id($ID)->row();
		$data['partial'] = 'admin/users/edit';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr']= $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin', $data);
	}
	
	function add(){
		$dt_post = $this->input->post();
		$this->form_validation->set_rules($this->UserModel->validation_users_form());
		$this->form_validation->set_error_delimiters(FORM_ERROR_STYLE_OPEN , FORM_ERROR_STYLE_CLOSE);
		
		if($this->form_validation->run() == FALSE){
			$this->new_record();	
		}else{
			$this->UserModel->insert($dt_post);
			$this->session->set_flashdata('success', 'User Successfully Added');
			redirect('admin/users');
		}
	}
	
	function update(){
		$dt_post = $this->input->post();
		$this->UserModel->update($dt_post['ID'], $dt_post);
		$this->session->set_flashdata('success', 'User Successfully Edited');
		redirect('admin/users');
	
	}
		
	/*Admin Listing in datatable*/	
	public function ajax_list()
    {
        $user_list = $this->UserModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($user_list as $user) {			
			$dropdown = '
							<a href="#!" class="btn dropdown-button waves-effect waves-light" data-activates="user_dropdown_id_'.$user->ID.'">
							  Actions <i class="mdi-navigation-arrow-drop-down right"></i>
							</a>
							<ul id="user_dropdown_id_'.$user->ID.'" class="dropdown-content">
							  <li>' . anchor('admin/users/edit_record/' . $user->ID, '<i class="mdi-content-create"></i> &nbsp; Edit') . '</li>
							  <li>' . anchor('admin/users/delete/' . $user->ID, '<i class="mdi-action-delete"></i> &nbsp; Delete', array('class' => 'needconfirm')) . '</li>  
							</ul>
					
					  ';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->Username;
            $row[] = $user->Email;
			$row[] = $user->DisplayName;
			$row[] = $user->RoleID;			
			$row[] = $user->Status;
			$row[] = $dropdown;
            $data[] = $row;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->UserModel->count_all(),
			"recordsFiltered" => $this->UserModel->count_filtered(),
			"data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
	
}

?>