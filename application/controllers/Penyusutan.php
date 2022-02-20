<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyusutan extends CI_Controller {

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
		if ($this->input->post('cari_penyusutan')) {
			$keyword = $this->input->post('cari_penyusutan');
		} else {
			$keyword = null;
		}
		
		$data['kode']       = $this->DashboardModel->get_kode('penyusutan', 'id_penyusutan', 'PNY');
		$data['title']      = "Penyusutan";
		$data['jabatan']    = $this->session->userdata('jabatan');
		$data['id_user']    = $this->session->userdata('id');
		$data['nama_user']  = $this->session->userdata('nama_user');
		$join               = 'aktiva_tetap.id_aktiva_tetap = penyusutan.id_aktiva_tetap';
		$join2              = 'kategori.id_kategori = penyusutan.id_kategori';
		$data['penyusutan'] = $this->DashboardModel->get('penyusutan', 'besar_penyusutan', $keyword, 2, 'aktiva_tetap', $join, 'kategori', $join2)->result();
		$data['at']         = $this->DashboardModel->get('aktiva_tetap')->result();
		$data['kategori']   = $this->DashboardModel->get('kategori')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('penyusutan/index.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function simpan()
	{
		$id_penyusutan    = $this->input->post('id_penyusutan');
		$tgl_penyusutan   = $this->input->post('tgl_penyusutan');
		$id_aktiva_tetap  = $this->input->post('id_aktiva_tetap');
		$id_kategori      = $this->input->post('id_kategori');
		$besar_penyusutan = $this->input->post('besar_penyusutan');


		$data   = array(
			'id_penyusutan'    => $id_penyusutan,
			'tgl_penyusutan'   => $tgl_penyusutan,
			'id_aktiva_tetap'  => $id_aktiva_tetap,
			'id_kategori'      => $id_kategori,
			'besar_penyusutan' => $besar_penyusutan
		);
		
		
		$save = $this->DashboardModel->save($data, 'penyusutan');

		if ($save) {
			$data = array(
				'pesan' => 'Data Berhasil Disimpan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("penyusutan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disimpan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("penyusutan");
		}	

	}

	public function edit()
	{
		if ($this->session->userdata('jabatan') !== "bendahara") {
			redirect('penyusutan');
		}
		$data['title']          = "Edit Penyusutan";
		$data['jabatan']        = $this->session->userdata('jabatan');
		$get_penyusutan         = array('id_penyusutan' => $this->uri->segment(3));
		$data['penyusutan']     = $this->DashboardModel->get_by($get_penyusutan, 'penyusutan')->row();
		$data['nama_user']      = $this->session->userdata('nama_user');
		$data['at']             = $this->DashboardModel->get('aktiva_tetap')->result();
		$get_at_where           = array('id_aktiva_tetap' => $data['penyusutan']->id_aktiva_tetap);
		$data['at_where']       = $this->DashboardModel->get_by($get_at_where, 'aktiva_tetap')->row();
		$get_kategori_where     = array('id_kategori' => $data['penyusutan']->id_kategori);
		$data['kategori_where'] = $this->DashboardModel->get_by($get_kategori_where, 'kategori')->row();
		$data['kategori']       = $this->DashboardModel->get('kategori')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('penyusutan/edit_penyusutan.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		$id_penyusutan    = $this->input->post('id_penyusutan');
		$tgl_penyusutan   = $this->input->post('tgl_penyusutan');
		$id_aktiva_tetap  = $this->input->post('id_aktiva_tetap');
		$id_kategori      = $this->input->post('id_kategori');
		$besar_penyusutan = $this->input->post('besar_penyusutan');
		$field            = array('id_penyusutan' => $id_penyusutan);

		$data   = array(
			'tgl_penyusutan'   => $tgl_penyusutan,
			'id_aktiva_tetap'  => $id_aktiva_tetap,
			'id_kategori'      => $id_kategori,
			'besar_penyusutan' => $besar_penyusutan
		);
		
		$update = $this->DashboardModel->update($field, $data, 'penyusutan');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("penyusutan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("penyusutan");
		}
	}

	public function hapus()
	{
		if ($this->session->userdata('jabatan') !== "bendahara") {
			redirect('penyusutan');
		}
		$where = array(
			'id_penyusutan' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'penyusutan');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("penyusutan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("penyusutan");
		}	
	}

}

/* End of file Penyusutan.php */
/* Location: ./application/controllers/Penyusutan.php */