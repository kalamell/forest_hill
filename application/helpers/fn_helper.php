<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_name()
{
	$ci =& get_instance();

	if ($ci->session->userdata('staff_id')) {
		$staff_id = $ci->session->userdata('staff_id');
		$rs = $ci->db->where('staff_id', $staff_id)->get('staff');
		return $rs->row()->name.' '.$rs->row()->surname;
	}
	return '';

}