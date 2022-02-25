<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengeluaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengeluaranModel');
    }
    
    public function index()
    {
        $data['title'] = 'Pengeluaran';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['pengeluaran'] = $this->PengeluaranModel->get();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pengeluaran/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function simpan()
    {
        $nama = $this->input->post('nama_jenis_pengeluaran');
        $data = array(
            'nama_jenis_pengeluaran' => $nama
        );
        $save = $this->PengeluaranModel->save($data, 'jenis_pengeluaran');
        if ($save) {
            $data = array(
                'pesan' => 'Data Berhasil Disimpan',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("pengeluaran");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Disimpan',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("pengeluaran");
        }
    }

    public function edit()
	{
		$data['title']     = "Edit pengeluaran";
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
		$get_pengeluaran      = array('id_jenis_pengeluaran' => $this->uri->segment(3));
		$data['pengeluaran']  = $this->PengeluaranModel->get_by($get_pengeluaran, 'jenis_pengeluaran');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pengeluaran/edit.php', $data);
		$this->load->view('templates/footer', $data);
	}

    public function update()
    {
        $id = array('id_jenis_pengeluaran' => $this->input->post('id_jenis_pengeluaran'));
        $nama_jenis_pengeluaran = $this->input->post('nama_jenis_pengeluaran');
        $data = array(
            'nama_jenis_pengeluaran' => $nama_jenis_pengeluaran,
        );
        $update = $this->PengeluaranModel->update($id, $data, 'jenis_pengeluaran');
        if ($update) {
            $data = array(
                'pesan' => 'Data Berhasil Diupdate',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("pengeluaran");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Diupdate',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("pengeluaran");
        }
    }

    public function hapus()
	{
		$where = array(
			'id_jenis_pengeluaran' => $this->uri->segment(3)
		);

		$hapus = $this->PengeluaranModel->delete($where, 'jenis_pengeluaran');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("pengeluaran");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("pengeluaran");
		}
	}


}
?>