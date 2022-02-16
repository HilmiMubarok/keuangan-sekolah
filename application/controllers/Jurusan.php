<!-- codeigniter 3 controller -->
<?php

class Jurusan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
        // $this->load->model('Jurusan_model');
        // $this->load->model('Kelas_model');
        // $this->load->model('Siswa_model');
        // $this->load->model('Pengeluaran_model');
        // $this->load->model('Pemasukan_model');
        // $this->load->model('jurusan_model');
        // $this->load->model('User_model');
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Jurusan';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['jurusan'] = $this->DashboardModel->get('jurusan')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('jurusan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function simpan()
    {
        $nama = $this->input->post('nama_jurusan');
        $data = array(
            'nama_jurusan' => $nama
        );
        $save = $this->DashboardModel->save($data, 'jurusan');
        if ($save) {
            $data = array(
                'pesan' => 'Data Berhasil Disimpan',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("jurusan");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Disimpan',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("jurusan");
        }
    }

    public function hapus()
	{
		
		$where = array(
			'id_jurusan' => $this->uri->segment(3)
		);

		$hapus = $this->DashboardModel->delete($where, 'jurusan');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("jurusan");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("jurusan");
		}
	}

}

?>