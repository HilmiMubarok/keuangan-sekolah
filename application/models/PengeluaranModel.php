<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranModel extends CI_Model
{
    public function get()
    {
        return $this->db->get('jenis_pengeluaran')->result();
    }

    public function getTotal()
    {
        return $this->db->get('jenis_pengeluaran')->num_rows();
    }

    public function get_by($where)
    {
        return $this->db->get_where("jenis_pengeluaran", $where)->row();
    }

    public function save($data)
    {
        return $this->db->insert("jenis_pengeluaran", $data);
    }

    public function update($id, $data)
    {
        return $this->db->update("jenis_pengeluaran", $data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete("jenis_pengeluaran", $id);
    }
}