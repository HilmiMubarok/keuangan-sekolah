<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

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
        $nama = $this->input->post('nama_jenis_Pengeluaran');
        $periode = $this->input->post('periode_Pengeluaran');
        $nominal = $this->input->post('nominal');
        $data = array(
            'nama_jenis_Pengeluaran' => $nama,
            'periode_Pengeluaran' => $periode,
            'nominal' => $nominal
        );
        $save = $this->PengeluaranModel->save($data, 'jenis_Pengeluaran');
        if ($save) {
            $data = array(
                'pesan' => 'Data Berhasil Disimpan',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("Pengeluaran");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Disimpan',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("Pengeluaran");
        }
    }

    public function edit()
	{
		$data['title']     = "Edit Pengeluaran";
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
		$get_Pengeluaran      = array('id_jenis_Pengeluaran' => $this->uri->segment(3));
		$data['Pengeluaran']  = $this->PengeluaranModel->get_by($get_Pengeluaran, 'jenis_Pengeluaran');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('Pengeluaran/edit.php', $data);
		$this->load->view('templates/footer', $data);
	}

    public function update()
    {
        $id = array('id_jenis_Pengeluaran' => $this->input->post('id_jenis_Pengeluaran'));
        $nama_jenis_Pengeluaran = $this->input->post('nama_jenis_Pengeluaran');
        $nominal = $this->input->post('nominal');
        $periode = $this->input->post('periode_Pengeluaran');
        $data = array(
            'nama_jenis_Pengeluaran' => $nama_jenis_Pengeluaran,
            'periode_Pengeluaran' => $periode,
            'nominal' => $nominal
            
        );
        $update = $this->PengeluaranModel->update($id, $data, 'jenis_Pengeluaran');
        if ($update) {
            $data = array(
                'pesan' => 'Data Berhasil Diupdate',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("Pengeluaran");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Diupdate',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("Pengeluaran");
        }
    }

    public function hapus()
	{
		
		$where = array(
			'id_jenis_Pengeluaran' => $this->uri->segment(3)
		);

		$hapus = $this->PengeluaranModel->delete($where, 'jenis_Pengeluaran');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("Pengeluaran");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("Pengeluaran");
		}
	}


}
?>