<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SettingModel');
		$this->load->model('RoleModel');
	}

	public function index()
    {
        $data['title'] = 'Setting';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');

		$data['roles'] = $this->RoleModel->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pengaturan/index', $data);
        $this->load->view('templates/footer', $data);
    }

}
