<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMenu extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->current_user = $this->sessionlib->current_user();	
	}
	
	function index(){
		$data['partial'] = 'admin/adminmenu/list';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
			
		$this->load->view('layout_admin', $data);	
	}
	
	function new_record(){
		$data['dt'] = NULL;
		$data['MenuItemList'] = $this->FeatureModel->get_all()->result();
		$data['ParentMenuItemList'] = $this->AdminMenuModel->get_all()->result();
		$data['partial'] = 'admin/adminmenu/new';
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
			
		$this->load->view('layout_admin' ,$data);
	}
	function edit_record($AdminMenuID = NULL){
		$data['MenuItemList'] = $this->FeatureModel->get_all()->result();
		$data['ParentMenuItemList'] = $this->AdminMenuModel->get_all()->result();
		$data['dt'] = $this->AdminMenuModel->get_by_id($AdminMenuID)->row();
		$data['partial'] = 'admin/adminmenu/edit';			
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin', $data);
	}
	
	function add(){
		$dt_post = $this->input->post();
		$this->form_validation->set_rules($this->AdminMenuModel->validation_feature_form());
		$this->form_validation->set_error_delimiters(FORM_ERROR_STYLE_OPEN , FORM_ERROR_STYLE_CLOSE);
		
		if($this->form_validation->run() == FALSE){
			$this->new_record();	
		}else{
			$this->AdminMenuModel->insert($dt_post);
			$this->session->set_flashdata('success', 'Menu Item Successfully Added');
			redirect('admin/adminmenu');
		}
	}
	
	function update(){
		$dt_post = $this->input->post();
		$this->AdminMenuModel->update($dt_post['AdminMenuID'], $dt_post);
		$this->session->set_flashdata('success', 'Menu Item Successfully Edited');
		redirect('admin/adminmenu');
	
	}
		
	/*Admin Listing in datatable*/	
	public function ajax_list()
    {
        $status = "";
		$ShowInNav = "";
		$AdminMenu_list = $this->AdminMenuModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($AdminMenu_list as $AdminMenu) {			
			$dropdown = '
							<a href="#!" class="btn dropdown-button waves-effect waves-light" data-activates="feature_dropdown_id_'.$AdminMenu->AdminMenuID.'">
							  Actions <i class="mdi-navigation-arrow-drop-down right"></i>
							</a>
							<ul id="feature_dropdown_id_'.$AdminMenu->AdminMenuID.'" class="dropdown-content">
							  <li>' . anchor('admin/adminmenu/edit_record/' . $AdminMenu->AdminMenuID, '<i class="mdi-content-create"></i> &nbsp; Edit') . '</li>
							  <li>' . anchor('admin/adminmenu/delete/' . $AdminMenu->AdminMenuID, '<i class="mdi-action-delete"></i> &nbsp; Delete', array('class' => 'needconfirm')) . '</li>  
							</ul>
					
					  ';
			//Check if Menu Status is zero set to Inactive
			//Check if Menu Status is 1 set to Active
			if($AdminMenu->Status == '' || $AdminMenu->Status == 0)
			{
				$status = '<span class="inactive-badge mc-badge">InActive</span>';
			}
			else
			{
				$status = '<span class="active-badge mc-badge">Active</span>';
			}
			
			//Check if Menu ShowInNav is zero set to No
			//Check if Menu ShowInNav is 1 set to yes
			if($AdminMenu->ShowInNav == '' || $AdminMenu->ShowInNav == 0)
			{
				$ShowInNav = '<span class="inactive-badge mc-badge">No</span>';
			}
			else
			{
				$ShowInNav = '<span class="active-badge mc-badge">Yes</span>';
			}
					  
            $no++;
            $row = array();
			
            $row[] = $no;
			$row[]=  $AdminMenu->MenuName;
            $row[]=  $AdminMenu->MenuItem;
			$row[] = $AdminMenu->ParentID;
			$row[] = $AdminMenu->DisplayOrder;           
			$row[] = $ShowInNav;
			$row[] = $AdminMenu->IconClassName;
			$row[] = $status;
			$row[] = $dropdown;
            $data[] = $row;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->AdminMenuModel->count_all(),
			"recordsFiltered" => $this->AdminMenuModel->count_filtered(),
			"data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
	
}

?>