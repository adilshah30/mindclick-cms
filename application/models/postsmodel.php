<?php

class PostsModel extends CI_Model{

	var $table = "posts";
        var $post_data_table = "postdata";
	var $key= "ID";	
	
	var $column_order = array(null,'PostTitle'); //set column field database for datatable orderable
        var $column_search = array('PostTitle'); //set column field database for datatable searchable 
        var $order = array('ID' => 'ASC'); // default order 
	
	function __construct(){
		 parent::__construct();
	}
	
	function insert($data){
		$this->db->insert($this->table,$data);
	}
	
	function update($ID, $data){
		$this->db->where($this->key, $ID);
		$this->db->update($this->table, $data);		
	}
	
	function delete($ID){
		$this->db->where($this->key, $ID);
		$this->db->delete($this->table);
	}
	
	function get_all(){
		return $this->db->get($this->table);
	}
	
	function get_by_id($ID){
		$this->db->where($this->key, $ID);
		$this->db->from($this->table);
		return $this->db->get();
	}
	
	function get_by_field($field, $value , $other_condition = null){
		$this->db->where($field, $value);
		if($other_condition != null){
			$this->db->where($other_condition);
		}
		$this->db->from($this->table);
		return $this->db->get();
	}
        function get_all_post_custom_content(){               
                $PostID = $this->session->PostID;
                //Get All Post Related Custom Contents 
                $this->db->where('PostID', $PostID);
		$this->db->from($this->post_data_table);
                return $this->db->get();
        }
        function get_all_distinct_custom_content_key(){
                $this->db->distinct();
                $this->db->select('Key');
                $this->db->where('KeyType', 'post_custom_content');
                $this->db->from($this->post_data_table);
		return $this->db->get();
        }
        
        //Add Single Custom content field Via Ajax
        function ajax_add_custom_content($data){           
            $PostID = $this->session->PostID;
            //Extract Page form data into variables
            extract($data);
            /*Insert Post Custom Content Data*/
            $post_custom_data = array(
                'PostID'=> $this->db->escape_str(trim($PostID)),
                'Key'=> $this->db->escape_str(trim($Key)),
                'Value'=>$this->db->escape_str(trim($Value)),
                'keytype'=>$this->db->escape_str(trim('post_custom_content')),
            );
            //Insert New page data Record into Database          
            $insert_post_data = $this->db->insert($this->post_data_table,$post_custom_data);
            $post_custom_content_id = $this->db->insert_id();
            
            //Get last Inserted Object Custom Content/ 
            $this->db->where('ID', $post_custom_content_id);
	    $this->db->from($this->post_data_table);          
            $query = $this->db->get();
            //$post_custom_content_row=$query->row();
            if($insert_post_data) return $query;
        }
        
        
        function add_new_page_auto_draft(){            
            $PostID = $this->session->PostID;
            
            if($PostID == ""){
                $PostAuthor = $this->session->USER_ID ;           
                $CreationDate = date('Y-m-d G:i:s');
                $PostTitle = "Auto Draft created at ".date('Y-m-d G:i:s');
                $ModifiedDate = date('Y-m-d G:i:s');
                $PostStatus = "draft";
                $PostType = "page";

                $insert_data = array(
                    'PostAuthor' => $this->db->escape_str(trim($PostAuthor)),
                    'PostTitle' => $this->db->escape_str(trim($PostTitle)),
                    'PostStatus' => $this->db->escape_str(trim($PostStatus)),
                    'PostType' => $this->db->escape_str(trim($PostType)),
                    'CreationDate' => $this->db->escape_str(trim($CreationDate)), 
                    'ModifiedDate' => $this->db->escape_str(trim($ModifiedDate)),  
                );

                $insert_post = $this->db->insert($this->table,$insert_data);
                $PostID = $this->db->insert_id();
                //Set last Inserted It of Post Ins Session
                $this->session->set_userdata("PostID",$PostID);

                if ($insert_post) return  true;
            }
        }
        
        function add_new_page_update($data){
            //Post ID from session
            $PostID = $this->session->PostID;
            //Extract Page form data into variables
            extract($data);
            //echo "<pre/>";
            $count_content_key = count($PostContentKey);
            
            $PostAuthor = $this->session->USER_ID ;           
            //$CreationDate = date('Y-m-d G:i:s');
            $ModifiedDate = date('Y-m-d G:i:s');
            $PostParent = "1";
            
            $update_data = array(
                'PostAuthor' => $this->db->escape_str(trim($PostAuthor)),
                'PostTitle' => $this->db->escape_str(trim($PostTitle)),
                'PostContent' => $this->db->escape_str(trim($PostContent)),
                'ShortDescription' => $this->db->escape_str(trim($ShortDescription)),
                'PostParent' => $this->db->escape_str(trim($PostParent)),
                'PostStatus' => $this->db->escape_str(trim($PostStatus)),
                'PostType' => $this->db->escape_str(trim($PostType)),
                'ModifiedDate' => $this->db->escape_str(trim($ModifiedDate)),  
            );
            
            $this->db->where($this->key, $PostID);
	    $this->db->update($this->table, $update_data);
            
            /*Update Custom Content Area*/
            if($count_content_key > 0){
               for($i=0; $i <= $count_content_key; $i++){
                    $list_post_custom_data = array(
                        'Key'=> $this->db->escape_str(trim($PostContentKey[$i])),
                        'Value'=>$this->db->escape_str(trim($PostContentValue[$i])),
                        'keytype'=>$this->db->escape_str(trim('post_custom_content')),
                    );
                    
                    $this->db->where('ID', $PostContentID[$i]);
                    $this->db->update($this->post_data_table, $list_post_custom_data);
               }   
            }                     
            /*End Update Custom Content Area*/
            
            /*Insert Post Custom Content Data*/
            $post_custom_data = array(
                'PostID'=> $this->db->escape_str(trim($PostID)),
                'Key'=> $this->db->escape_str(trim($Key)),
                'Value'=>$this->db->escape_str(trim($Value)),
                'keytype'=>$this->db->escape_str(trim('post_custom_content')),
            );
            
            //print_r($insert_data);
            //exit;
            
            //Insert New page data Record into Database          
            $insert_post_data= $this->db->insert($this->post_data_table,$post_custom_data);
            if($insert_post_data){
                $this->session->unset_userdata('PostID');
                return true ;
            } 
        }
	
	
	
	function validation_admin_cms_page_form(){
		$config = array(
                    array('field' => 'PostTitle' , 'label' => 'Page Title' , 'rules' => 'required'),
                    array('field' => 'PostStatus' , 'label' => 'Page Status' , 'rules' => 'required'),				
		);
		return $config;
	}
		
	// Admin Listing Datatable Ajax
	// Get ajax result of pages for Admin 
	// This section is for Post Type pages
	private function _get_page_datatables_query()
        {
         
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {  
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
    function get_page_datatables()
    {
        $this->_get_page_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_page_filtered()
    {
        $this->_get_page_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_page_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}

?>