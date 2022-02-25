<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model
{

    public function get()
    {
        return $this->db->get('siswa')->result();
    }

    public function getTotal()
    {
        return $this->db->get('siswa')->num_rows();
    }

    public function get_by($where)
    {
        return $this->db->get_where("siswa", $where)->row();
    }

    public function getByJenkel($kelas_id, $jenkel)
    {
        return $this->db->get_where("siswa", array('kelas_id' => $kelas_id, 'jenkel' => $jenkel))->num_rows();
    }

    public function save($data)
    {
        return $this->db->insert("siswa", $data);
    }

    public function saveBatch($data)
    {
        return $this->db->insert_batch("siswa", $data);
    }

    public function update($id, $data)
    {
        return $this->db->update("siswa", $data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete("siswa", $id);
    }
}


?>