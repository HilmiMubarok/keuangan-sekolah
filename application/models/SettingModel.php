<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingModel extends CI_Model {

	public function getUserById($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }

}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */