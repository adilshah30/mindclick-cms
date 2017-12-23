<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class role_permission extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->current_user = $this->sessionlib->current_user();	
	}
	
	function index(){
		$data['partial'] = 'admin/feature/list';
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
				
		$this->load->view('layout_admin', $data);	
	}
	
	function new_record(){
		$data['dt'] = NULL;
		$data['partial'] = 'admin/feature/new';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin' ,$data);
	}
	function edit_record($FeatureID = NULL){
		$data['dt'] = $this->FeatureModel->get_by_id($FeatureID)->row();
		$data['partial'] = 'admin/feature/edit';
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
					
		$this->load->view('layout_admin', $data);
	}
	function assign_permission($RoleID = NULL){
		$data['RoleID'] = $RoleID;
		$get_all_features_list  = $this->FeatureModel->get_all()->result();
		
		$data__ =array();
		foreach($get_all_features_list as $val){
			$role_permission_list = $this->RolePermissionModel->get_role_permission($RoleID,$val->FeatureID)->row();
				$dat = array(
				'FeatureName'=>$val->FeatureName,
				'FeatureID'=>$val->FeatureID,
				'role_permission'=>$role_permission_list,
				);
				$data['Feature_list'][]= $dat;
			}
			
		
		$data['partial'] = 'admin/role_permission/assign_permission';
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin',$data);
	}
	
	function add(){
		$dt_post = $this->input->post();
		$this->form_validation->set_rules($this->FeatureModel->validation_feature_form());
		$this->form_validation->set_error_delimiters(FORM_ERROR_STYLE_OPEN , FORM_ERROR_STYLE_CLOSE);
		
		if($this->form_validation->run() == FALSE){
			$this->new_record();	
		}else{
			$this->FeatureModel->insert($dt_post);
			$this->session->set_flashdata('success', 'Feature Successfully Added');
			redirect('admin/feature');
		}
	}
	
	function add_permission(){
		
		$dt_feature_permission = $this->input->post('FeaturePermission');
		$RoleID = $this->input->post('RoleID');
		$this->RolePermissionModel->empty_($RoleID);
		foreach($dt_feature_permission as $val){
			$data = array(
			'RoleID'=>$RoleID,
			'FeatureID'=>$val['FeatureID'],
			'r_can_add'=>(isset($val['r_can_add']))? $val['r_can_add']: 0 ,
			'r_can_edit'=>(isset($val['r_can_edit']))? $val['r_can_edit']: 0 ,
			'r_can_delete'=>(isset($val['r_can_delete']))? $val['r_can_delete']: 0 ,
			'r_can_view'=>(isset($val['r_can_view']))? $val['r_can_view']: 0 
			);
			if(isset($val['FeatureID'])){
				$this->RolePermissionModel->insert($data);
			}			
		}
		$this->session->set_flashdata('success', 'Role Permissions Updated Sucessfully');	
		redirect('admin/role_permission/assign_permission/'.$RoleID);	
	}
	
	function update(){
		$dt_post = $this->input->post();
		$this->FeatureModel->update($dt_post['FeatureID'], $dt_post);
		$this->session->set_flashdata('success', 'Feature Successfully Edited');
		redirect('admin/feature');
	
	}
		
	/*Admin Listing in datatable*/	
	public function ajax_list()
    {
        $status = "";
		$feature_list = $this->FeatureModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($feature_list as $feature) {			
			$dropdown = '
							<a href="#!" class="btn dropdown-button waves-effect waves-light" data-activates="feature_dropdown_id_'.$feature->FeatureID.'">
							  Actions <i class="mdi-navigation-arrow-drop-down right"></i>
							</a>
							<ul id="feature_dropdown_id_'.$feature->FeatureID.'" class="dropdown-content">
							  <li>' . anchor('admin/feature/edit_record/' . $feature->FeatureID, '<i class="mdi-content-create"></i> &nbsp; Edit') . '</li>
							  <li>' . anchor('admin/feature/delete/' . $feature->FeatureID, '<i class="mdi-action-delete"></i> &nbsp; Delete', array('class' => 'needconfirm')) . '</li>  
							</ul>
					
					  ';
			if($feature->Status == '' || $feature->Status == 0)
			{
				$status = '<span class="inactive-badge mc-badge">InActive</span>';
			}
			else
			{
				$status = '<span class="active-badge mc-badge">Active</span>';
			}
					  
            $no++;
            $row = array();
			
            $row[] = $no;
            $row[] = $feature->FeatureName;           
			$row[] = $feature->UrlLink;
			$row[] = $feature->FeatureDescription;
			$row[] = $status;
			$row[] = $dropdown;
            $data[] = $row;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->FeatureModel->count_all(),
			"recordsFiltered" => $this->FeatureModel->count_filtered(),
			"data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
	
}

?>