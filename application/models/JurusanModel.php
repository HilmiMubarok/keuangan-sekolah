<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JurusanModel extends CI_Model
{

    public function get()
    {
        return $this->db->get('jurusan')->result();
    }

    public function get_by($where)
    {
        return $this->db->get_where("jurusan", $where)->row();
    }

    public function save($data)
    {
        return $this->db->insert("jurusan", $data);
    }

    public function update($id, $data)
    {
        return $this->db->update("jurusan", $data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete("jurusan", $id);
    }
}


?>