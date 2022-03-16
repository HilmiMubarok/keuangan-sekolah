<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiModel');
        $this->load->model('PengeluaranModel');
        $this->load->model('PemasukanModel');
        $this->load->model('SiswaModel');

        $this->load->helper('tanggal');
    }

    public function pengeluaran()
    {
        $data['title'] = 'Pengeluaran';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['pengeluaran'] = $this->PengeluaranModel->get();
        $data['data_pengeluaran'] = $this->TransaksiModel->get('pengeluaran');
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('transaksi/pengeluaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function pemasukan()
    {
        $data['title'] = 'Pemasukan';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['pemasukan'] = $this->PemasukanModel->getBy(['sumber_pemasukan != ' => 'siswa']);
        $data['data_pemasukan'] = $this->TransaksiModel->get('pemasukan');
        $data['siswa'] = $this->SiswaModel->getNamaSiswa();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('transaksi/pemasukan/index', $data);
        $this->load->view('templates/footer');
    }

    public function simpan($type)
    {
        if($type == "pengeluaran") {
            $user_id = $this->session->userdata('id');
            $jenis_pengeluaran_id = $this->input->post('jenis_pengeluaran_id');
            $nominal = $this->input->post('nominal');
            $tanggal = $this->input->post('tanggal');
            $keterangan = $this->input->post('keterangan');
            $data = [
                'user_id' => $user_id,
                'jenis_pengeluaran_id' => $jenis_pengeluaran_id,
                'nominal' => $nominal,
                'tanggal' => $tanggal,
                'keterangan' => $keterangan
            ];
            $save = $this->TransaksiModel->save($data, 'pengeluaran');
            if ($save) {
                $data = array(
                    'pesan' => 'Data Berhasil Disimpan',
                    'icon'  => 'success'
                );
                $this->session->set_flashdata($data);
                redirect("transaksi/pengeluaran");
            } else {
                $data = array(
                    'pesan' => 'Data Gagal Disimpan',
                    'icon'  => 'danger'
                );
                $this->session->set_flashdata($data);
                redirect("transaksi/pengeluaran");
            }

        } else {
            $user_id = $this->session->userdata('id');
            $jenis_pemasukan_id = $this->input->post('jenis_pemasukan_id');
            $nominal = $this->input->post('nominal');
            $tanggal = $this->input->post('tanggal');
            $keterangan = $this->input->post('keterangan');
            $siswa_id = $this->input->post('siswa_id');
            $data = [
                'user_id' => $user_id,
                'jenis_pemasukan_id' => $jenis_pemasukan_id,
                'siswa_id' => $siswa_id,
                'tanggal' => $tanggal,
                'nominal' => $nominal,
                'keterangan' => $keterangan
            ];

            $save = $this->TransaksiModel->save($data, 'pemasukan');
            if ($save) {
                $data = array(
                    'pesan' => 'Data Berhasil Disimpan',
                    'icon'  => 'success'
                );
                $this->session->set_flashdata($data);
                ($siswa_id == 0) ? redirect("transaksi/pemasukan") : redirect("siswa/detail/". $siswa_id);
            } else {
                $data = array(
                    'pesan' => 'Data Gagal Disimpan',
                    'icon'  => 'danger'
                );
                $this->session->set_flashdata($data);
                ($siswa_id == 0) ? redirect("transaksi/pemasukan") : redirect("siswa/detail/". $siswa_id);
            }
        }
    }

    public function detail($type, $id)
    {
        if($type == "pengeluaran") {
            $data['title'] = 'Detail Pengeluaran';
            $data['jabatan']   = $this->session->userdata('role');
            $data['nama_user'] = $this->session->userdata('name');
            $data['pengeluaran'] = $this->PengeluaranModel->get();
            $data['data_pengeluaran'] = $this->TransaksiModel->get_by(['pengeluaran.id_pengeluaran' => $id], 'pengeluaran');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('transaksi/pengeluaran/detail', $data);
            $this->load->view('templates/footer');
        } else {
            $data['title'] = 'Detail Pemasukan';
            $data['jabatan']   = $this->session->userdata('role');
            $data['nama_user'] = $this->session->userdata('name');
            $data['pemasukan'] = $this->PemasukanModel->get();
            $data['data_pemasukan'] = $this->TransaksiModel->get_by(['pemasukan.id_pemasukan' => $id], 'pemasukan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('transaksi/pemasukan/detail', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus($type, $id)
	{
        $model = ucwords($type).'Model';
		$where = array(
			'id_'.$type => intval($id)
		);

		$hapus = $this->TransaksiModel->delete($type, $where);

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("transaksi/$type");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("transaksi/$type");
		}
	}


}
?>