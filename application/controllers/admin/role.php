<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->current_user = $this->sessionlib->current_user();	
	}
	
	function index(){
		$data['partial'] = 'admin/role/list';
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
				
		$this->load->view('layout_admin', $data);	
	}
	
	function new_record(){
		$data['dt'] = NULL;
		$data['partial'] = 'admin/role/new';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin' ,$data);
	}
	function edit_record($RoleID = NULL){
		$data['dt'] = $this->RoleModel->get_by_id($RoleID)->row();
		$data['partial'] = 'admin/role/edit';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin', $data);
	}
	
	function add(){
		$dt_post = $this->input->post();
		$this->form_validation->set_rules($this->RoleModel->validation_role_form());
		$this->form_validation->set_error_delimiters(FORM_ERROR_STYLE_OPEN , FORM_ERROR_STYLE_CLOSE);
		
		if($this->form_validation->run() == FALSE){
			$this->new_record();	
		}else{
			$this->RoleModel->insert($dt_post);
			$this->session->set_flashdata('success', 'Role Successfully Added');
			redirect('admin/role');
		}
	}
	
	function update(){
		$dt_post = $this->input->post();
		$this->RoleModel->update($dt_post['RoleID'], $dt_post);
		$this->session->set_flashdata('success', 'Role Successfully Updated');
		redirect('admin/role');	
	}
		
	/*Admin Listing in datatable*/	
	public function ajax_list()
    {
        $role_list = $this->RoleModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($role_list as $role) {			
			$dropdown = '
							<a href="#!" class="btn dropdown-button waves-effect waves-light" data-activates="role_dropdown_id_'.$role->RoleID.'">
							  Actions <i class="mdi-navigation-arrow-drop-down right"></i>
							</a>
							<ul id="role_dropdown_id_'.$role->RoleID.'" class="dropdown-content">
							  <li>' . anchor('admin/role/edit_record/' . $role->RoleID, '<i class="mdi-content-create"></i> &nbsp; Edit') . '</li>
							  <li>' . anchor('admin/role/delete/' . $role->RoleID, '<i class="mdi-action-delete"></i> &nbsp; Delete', array('class' => 'needconfirm')) . '</li>  
							</ul>
					
					  ';
			$assign_permission='<span>' . anchor('admin/role_permission/assign_permission/' . $role->RoleID, ' Assign Permission') . '</span>';		  
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $role->RoleName;
            $row[] = $role->RoleDescription;
			$row[] = $role->RoleCode;
			$row[] = $assign_permission;
			$row[] = $dropdown;
            $data[] = $row;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->RoleModel->count_all(),
			"recordsFiltered" => $this->RoleModel->count_filtered(),
			"data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
	
}

?>