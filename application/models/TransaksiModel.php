<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model
{

    public function get($type)
    {
        if($type == "pengeluaran") {
            $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran = pengeluaran.jenis_pengeluaran_id');
            $this->db->join('users', 'users.id_user = pengeluaran.user_id');
            return $this->db->get('pengeluaran')->result();
        } else {
            $this->db->join('jenis_pemasukan', 'jenis_pemasukan.id_jenis_pemasukan = pemasukan.jenis_pemasukan_id');
            $this->db->join('users', 'users.id_user = pemasukan.user_id');
            return $this->db->get('pemasukan')->result();
        }
    }

    public function getByMonth($type, $month, $year)
    {
        if($type == "pengeluaran"){
            $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran = pengeluaran.jenis_pengeluaran_id');
            $this->db->join('users', 'users.id_user = pengeluaran.user_id');
            $this->db->where("MONTH(pengeluaran.tanggal)", $month);
            $this->db->where("YEAR(pengeluaran.tanggal)", $year);
            return $this->db->get('pengeluaran')->result();
        } else {
            $this->db->join('jenis_pemasukan', 'jenis_pemasukan.id_jenis_pemasukan = pemasukan.jenis_pemasukan_id');
            $this->db->join('users', 'users.id_user = pemasukan.user_id');
            $this->db->where("MONTH(pemasukan.tanggal)", $month);
            $this->db->where("YEAR(pemasukan.tanggal)", $year);
            return $this->db->get('pemasukan')->result();
        }
    }

    public function getByPeriode($type, $start, $end)
    {
        if($type == "pengeluaran") {
            $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran = pengeluaran.jenis_pengeluaran_id');
            $this->db->join('users', 'users.id_user = pengeluaran.user_id');
            $this->db->where("pengeluaran.tanggal >=", $start);
            $this->db->where("pengeluaran.tanggal <=", $end);
            return $this->db->get('pengeluaran')->result();
        } else {
            $this->db->join('jenis_pemasukan', 'jenis_pemasukan.id_jenis_pemasukan = pemasukan.jenis_pemasukan_id');
            $this->db->join('users', 'users.id_user = pemasukan.user_id');
            $this->db->where("pemasukan.tanggal >=", $start);
            $this->db->where("pemasukan.tanggal <=", $end);
            return $this->db->get('pemasukan')->result();
        }
    }

    public function getTotalTransaksi($type, $type_laporan = "", $data = [])
    {
        if($type == "pengeluaran"){
            if($type_laporan == "bulan"){
                $this->db->where("MONTH(pengeluaran.tanggal)", $data['bulan']);
                $this->db->select_sum('pengeluaran.nominal');
            } elseif ($type_laporan == "periode"){
                $this->db->where("pengeluaran.tanggal >=", $data['start']);
                $this->db->where("pengeluaran.tanggal <=", $data['end']);
                $this->db->select_sum('pengeluaran.nominal');
            } else {
                $this->db->select_sum('nominal');
            }
            return $this->db->get('pengeluaran')->row();
        } else {
            if($type_laporan == "bulan"){
                $this->db->where("MONTH(pemasukan.tanggal)", $data['bulan']);
                $this->db->select_sum('pemasukan.nominal');
            } elseif ($type_laporan == "periode"){
                $this->db->where("pemasukan.tanggal >=", $data['start']);
                $this->db->where("pemasukan.tanggal <=", $data['end']);
                $this->db->select_sum('pemasukan.nominal');
            } else {
                $this->db->select_sum('nominal');
            }
            // $this->db->select_sum('nominal');
            return $this->db->get('pemasukan')->row();
        }
        
    }

    public function getSiswaByKelas($kelas_id)
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.jurusan_id');
        $this->db->where('kelas.id_kelas', $kelas_id);
        return $this->db->get('siswa');
    }

    public function getTotal()
    {
        return $this->db->get('kelas')->num_rows();
    }

    public function get_by($where, $type)
    {
        if($type == "pengeluaran"){
            $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id_jenis_pengeluaran = pengeluaran.jenis_pengeluaran_id');
            $this->db->join('users', 'users.id_user = pengeluaran.user_id');
            return $this->db->get_where("pengeluaran", $where)->row();
        } else {
            $this->db->join('jenis_pemasukan', 'jenis_pemasukan.id_jenis_pemasukan = pemasukan.jenis_pemasukan_id');
            $this->db->join('users', 'users.id_user = pemasukan.user_id');
            $this->db->join('siswa', 'siswa.id_siswa = pemasukan.siswa_id', 'left');
            return $this->db->get_where("pemasukan", $where)->row();
        }
    }

    public function getBySiswa($id)
    {
        $this->db->where('siswa_id', $id);
        return $this->db->get('pemasukan')->result();
    }

    public function save($data, $type)
    {
        if($type == "pengeluaran"){
            return $this->db->insert("pengeluaran", $data);
        } else {
            return $this->db->insert("pemasukan", $data);
        }
    }

    public function update($id, $data)
    {
        return $this->db->update("kelas", $data, $id);
    }

    public function delete($type, $id)
    {
        return $this->db->delete($type, $id);
    }
}


?>