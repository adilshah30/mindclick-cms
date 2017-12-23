<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CmsPage extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->current_user = $this->sessionlib->current_user();	
	}
	
	public function index(){
		$data['partial'] = 'admin/cms_page/list';	
		//Fetch Admin Left navigation
		$data['nav_panel_arr'] = $this->AdminMenuModel->get_admin_nav_menu();
		
		$this->load->view('layout_admin',$data);
	}
	
	public function new_record(){
		$data['dt'] = NULL;
		$data['partial'] = 'admin/cms_page/new';
		//Fetch Admin Left navigation
		$data['nav_panel_arr']= $this->AdminMenuModel->get_admin_nav_menu();
                //On Add New page load insert page database entry as Auto Draft 
                $this->PostsModel->add_new_page_auto_draft();
                //Load All distinct distinct_custom_content_key
                $data['all_custom_content_key'] = $this->PostsModel->get_all_distinct_custom_content_key()->result();
		//Load All Post Custom Content
                $data['list_post_custom_contents'] = $this->PostsModel->get_all_post_custom_content();
		$this->load->view('layout_admin' ,$data);
	}
        
        function add(){
		$dt_post = $this->input->post();
		$this->form_validation->set_rules($this->PostsModel->validation_admin_cms_page_form());
		$this->form_validation->set_error_delimiters(FORM_ERROR_STYLE_OPEN , FORM_ERROR_STYLE_CLOSE);
		
		if($this->form_validation->run() == FALSE){
			$this->new_record();	
		}else{
			$this->PostsModel->add_new_page_update($dt_post);
			$this->session->set_flashdata('success', 'Page Successfully Added');
			redirect('admin/cmspage');
		}
	}
	
	/*Admin Listing in datatable*/	
	public function ajax_page_list()
        {
        $post_page_list = $this->PostsModel->get_page_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($post_page_list as $post_page) {			
            $dropdown = '
                <a href="#!" class="btn dropdown-button waves-effect waves-light" data-activates="user_dropdown_id_'.$post_page->ID.'">
                  Actions <i class="mdi-navigation-arrow-drop-down right"></i>
                </a>
                <ul id="user_dropdown_id_'.$post_page->ID.'" class="dropdown-content">
                  <li>' . anchor('admin/cmspage/edit_record/' . $post_page->ID, '<i class="mdi-content-create"></i> &nbsp; Edit') . '</li>
                  <li>' . anchor('admin/cmspage/delete/' . $post_page->ID, '<i class="mdi-action-delete"></i> &nbsp; Delete', array('class' => 'needconfirm')) . '</li>  
                </ul>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $post_page->PostTitle;
            $row[] = $post_page->PostAuthor;
            $row[] = $post_page->CreationDate;			
            $row[] = $post_page->PostStatus;
            $row[] = $dropdown;
            $data[] = $row;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->PostsModel->count_page_all(),
			"recordsFiltered" => $this->PostsModel->count_page_filtered(),
			"data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add_custom_content(){
        $data = array(
            'Key' => $this->input->post('Key'),
            'Value'=> $this->input->post('Value')
        );
        $insert_custom_content = $this->PostsModel->ajax_add_custom_content($data);
        if($insert_custom_content->num_rows() > 0){
            $custom_content_object = $insert_custom_content->row();        
            //Return Row in json object
            header('Content-Type: application/json');
            echo json_encode($custom_content_object);
        }else{
            echo "charlie";
        }
       
    }    

}



?>