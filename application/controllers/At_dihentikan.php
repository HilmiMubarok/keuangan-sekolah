<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class At_dihentikan extends CI_Controller {

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
		if ($this->input->post('cari_at_dihentikan')) {
			$keyword = $this->input->post('cari_at_dihentikan');
		} else {
			$keyword = null;
		}
		
		$data['kode']          = $this->DashboardModel->get_kode('at_dihentikan', 'id_at_dihentikan', 'ATH');
		$data['title']         = "Aktiva Tetap Dihentikan";
		$data['jabatan']       = $this->session->userdata('jabatan');
		$data['id_user']       = $this->session->userdata('id');
		$data['nama_user']     = $this->session->userdata('nama_user');
		$join1                 = 'penyusutan.id_penyusutan = at_dihentikan.id_penyusutan';
		$join2 = 'penyusutan.id_kategori = kategori.id_kategori';
		$join3                 = 'aktiva_tetap.id_aktiva_tetap = penyusutan.id_aktiva_tetap';
		$data['at_dihentikan'] = $this->DashboardModel->get('at_dihentikan', 'id_at_dihentikan', $keyword, 3, 'penyusutan', $join1, 'kategori', $join2, 'aktiva_tetap', $join3)->result();

		$data['penyusutan']    = $this->DashboardModel->get('penyusutan')->result();

		// Notif Umur Ekonomis
		// $this->db->join('kategori', 'penyusutan.id_kategori = kategori.id_kategori');
		// $this->db->join('aktiva_tetap', 'penyusutan.id_aktiva_tetap = aktiva_tetap.id_aktiva_tetap');
		// $data['get_at_atd'] = $this->db->get('penyusutan')->result();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('at_dihentikan/index.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function simpan()
	{
		$id_at_dihentikan = $this->input->post('id_at_dihentikan');
		$tgl_dihentikan   = $this->input->post('tgl_dihentikan');
		$id_penyusutan    = $this->input->post('id_penyusutan');
		$besar_penyusutan = $this->input->post('besar_penyusutan');
		$nilai_jual       = $this->input->post('nilai_jual');
		$nilai_buku       = $this->input->post('nilai_buku');

		// Notif mencegah duplikat id penyusutan
		$this->db->join('penyusutan', 'at_dihentikan.id_penyusutan = penyusutan.id_penyusutan');
		$this->db->join('aktiva_tetap', 'penyusutan.id_aktiva_tetap = aktiva_tetap.id_aktiva_tetap');
		$get_ip = $this->db->where('at_dihentikan.id_penyusutan', $id_penyusutan)->get('at_dihentikan')->result();

		$data   = array(
			'id_at_dihentikan' => $id_at_dihentikan,
			'tgl_dihentikan'   => $tgl_dihentikan,
			'id_penyusutan'    => $id_penyusutan,
			'besar_penyusutan' => $besar_penyusutan,
			'nilai_jual'       => $nilai_jual,
			'nilai_buku'       => $nilai_buku
		);


		if (count($get_ip) > 0) {
			$data = array(
				'pesan' => $get_ip[0]->nama_aktiva_tetap.' Sudah Pernah Dihentikan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("at_dihentikan");
		} else {
			$save = $this->DashboardModel->save($data, 'at_dihentikan');
			if ($save) {
				$data = array(
					'pesan' => 'Data Berhasil Disimpan',
					'icon'  => 'success'
				);
				$this->session->set_flashdata($data);
				redirect("at_dihentikan");
			} else {
				$data = array(
					'pesan' => 'Data Gagal Disimpan',
					'icon'  => 'danger'
				);
				$this->session->set_flashdata($data);
				redirect("at_dihentikan");
			}
		}

	}

	public function edit()
	{
		if ($this->session->userdata('jabatan') !== "bendahara") {
			redirect('at_dihentikan');
		}
		$data['title']            = "Aktiva Tetap Dihentikan";
		$data['jabatan']          = $this->session->userdata('jabatan');
		$data['id_user']          = $this->session->userdata('id');
		$data['nama_user']        = $this->session->userdata('nama_user');
		$get_at_dihentikan        = array('id_at_dihentikan' => $this->uri->segment(3));
		$data['at_dihentikan']    = $this->DashboardModel->get_by($get_at_dihentikan, 'at_dihentikan')->row();


		$data['penyusutan']       = $this->DashboardModel->get('penyusutan')->result();
		$get_penyusutan_where     = array('id_penyusutan' => $data['at_dihentikan']->id_penyusutan);
		$data['penyusutan_where'] = $this->DashboardModel->get_by($get_penyusutan_where, 'penyusutan')->row();
		$get_at_where             = array('id_aktiva_tetap' => $data['penyusutan_where']->id_aktiva_tetap);
		$data['at_where']         = $this->DashboardModel->get_by($get_at_where, 'aktiva_tetap')->row();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('at_dihentikan/edit_at_dihentikan.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		$id_at_dihentikan = $this->input->post('id_at_dihentikan');
		$tgl_dihentikan   = $this->input->post('tgl_dihentikan');
		$id_penyusutan    = $this->input->post('id_penyusutan');
		$besar_penyusutan = $this->input->post('besar_penyusutan');
		$nilai_jual       = $this->input->post('nilai_jual');
		$nilai_buku       = $this->input->post('nilai_buku');
		$field            = array('id_at_dihentikan' => $id_at_dihentikan);

		$data   = array(
			'tgl_dihentikan'   => $tgl_dihentikan,
			'id_penyusutan'    => $id_penyusutan,
			'besar_penyusutan' => $besar_penyusutan,
			'nilai_jual'       => $nilai_jual,
			'nilai_buku'       => $nilai_buku
		);
		
		$update = $this->DashboardModel->update($field, $data, 'at_dihentikan');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("at_dihentikan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("at_dihentikan");
		}
	}

	public function hapus()
	{
		if ($this->session->userdata('jabatan') !== "bendahara") {
			redirect('at_dihentikan');
		}
		$where = array(
			'id_at_dihentikan' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'at_dihentikan');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("at_dihentikan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("at_dihentikan");
		}
	}

}

/* End of file At_dihentikan.php */
/* Location: ./application/controllers/At_dihentikan.php */