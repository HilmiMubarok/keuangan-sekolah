<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function get()
    {
        return $this->db->get('users')->result();
    }

    public function get_by($where)
    {
        return $this->db->get_where("users", $where)->row();
    }

    public function save($data)
    {
        return $this->db->insert("users", $data);
    }

    public function update($id, $data)
    {
        return $this->db->update("users", $data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete("users", $id);
    }


}

/* End of file UserModel.php */
/* Location: ./application/models/UserModel.php */