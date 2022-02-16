<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
		if ($this->session->userdata('logged_in') == FALSE ) {
			redirect("auth");
		}
	}

	public function index()
	{
		$data['title']     = "Dashboard";

		if ($this->session->userdata('role') == 1) {
			$data['jabatan']   = "Admin";
		} elseif ($this->session->userdata('role') == 2) {
			$data['jabatan']   = "Monitoring";
		}

		$data['nama_user'] = $this->session->userdata('name');		
		// $data['at']        = count($this->DashboardModel->get('aktiva_tetap')->result());
		// $data['atd']       = count($this->DashboardModel->get('at_dihentikan')->result());
		// $data['penjualan'] = count($this->DashboardModel->get('penjualan')->result());

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('dashboard.php', $data);
		$this->load->view('templates/footer', $data);
		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */