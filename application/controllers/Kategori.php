<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
		if (!$this->session->userdata('logged_in')) {
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		if ($this->input->post('cari_kategori')) {
			$keyword = $this->input->post('cari_kategori');
		} else {
			$keyword = null;
		}
		$data['title']     = "Kategori";
		$data['jabatan']   = $this->session->userdata('jabatan');
		$data['kategori']  = $this->DashboardModel->get('kategori', 'nama_kategori', $keyword)->result();
		$data['nama_user'] = $this->session->userdata('nama_user');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('kategori/index.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function simpan()
	{
		$id     = $this->input->post('id_kategori');
		$nama   = $this->input->post('nama_kategori');
		$umur   = $this->input->post('umur_ekonomis');
		$status = $this->input->post('status');
		$metode = $this->input->post('metode_penyusutan');

		$data   = array(
			'id_kategori'       => $id,
			'nama_kategori'     => $nama,
			'umur_ekonomis'     => $umur,
			'status'            => $status,
			'metode_penyusutan' => $metode
		);

		$save = $this->DashboardModel->save($data, 'kategori');

		if ($save) {
			$data = array(
				'pesan' => 'Data Berhasil Disimpan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("kategori");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disimpan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("kategori");
		}
	}

	public function edit()
	{
		if ($this->session->userdata('jabatan') !== "staff_sarpras") {
			redirect('kategori');
		}
		$data['title']     = "Edit Kategori";
		$data['jabatan']   = $this->session->userdata('jabatan');
		$get_kategori      = array('id_kategori' => $this->uri->segment(3));
		$data['kategori']  = $this->DashboardModel->get_by($get_kategori, 'kategori')->row();
		$data['nama_user'] = $this->session->userdata('nama_user');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('kategori/edit_kategori.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		$id     = $this->input->post('id_kategori');
		$nama   = $this->input->post('nama_kategori');
		$umur   = $this->input->post('umur_ekonomis');
		$status = $this->input->post('status');
		$metode = $this->input->post('metode_penyusutan');
		$field  = array('id_kategori' => $id);

		$data   = array(
			'nama_kategori'     => $nama,
			'umur_ekonomis'     => $umur,
			'status'            => $status,
			'metode_penyusutan' => $metode
		);

		$update = $this->DashboardModel->update($field, $data, 'kategori');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("dashboard/kategori");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("dashboard/kategori");
		}
	}

	public function hapus()
	{
		if ($this->session->userdata('jabatan') !== "staff_sarpras") {
			redirect('kategori');
		}
		$where = array(
			'id_kategori' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'kategori');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("dashboard/kategori");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("dashboard/kategori");
		}
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */