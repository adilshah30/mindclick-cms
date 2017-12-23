<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->current_user = $this->sessionlib->current_user();	
	}
	
	function index(){
		$data['partial'] = 'admin/permission/list';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
			
		$this->load->view('layout_admin', $data);	
	}
	
	function new_record(){
		$data['dt'] = NULL;
		$data['partial'] = 'admin/permission/new';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin' ,$data);
	}
	function edit_record($PermissionID = NULL){
		$data['dt'] = $this->PermissionModel->get_by_id($PermissionID)->row();
		$data['partial'] = 'admin/permission/edit';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin', $data);
	}
	
	function add(){
		$dt_post = $this->input->post();
		$this->form_validation->set_rules($this->PermissionModel->validation_role_form());
		$this->form_validation->set_error_delimiters(FORM_ERROR_STYLE_OPEN , FORM_ERROR_STYLE_CLOSE);
		
		if($this->form_validation->run() == FALSE){
			$this->new_record();	
		}else{
			$this->PermissionModel->insert($dt_post);
			$this->session->set_flashdata('success', 'Permission Successfully Added');
			redirect('admin/permission');
		}
	}
	
	function update(){
		$dt_post = $this->input->post();
		$this->PermissionModel->update($dt_post['PermissionID'], $dt_post);
		$this->session->set_flashdata('success', 'Permission Successfully Updated');
		redirect('admin/permission');	
	}
		
	/*Admin Listing in datatable*/	
	public function ajax_list()
    {
        $permission_list = $this->PermissionModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($permission_list as $permission) {			
			$dropdown = '
							<a href="#!" class="btn dropdown-button waves-effect waves-light" data-activates="permission_dropdown_id_'.$permission->PermissionID.'">
							  Actions <i class="mdi-navigation-arrow-drop-down right"></i>
							</a>
							<ul id="permission_dropdown_id_'.$permission->PermissionID.'" class="dropdown-content">
							  <li>' . anchor('admin/permission/edit_record/' . $permission->PermissionID, '<i class="mdi-content-create"></i> &nbsp; Edit') . '</li>
							  <li>' . anchor('admin/permission/delete/' . $permission->PermissionID, '<i class="mdi-action-delete"></i> &nbsp; Delete', array('class' => 'needconfirm')) . '</li>  
							</ul>
					
					  ';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $permission->PermissionName;
			$row[] = $dropdown;
            $data[] = $row;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->PermissionModel->count_all(),
			"recordsFiltered" => $this->PermissionModel->count_filtered(),
			"data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
	
}

?>