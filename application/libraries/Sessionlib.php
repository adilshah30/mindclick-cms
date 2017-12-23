<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class SessionLib {

  function __construct() {
    $this->ci_load =& get_instance();
  }
  function check_login() {
    return ($this->ci_load->session->userdata('USER_ID') == NULL) ? FALSE : TRUE;
  }
  function current_user() {
    $UserID = $this->ci_load->session->userdata('USER_ID');
    if ($UserID == NULL || $this->ci_load->UserModel->get_by_id($UserID)->num_rows() == 0) {
      redirect('/admin');
    } else {
      return $this->ci_load->UserModel->get_by_id($UserID)->row();
    }
  }

}
