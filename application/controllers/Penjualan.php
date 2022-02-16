<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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
		if ($this->input->post('cari_penjualan')) {
			$keyword = $this->input->post('cari_penjualan');
		} else {
			$keyword = null;
		}

		$data['kode']          = $this->DashboardModel->get_kode('penjualan', 'id_penjualan', 'PJLN');
		$data['title']         = "Penjualan";
		$data['jabatan']       = $this->session->userdata('jabatan');
		$data['id_user']       = $this->session->userdata('id');
		$join1                 = 'penjualan.id_at_dihentikan = at_dihentikan.id_at_dihentikan';
		$join2                 = 'at_dihentikan.id_penyusutan = penyusutan.id_penyusutan';
		$join3                 = 'penyusutan.id_aktiva_tetap = aktiva_tetap.id_aktiva_tetap';
		$data['penjualan']     = $this->DashboardModel->get('penjualan', 'nilai_jual', $keyword, 3, 'at_dihentikan', $join1, 'penyusutan', $join2, 'aktiva_tetap', $join3)->result();
		$data['nama_user']     = $this->session->userdata('nama_user');
		$data['at_dihentikan'] = $this->DashboardModel->get('at_dihentikan')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('penjualan/index.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function simpan()
	{
		$id_penjualan     = $this->input->post('id_penjualan');
		$id_at_dihentikan = $this->input->post('id_at_dihentikan');
		$nilai_jual       = $this->input->post('nilai_jual');
		$nilai_buku       = $this->input->post('nilai_buku');
		$penjualan        = $this->input->post('penjualan');
		$laba_rugi        = $this->input->post('laba_rugi');

		// Notif duplikat id at dihentikan
		$get_atd = $this->DashboardModel->get_by(array('id_at_dihentikan' => $id_at_dihentikan), 'penjualan')->result();
		

		$data   = array(
			'id_penjualan'     => $id_penjualan,
			'id_at_dihentikan' => $id_at_dihentikan,
			'nilai_jual'       => $nilai_jual,
			'nilai_buku'       => $nilai_buku,
			'penjualan'        => $penjualan,
			'laba_rugi'        => $laba_rugi
		);

		if (count($get_atd)) {
			$data = array(
				'pesan' => 'Id At Dihentikan Sudah Pernah Dijual',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("penjualan");
		} else {
			$save = $this->DashboardModel->save($data, 'penjualan');

			if ($save) {
				$data = array(
					'pesan' => 'Data Berhasil Disimpan',
					'icon'  => 'success'
				);
				$this->session->set_flashdata($data);
				redirect("penjualan");
			} else {
				$data = array(
					'pesan' => 'Data Gagal Disimpan',
					'icon'  => 'danger'
				);
				$this->session->set_flashdata($data);
				redirect("penjualan");
			}

		}

	}

	public function edit()
	{
		if ($this->session->userdata('jabatan') !== "bendahara") {
			redirect('penjualan');
		}
		$data['title']         = "Edit Penjualan";
		$data['jabatan']       = $this->session->userdata('jabatan');
		$get_penjualan         = array('id_penjualan' => $this->uri->segment(3));
		$data['penjualan']     = $this->DashboardModel->get_by($get_penjualan, 'penjualan')->row();
		$data['nama_user']     = $this->session->userdata('nama_user');
		$data['at_dihentikan'] = $this->DashboardModel->get('at_dihentikan')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('penjualan/edit_penjualan.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{


		$id_penjualan     = $this->input->post('id_penjualan');
		$id_at_dihentikan = $this->input->post('id_at_dihentikan');
		$nilai_jual       = $this->input->post('nilai_jual');
		$nilai_buku       = $this->input->post('nilai_buku');
		$penjualan        = $this->input->post('penjualan');
		$laba_rugi        = $this->input->post('laba_rugi');
		$field            = array('id_penjualan' => $id_penjualan);

		$data = array(
			'id_at_dihentikan' => $id_at_dihentikan,
			'nilai_jual'       => $nilai_jual,
			'nilai_buku'       => $nilai_buku,
			'penjualan'        => $penjualan,
			'laba_rugi'        => $laba_rugi
		);
		
		$update = $this->DashboardModel->update($field, $data, 'penjualan');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("penjualan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("penjualan");
		}
	}

	public function hapus()
	{
		if ($this->session->userdata('jabatan') !== "bendahara") {
			redirect('penjualan');
		}
		$where = array(
			'id_penjualan' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'penjualan');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("penjualan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("penjualan");
		}
	}

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */