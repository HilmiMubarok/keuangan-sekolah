<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model
{

    public function get()
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.jurusan_id');
        return $this->db->get('kelas')->result();
    }

    public function getSiswaByKelas($kelas_id)
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.jurusan_id');
        $this->db->where('kelas.id_kelas', $kelas_id);
        return $this->db->get('siswa')->num_rows();
    }

    public function getTotal()
    {
        return $this->db->get('siswa')->num_rows();
    }

    public function get_by($where)
    {
        return $this->db->get_where("siswa", $where)->row();
    }

    public function save($data)
    {
        return $this->db->insert("siswa", $data);
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