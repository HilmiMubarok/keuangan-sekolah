<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemasukanModel extends CI_Model
{
    public function get()
    {
        return $this->db->get('jenis_pemasukan')->result();
    }

    public function getTotal()
    {
        return $this->db->get('jenis_pemasukan')->num_rows();
    }

    public function get_by($where)
    {
        return $this->db->get_where("jenis_pemasukan", $where)->row();
    }

    public function getBy($where)
    {
        return $this->db->get_where("jenis_pemasukan", $where)->result();
    }

    public function save($data)
    {
        return $this->db->insert("jenis_pemasukan", $data);
    }

    public function update($id, $data)
    {
        return $this->db->update("jenis_pemasukan", $data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete("jenis_pemasukan", $id);
    }
}