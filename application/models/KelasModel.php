<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasModel extends CI_Model
{

    public function get()
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.jurusan_id');
        return $this->db->get('kelas')->result();
    }

    public function getTotal()
    {
        return $this->db->get('kelas')->num_rows();
    }

    public function get_by($where)
    {
        return $this->db->get_where("kelas", $where)->row();
    }

    public function save($data)
    {
        return $this->db->insert("kelas", $data);
    }

    public function update($id, $data)
    {
        return $this->db->update("kelas", $data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete("kelas", $id);
    }
}


?>