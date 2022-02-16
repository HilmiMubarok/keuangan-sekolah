<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktiva_tetap extends CI_Controller {

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
		$this->load->helper('tanggal');
		if ($this->input->post('cari_aktiva_tetap')) {
			$keyword = $this->input->post('cari_aktiva_tetap');
		} else {
			$keyword = null;
		}
		
		$data['title']     = "Aktiva Tetap";
		$data['jabatan']   = $this->session->userdata('jabatan');
		$data['id_user']   = $this->session->userdata('id');
		$data['at']        = $this->DashboardModel->get('aktiva_tetap', 'nama_aktiva_tetap', $keyword)->result();
		$data['nama_user'] = $this->session->userdata('nama_user');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('aktiva_tetap/index.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function simpan()
	{
		$id              = $this->input->post('id_aktiva_tetap');
		$nama            = $this->input->post('nama_aktiva_tetap');
		$merk            = $this->input->post('merk_aktiva_tetap');
		$tgl_perolehan   = $this->input->post('tgl_perolehan');
		$harga_perolehan = $this->input->post('harga_perolehan');
		$perolehan_dana  = $this->input->post('perolehan_dana');
		$nilai_residu    = $this->input->post('nilai_residu');
		$keterangan      = $this->input->post('keterangan_aktiva_tetap');

		$data   = array(
			'id_aktiva_tetap'   => $id,
			'nama_aktiva_tetap' => $nama,
			'merk'              => $merk,
			'tgl_perolehan'     => $tgl_perolehan,
			'harga_perolehan'   => $harga_perolehan,
			'perolehan_dana'    => $perolehan_dana,
			'nilai_residu'      => $nilai_residu,
			'keterangan'        => $keterangan
		);

		$save = $this->DashboardModel->save($data, 'aktiva_tetap');

		if ($save) {
			$data = array(
				'pesan' => 'Data Berhasil Disimpan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("aktiva_tetap");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disimpan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("aktiva_tetap");
		}
	}

	public function edit()
	{
		if ($this->session->userdata('jabatan') !== "staff_sarpras") {
			redirect('aktiva_tetap');
		}
		$data['title']     = "Edit Aktiva Tetap";
		$data['jabatan']   = $this->session->userdata('jabatan');
		$get_at            = array('id_aktiva_tetap' => $this->uri->segment(3));
		$data['at']        = $this->DashboardModel->get_by($get_at, 'aktiva_tetap')->row();
		$data['nama_user'] = $this->session->userdata('nama_user');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('aktiva_tetap/edit_at.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		$id              = $this->input->post('id_aktiva_tetap');
		$nama            = $this->input->post('nama_aktiva_tetap');
		$merk            = $this->input->post('merk_aktiva_tetap');
		$tgl_perolehan   = $this->input->post('tgl_perolehan');
		$harga_perolehan = $this->input->post('harga_perolehan');
		$perolehan_dana  = $this->input->post('perolehan_dana');
		$nilai_residu    = $this->input->post('nilai_residu');
		$keterangan      = $this->input->post('keterangan_aktiva_tetap');
		$field           = array('id_aktiva_tetap' => $id);

		$data   = array(
			'nama_aktiva_tetap' => $nama,
			'merk'              => $merk,
			'tgl_perolehan'     => $tgl_perolehan,
			'harga_perolehan'   => $harga_perolehan,
			'perolehan_dana'    => $perolehan_dana,
			'nilai_residu'      => $nilai_residu,
			'keterangan'        => $keterangan
		);
		
		$update = $this->DashboardModel->update($field, $data, 'aktiva_tetap');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("aktiva_tetap");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("aktiva_tetap");
		}
	}

	public function hapus()
	{
		if ($this->session->userdata('jabatan') !== "staff_sarpras") {
			redirect('aktiva_tetap');
		}
		$where = array(
			'id_aktiva_tetap' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'aktiva_tetap');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("aktiva_tetap");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("aktiva_tetap");
		}
	}


}

/* End of file Aktiva_tetap.php */
/* Location: ./application/controllers/Aktiva_tetap.php */