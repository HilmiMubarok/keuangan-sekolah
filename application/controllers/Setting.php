<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SettingModel');
		$this->load->model('RoleModel');
        $this->load->model('AuthModel');

	}

	public function index()
    {
        $data['title'] = 'Setting';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');

		$data['roles'] = $this->RoleModel->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pengaturan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changePassword()
    {

        $data_user = $this->AuthModel->getUserById($this->session->userdata('id'));
        $pass_hash = $data_user->user_pass;
        $user_id = intval($data_user->id_user);
        
        $pass_lama = $this->input->post('pass_lama');
        
        $pass_baru = $this->input->post('pass_baru');

        $confirm_baru = $this->input->post('pass_baru_confirm');

        $pass_baru_encrypted = password_hash($pass_baru, PASSWORD_BCRYPT);


        if(password_verify($pass_lama, $pass_hash)){
            if($pass_baru != $confirm_baru){
                
                $data = array(
                    'pesan' => 'Password Harus Sama',
                    'icon'  => 'danger'
                );
                $this->session->set_flashdata($data);
                redirect("setting");
                
            } else {
                $id = ['id_user' => $user_id];
                $data = array(
                    'user_pass' => $pass_baru_encrypted
                );

                // var_dump($user_id); die;
                $update = $this->AuthModel->updatePassword($id, $data);

                if ($update) {
                    $data = array(
                        'pesan' => 'Data Berhasil Diupdate',
                        'icon'  => 'success'
                    );
                    $this->session->set_flashdata($data);
                    redirect("setting");
                } else {
                    $data = array(
                        'pesan' => 'Data Gagal Diupdate',
                        'icon'  => 'danger'
                    );
                    $this->session->set_flashdata($data);
                    redirect("setting");
                }
            }
        } else {
            $data = array(
                'pesan' => 'Password Lama Salah',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("setting");
        }

    }

}
