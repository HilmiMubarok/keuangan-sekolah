<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('KelasModel');
        $this->load->model('SiswaModel');
    }

    public function index()
    {
        $data['title'] = 'Siswa';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['siswa'] = $this->SiswaModel->get();


        // $data['kelas'] = $this->KelasModel->get();
        // $data['jurusan'] = $this->JurusanModel->get();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer', $data);
    }

}


?>