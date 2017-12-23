<?php

class UserModel extends CI_Model{

	var $table = "users";
	var $key= "ID";	
	
	var $column_order = array(null,'Username','Email','DisplayName','RoleID','Status'); //set column field database for datatable orderable
        var $column_search = array('Username','Email','DisplayName','RoleID','Status'); //set column field database for datatable searchable 
        var $order = array('ID' => 'asc'); // default order 
	
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
	
	function check_login($Username, $Password){				
		$this->db->where('LOWER(Username)', strtolower($Username));
		$this->db->where('LOWER(Password)', strtolower($Password));
		$this->db->from($this->table);
		return ($this->db->get()->num_rows() == 1) ? TRUE : FALSE ;		
	}
	
	function validation_users_form(){
		$config = array(
			array('field' => 'FirstName' , 'label' => 'First Name' , 'rules' => 'required'),
			array('field' => 'LastName' , 'label' => 'Last Name' , 'rules' => 'required'),
			array('field' => 'Username' , 'label' => 'Username' , 'rules' => 'required'),
			array('field' => 'Email', 'label' => 'Email' , 'rules' => 'required'),
			array('field' => 'Password' , 'label' => 'Password' , 'rules' => 'required'),
			array('field' => 'Status' , 'label' => 'Status', 'rules' => 'required'),
			array('field' => 'Type' , 'label' => 'Type' , 'rules' => 'required'),		
		);
		return $config;
	}
		
	/*Admin Listing Datatable Ajax*/
	
	 private function _get_datatables_query()
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
	
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
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