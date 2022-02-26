<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
		$this->load->model('KelasModel');
		$this->load->model('JurusanModel');
		$this->load->model('SiswaModel');
		$this->load->model('TransaksiModel');

		if ($this->session->userdata('logged_in') == FALSE ) {
			redirect("auth");
		}
	}

	public function index()
	{
		$data['title']     = "Dashboard";

		$data['jabatan'] = $this->session->userdata('role');
		$data['nama_user'] = $this->session->userdata('name');
		$data['jumlah_kelas'] = $this->KelasModel->getTotal();		
		$data['jumlah_jurusan'] = $this->JurusanModel->getTotal();
		$data['jumlah_siswa'] = $this->SiswaModel->getTotal();
		$data['jumlah_pengeluaran'] = $this->TransaksiModel->getTotalTransaksi("pengeluaran");
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('dashboard.php', $data);
		$this->load->view('templates/footer', $data);
		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */