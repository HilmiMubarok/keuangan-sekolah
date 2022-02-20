<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
		if ($this->session->userdata('jabatan') !== "waka_sarpras") {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$data['title']     = "User";
		$data['jabatan']   = $this->session->userdata('jabatan');
		$data['id_user']   = $this->session->userdata('id');

		if ($this->input->post('cari_user')) {
			$keyword      = $this->input->post('cari_user');
			$data['user'] = $this->DashboardModel->get('user', 'nama_user', $keyword)->result();
		} else {
			$get_user = array('id_user NOT LIKE' => $data['id_user']);
			$data['user'] = $this->DashboardModel->get_by($get_user, 'user')->result();
		}

		$data['kode']      = $this->DashboardModel->get_kode('user', 'id_user', 'USR');
		$data['nama_user'] = $this->session->userdata('nama_user');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/index.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function simpan()
	{
		$id       = $this->input->post('id_user');
		$nama     = $this->input->post('nama_user');
		$password = $this->input->post('password');
		$jabatan  = $this->input->post('jabatan');
		$tlpn     = $this->input->post('tlpn');

		$data   = array(
			'id_user'   => $id,
			'nama_user' => $nama,
			'password'  => $password,
			'jabatan'   => $jabatan,
			'tlpn'      => $tlpn
		);

		$save = $this->DashboardModel->save($data, 'user');

		if ($save) {
			$data = array(
				'pesan' => 'Data Berhasil Disimpan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("user");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disimpan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("user");
		}
	}

	public function edit()
	{
		$data['title']     = "Edit User";
		$data['jabatan']   = $this->session->userdata('jabatan');
		$get_user          = array('id_user' => $this->uri->segment(3));
		$data['user']      = $this->DashboardModel->get_by($get_user, 'user')->row();
		$data['nama_user'] = $this->session->userdata('nama_user');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/edit_user.php', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		$id       = $this->input->post('id_user');
		$nama     = $this->input->post('nama_user');
		$password = $this->input->post('password');
		$jabatan  = $this->input->post('jabatan');
		$tlpn     = $this->input->post('tlpn');
		$field    = array('id_user' => $id);
		$data     = array(
			
			'nama_user' => $nama,
			'password'  => $password,
			'jabatan'   => $jabatan,
			'tlpn'      => $tlpn
		);
		
		
		$update = $this->DashboardModel->update($field, $data, 'user');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("user");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("user");
		}
	}

	public function hapus()
	{
		$where = array(
			'id_user' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'user');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("user");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("user");
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */