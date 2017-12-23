<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

if (!function_exists('form_value')) {
  function form_value($var = '', $data = null, $isarray = FALSE) {
    $dt_ci = & get_instance();
    $result = NULL;
    if (strpos($var, '[') !== false) {
      $str = explode('[', $var);
      $str = explode(']', $str[1]);
      $result = (set_value($var) != "") ? set_value($var) : (($data != null) ? $data->$str[0] : null);
    } else {
      if(set_value($var) != ""){
        $result = set_value($var);
      }elseif ($dt_ci->input->post($var) != "") {
        $result = $dt_ci->input->post($var);
      }elseif($data != null){
        $result = $data->$var;
      }
    }
    return $result;
  }
}

if (!function_exists('option_select')) {
  function option_select($options = array(), $id = NULL, $value = NULL, $blank = "[Select]", $show_blank = FALSE , $extra_field = NULL) {
    $result = array();
    if (!$show_blank) {
      $result[''] = $blank;
    }
	if (!$extra_field) {	  
	  foreach ($options as $val) {
		  $result[$val->$id] = $val->$value;
		}
    }else{
	  foreach ($options as $val) {
		  $result['0'] = $extra_field;
		  $result[$val->$id] = $val->$value;
	  }			
	}
   
    return $result;
  }
}

?>