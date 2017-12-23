<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MyLib {

  function __construct() {
    $this->ci_load = & get_instance();
  }

  function dt_current_user() {
    $ID = $this->ci_load->session->userdata('USER_ID');
    return $this->ci_load->UserModel->get_by_id($ID)->row();
  }

}
