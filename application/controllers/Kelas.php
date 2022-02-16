<?php

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
    }

    public function index()
    {
        $data['title'] = 'Kelas';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['kelas'] = $this->DashboardModel->get('kelas')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function simpan()
    {
        $nama = $this->input->post('nama_kelas');
        $data = array(
            'nama_kelas' => $nama
        );
        $save = $this->DashboardModel->save($data, 'kelas');
        if ($save) {
            $data = array(
                'pesan' => 'Data Berhasil Disimpan',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("kelas");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Disimpan',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("kelas");
        }
    }

    public function edit()
	{
		$data['title']     = "Edit Kelas";
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
		$get_kelas      = array('id_kelas' => $this->uri->segment(3));
		$data['kelas']  = $this->DashboardModel->get_by($get_kelas, 'kelas')->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('kelas/edit.php', $data);
		$this->load->view('templates/footer', $data);
	}

    public function update()
    {
        $id = array('id_kelas' => $this->input->post('id_kelas'));
        $nama = $this->input->post('nama_kelas');
        $data = array(
            'nama_kelas' => $nama
        );
        $update = $this->DashboardModel->update($id, $data, 'kelas');
        if ($update) {
            $data = array(
                'pesan' => 'Data Berhasil Diupdate',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("kelas");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Diupdate',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("kelas");
        }
    }

    public function hapus()
	{
		
		$where = array(
			'id_kelas' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'kelas');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("kelas");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("kelas");
		}
	}
}

?>