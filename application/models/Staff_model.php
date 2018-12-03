<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login($ar = array() )
	{
		if (count($ar)>0) {
			$rs = $this->db->where(array(
				'username' => $ar['username'],
				'password' => do_hash($ar['password'])
			))->get('staff');

			if ($rs->num_rows()>0) {
				$this->session->set_userdata('staff_id', $rs->row()->staff_id);

				$this->db->set('last_login', 'NOW()', FALSE)->where('staff_id', $rs->row()->staff_id)
							->update('staff');

				$this->db->set('ondate', 'NOW()', FALSE)->set('staff_id', $rs->row()->staff_id)->insert('staff_login');
				
				return true;
			}

		}
		return false;
	}
}