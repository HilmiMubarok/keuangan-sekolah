<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SiswaModel');
        $this->load->model('KelasModel');
        $this->load->model('TransaksiModel');
        $this->load->model('PemasukanModel');

        // load helper
        $this->load->helper('tanggal_helper');
    }

    public function index()
    {
        $data['title'] = 'Siswa';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['siswa'] = $this->SiswaModel->get();
        $data['kelas'] = $this->KelasModel->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
        $data['siswa'] = $this->SiswaModel->get_by(['id_siswa' => $id]);
        $data['kelas'] = $this->KelasModel->get();
        $data['pembayaran'] = $this->TransaksiModel->getBySiswa($id);
        $data['pemasukan'] = $this->PemasukanModel->getBy(['sumber_pemasukan' => 'Siswa']);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('siswa/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function save($isKelas = null)
    {
        $data = [
            'kelas_id' => intval($this->input->post('kelas_id')),
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'jenkel' => $this->input->post('jenkel'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => formatHariTanggal($this->input->post('tgl_lahir')),
            'alamat' => $this->input->post('alamat'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'telp' => $this->input->post('telp'),
            'status' => 'siswa'
        ];

        $save = $this->SiswaModel->save($data);
        if ($save) {
            $data = array(
                'pesan' => 'Data Berhasil Disimpan',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            ( $isKelas == null ) ? redirect('siswa') : redirect('kelas/detail/'.$this->input->post('kelas_id'));
        } else {
            $data = array(
                'pesan' => 'Data Gagal Disimpan',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            ( $isKelas == null ) ? redirect('siswa') : redirect('kelas/detail/'.$this->input->post('kelas_id'));
        }
    }

    public function edit()
	{
		$data['title']     = "Edit Siswa";
        $data['jabatan']   = $this->session->userdata('role');
        $data['nama_user'] = $this->session->userdata('name');
		$get_siswa      = array('id_siswa' => $this->uri->segment(3));
		$data['siswa']  = $this->SiswaModel->get_by($get_siswa, 'siswa');
        $data['kelas'] = $this->KelasModel->get();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('siswa/edit.php', $data);
		$this->load->view('templates/footer', $data);
	}

    public function update()
    {
        $id = ['id_siswa' => $this->input->post('id_siswa')];
        $data = [
            'kelas_id' => intval($this->input->post('kelas_id')),
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'jenkel' => $this->input->post('jenkel'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => formatHariTanggal($this->input->post('tgl_lahir')),
            'alamat' => $this->input->post('alamat'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'telp' => $this->input->post('telp'),
            'status' => 'siswa'
        ];

        $update = $this->SiswaModel->update($id, $data, 'siswa');
        if ($update) {
            $data = array(
                'pesan' => 'Data Berhasil Diupdate',
                'icon'  => 'success'
            );
            $this->session->set_flashdata($data);
            redirect("siswa");
        } else {
            $data = array(
                'pesan' => 'Data Gagal Diupdate',
                'icon'  => 'danger'
            );
            $this->session->set_flashdata($data);
            redirect("siswa");
        }
    }


    public function hapus()
	{

        $id = ['id_siswa' => $this->uri->segment(3)];

        $data = [
            'status' => 'hapus'
        ];

		$hapus = $this->SiswaModel->update($id, $data, 'siswa');

		if ($hapus) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("siswa");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("siswa");
		}
	}


    
    

}


?>