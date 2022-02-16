<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect("dashboard");
		}
		$data['title'] = "Login Keuangan Sekolah";

		$this->load->view('auth/login', $data);		
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$auth     = array('user_username' => $username );
		$res      = $this->AuthModel->cek_login('users', $auth)->row();

		


		if (password_verify($password, $res->user_pass)) {
			$user_data = array(
				'id'        => $res->id_user,
				'role' => $res->role_id,
				'username' => $res->user_username,
				'name' => $res->user_name,
				'logged_in' => TRUE
			);


			$this->session->set_userdata($user_data);

			redirect(base_url("dashboard"));
		} else {
			$flash_data = array(
				'pesan' => 'Username atau Password Salah'
			);
			$this->session->set_flashdata($flash_data);
			redirect(base_url("auth"));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}