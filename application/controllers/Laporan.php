<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	// construct
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengeluaranModel');
		$this->load->model('TransaksiModel');

		// load helper
		$this->load->helper('tanggal_helper');
	}

	public function index()
	{
		redirect('oops');
	}

	public function pengeluaran()
	{
		$data['title'] = 'Laporan Pengeluaran';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
		$data['pengeluaran'] = $this->TransaksiModel->get('pengeluaran');
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('laporan/pengeluaran', $data);
        $this->load->view('templates/footer', $data);
	}

	public function admin()
	{
		$data['title'] = "Laporan Admin";
		$data['jabatan'] = $this->session->userdata('jabatan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('laporan/admin.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function kategori()
	{
		$data['title']   = "Laporan Kategori";
		$data['jabatan'] = $this->session->userdata('jabatan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('laporan/kategori.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function penyusutan()
	{
		$this->load->model('DashboardModel');

		$data['title']   = "Laporan Penyusutan";
		$data['jabatan'] = $this->session->userdata('jabatan');
		$data['at']      = $this->DashboardModel->get('aktiva_tetap')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('laporan/penyusutan.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function aktiva_tetap()
	{
		$data['title']   = "Laporan Aktiva Tetap";
		$data['jabatan'] = $this->session->userdata('jabatan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('laporan/aktiva_tetap.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function at_dihentikan()
	{
		$data['title']   = "Laporan AT Dihentikan";
		$data['jabatan'] = $this->session->userdata('jabatan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('laporan/at_dihentikan.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function penjualan()
	{
		$data['title']   = "Laporan Penjualan";
		$data['jabatan'] = $this->session->userdata('jabatan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('laporan/penjualan.php', $data);
		$this->load->view('templates/footer', $data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */