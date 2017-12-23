<?php

class AdminMenuModel extends CI_Model{

	var $table = "admin_menu";
	var $key = "AdminMenuID";	
	
	var $column_order = array(null,'ParentID','ShowInNav','IconClassName','AdminMenu.FeatureID','AdminMenu.Status','Feature.FeatureName'); //set column field database for datatable orderable
    var $column_search = array('ParentID','ShowInNav','IconClassName','AdminMenu.FeatureID','AdminMenu.Status','Feature.FeatureName'); //set column field database for datatable searchable 
    var $order = array('AdminMenuID' => 'asc'); // default order 
	
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
	
	/*Get All menu Items With Name*/
	
	function get_all_nav_menu_list(){
		$this->db->select(
						 	$this->table.'.AdminMenuID , feature.FeatureID , feature.FeatureName'
						 );
		$this->db->from($this->table);
		$this->db->join('feature' , $this->table.'.FeatureID = feature.FeatureID', 'inner');	
		return $this->db->get();			 			
	}
	
	
	
	
	/* Get Left Admin Nav Menu */
	
	function get_admin_nav_menu(){
		$this->db->order_by($this->table.'.DisplayOrder', 'DESC');
		$this->db->select(
						$this->table.'.*,
						feature.FeatureID , feature.FeatureName as menu_title, feature.UrlLink, feature.DisplayOrder,feature.Status as FeatureStatus'
						);
		$this->db->from($this->table);
		$this->db->join('feature', $this->table.'.FeatureID = feature.FeatureID','Left');		
		$this->db->where($this->table.'.ShowInNav',1);
		$get_admin_panel_nav = $this->db->get();
		$admin_nav_panel_arr = $get_admin_panel_nav->result_array();
		for($i = 0 ; $i < count($admin_nav_panel_arr); $i++){
			
			if($admin_nav_panel_arr[$i]['ParentID'] == 0){
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['menu_id'] = $admin_nav_panel_arr[$i]['AdminMenuID'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['FeatureID'] = $admin_nav_panel_arr[$i]['FeatureID'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['MenuName'] = $admin_nav_panel_arr[$i]['MenuName'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['icon_class_name'] = $admin_nav_panel_arr[$i]['IconClassName'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['show_in_nav'] = $admin_nav_panel_arr[$i]['ShowInNav'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['url_link'] = $admin_nav_panel_arr[$i]['UrlLink'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['menu_status'] = $admin_nav_panel_arr[$i]['Status'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['feature_status'] = $admin_nav_panel_arr[$i]['FeatureStatus'];
				$nav_panel_arr[$admin_nav_panel_arr[$i]['AdminMenuID']]['sub_menu'] = array();
			}
			else
			{
				$nav_panel_arr[$admin_nav_panel_arr[$i]['ParentID']]['sub_menu'][] = $admin_nav_panel_arr[$i];
			}
			
		}
		
		return array_reverse($nav_panel_arr);
	
	}
	
	function validation_feature_form(){
		$config = array(
			array('field' => 'MenuName' , 'label' => 'Menu Name' , 'rules' => 'required'),
			array('field' => 'FeatureID' , 'label' => 'Feature' , 'rules' => 'required'),
			array('field' => 'ParentID' , 'label' => 'Parent Menu Item' , 'rules' => 'required'),
			array('field' => 'ShowInNav' , 'label' => 'Show In Nav' , 'rules' => 'required'),
			array('field' => 'Status' , 'label' => 'Status' , 'rules' => 'required'),	
		);
		return $config;
	}
		
	/*Admin Listing Datatable Ajax*/
	
	private function _get_datatables_query()
    {
		$this->db->select('AdminMenu.*,
						  Feature.FeatureName as MenuItem'
						  );
		$this->db->from($this->table . ' as AdminMenu');
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
	
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
		$this->db->join('feature as Feature',  'AdminMenu.FeatureID = Feature.FeatureID','left');
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
		$this->db->join('feature as Feature',  'AdminMenu.FeatureID = Feature.FeatureID','left');
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}

?>