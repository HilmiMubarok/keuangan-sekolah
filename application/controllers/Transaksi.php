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

        }
    }
    
    // public function index()
    // {
    //     $data['title'] = 'Pengeluaran';
    //     $data['jabatan']   = $this->session->userdata('role');
    //     $data['nama_user'] = $this->session->userdata('name');
    //     $data['pengeluaran'] = $this->PengeluaranModel->get();
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/navbar', $data);
    //     $this->load->view('pengeluaran/index', $data);
    //     $this->load->view('templates/footer', $data);
    // }

    // public function simpan()
    // {
    //     $nama = $this->input->post('nama_jenis_pengeluaran');
    //     $data = array(
    //         'nama_jenis_pengeluaran' => $nama
    //     );
    //     $save = $this->PengeluaranModel->save($data, 'jenis_pengeluaran');
    //     if ($save) {
    //         $data = array(
    //             'pesan' => 'Data Berhasil Disimpan',
    //             'icon'  => 'success'
    //         );
    //         $this->session->set_flashdata($data);
    //         redirect("pengeluaran");
    //     } else {
    //         $data = array(
    //             'pesan' => 'Data Gagal Disimpan',
    //             'icon'  => 'danger'
    //         );
    //         $this->session->set_flashdata($data);
    //         redirect("pengeluaran");
    //     }
    // }

    // public function edit()
	// {
	// 	$data['title']     = "Edit pengeluaran";
    //     $data['jabatan']   = $this->session->userdata('role');
    //     $data['nama_user'] = $this->session->userdata('name');
	// 	$get_pengeluaran      = array('id_jenis_pengeluaran' => $this->uri->segment(3));
	// 	$data['pengeluaran']  = $this->PengeluaranModel->get_by($get_pengeluaran, 'jenis_pengeluaran');

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/navbar', $data);
	// 	$this->load->view('pengeluaran/edit.php', $data);
	// 	$this->load->view('templates/footer', $data);
	// }

    // public function update()
    // {
    //     $id = array('id_jenis_pengeluaran' => $this->input->post('id_jenis_pengeluaran'));
    //     $nama_jenis_pengeluaran = $this->input->post('nama_jenis_pengeluaran');
    //     $data = array(
    //         'nama_jenis_pengeluaran' => $nama_jenis_pengeluaran,
    //     );
    //     $update = $this->PengeluaranModel->update($id, $data, 'jenis_pengeluaran');
    //     if ($update) {
    //         $data = array(
    //             'pesan' => 'Data Berhasil Diupdate',
    //             'icon'  => 'success'
    //         );
    //         $this->session->set_flashdata($data);
    //         redirect("pengeluaran");
    //     } else {
    //         $data = array(
    //             'pesan' => 'Data Gagal Diupdate',
    //             'icon'  => 'danger'
    //         );
    //         $this->session->set_flashdata($data);
    //         redirect("pengeluaran");
    //     }
    // }

    // public function hapus()
	// {
	// 	$where = array(
	// 		'id_jenis_pengeluaran' => $this->uri->segment(3)
	// 	);

	// 	$hapus = $this->PengeluaranModel->delete($where, 'jenis_pengeluaran');

	// 	if ($hapus) {
	// 		$data = array(
	// 			'pesan' => 'Data Berhasil Dihapus',
	// 			'icon'  => 'success'
	// 		);
	// 		$this->session->set_flashdata($data);
	// 		redirect("pengeluaran");
	// 	} else {
	// 		$data = array(
	// 			'pesan' => 'Data Gagal Dihapus',
	// 			'icon'  => 'danger'
	// 		);
	// 		$this->session->set_flashdata($data);
	// 		redirect("pengeluaran");
	// 	}
	// }


}
?>