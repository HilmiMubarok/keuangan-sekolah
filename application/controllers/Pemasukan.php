<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('PemasukanModel');
    }
    
    public function index()
    {
        $data['title'] = 'Pemasukan';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['pemasukan'] = $this->PemasukanModel->get();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pemasukan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function simpan()
    {
        $nama = $this->input->post('nama_jenis_pemasukan');
        $periode = $this->input->post('periode_pemasukan');
        $nominal = $this->input->post('nominal');
        $data = array(
            'nama_jenis_pemasukan' => $nama,
            'periode_pemasukan' => $periode,
            'nominal' => $nominal
        );
        $save = $this->PemasukanModel->save($data, 'jenis_pemasukan');
        if ($save) {
            $data = array(
                'pesan' => 'Data Berhasil Disimpan',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("pemasukan");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Disimpan',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("pemasukan");
        }
    }

    public function edit()
	{
		$data['title']     = "Edit Pemasukan";
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
		$get_pemasukan      = array('id_jenis_pemasukan' => $this->uri->segment(3));
		$data['pemasukan']  = $this->PemasukanModel->get_by($get_pemasukan, 'jenis_pemasukan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pemasukan/edit.php', $data);
		$this->load->view('templates/footer', $data);
	}

    public function update()
    {
        $id = array('id_jenis_pemasukan' => $this->input->post('id_jenis_pemasukan'));
        $nama_jenis_pemasukan = $this->input->post('nama_jenis_pemasukan');
        $nominal = $this->input->post('nominal');
        $periode = $this->input->post('periode_pemasukan');
        $data = array(
            'nama_jenis_pemasukan' => $nama_jenis_pemasukan,
            'periode_pemasukan' => $periode,
            'nominal' => $nominal
            
        );
        $update = $this->PemasukanModel->update($id, $data, 'jenis_pemasukan');
        if ($update) {
            $data = array(
                'pesan' => 'Data Berhasil Diupdate',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("pemasukan");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Diupdate',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("pemasukan");
        }
    }

    public function hapus()
	{
		
		$where = array(
			'id_jenis_pemasukan' => $this->uri->segment(3)
		);

		$hapus = $this->PemasukanModel->delete($where, 'jenis_pemasukan');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("pemasukan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("pemasukan");
		}
	}


}
?>