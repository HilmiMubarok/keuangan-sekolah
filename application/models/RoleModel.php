<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends CI_Model {

	public function get()
	{
        return $this->db->get('roles')->result();
	}

}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */