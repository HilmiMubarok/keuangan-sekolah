<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function cek_login($table, $value)
	{
		return $this->db->where($value)->get($table);
	}

	public function getUserById($id)
	{
		return $this->db->where('id_user', $id)->get('users')->row();
	}

}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */