<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SiswaModel');
        $this->load->model('KelasModel');
        $this->load->model('TransaksiModel');
        $this->load->model('PemasukanModel');

        // load helper
        $this->load->helper('tanggal_helper');
    }

    public function index()
    {
        $data['title'] = 'Siswa';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['siswa'] = $this->SiswaModel->get();
        $data['kelas'] = $this->KelasModel->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['siswa'] = $this->SiswaModel->get_by(['id_siswa' => $id]);
        $data['kelas'] = $this->KelasModel->get();
        $data['pembayaran'] = $this->TransaksiModel->getBySiswa($id);
        $data['pemasukan'] = $this->PemasukanModel->getBy(['sumber_pemasukan' => 'Siswa']);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('siswa/detail', $data);
        $this->load->view('templates/footer', $data);
    }

}


?>