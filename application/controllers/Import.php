<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('SiswaModel');
        $this->load->model('JenisPemasukanModel');
    }
    
    public function index() {
		
        $file_data = $_FILES['file']['tmp_name'];


        $reader 	=  \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet 	= $reader->load($file_data);
        $sheet_data 	= $spreadsheet->getActiveSheet()->toArray();

        $list 			= [];

        foreach($sheet_data as $key => $value) {
            if($key != 1) {
                $list[] = [
                    'kelas_id' => intval($this->input->post('kelas_id')),
                    'nis' => intval($value[1]),
                    'nisn' => intval($value[2]),
                    'nama' => $value[3],
                    'jenkel' => $value[4],
                    'tempat_lahir' => $value[5],
                    'tgl_lahir' => $value[6],
                    'alamat' => $value[7],
                    'nama_ayah' => $value[8],
                    'nama_ibu' => $value[9],
                    'pekerjaan_ortu' => $value[10],
                    'asal_sekolah' => $value[11],
                    'telp' => $value[12],
                    'status' => 'siswa'
                ];
            }
        }
        unset($list[0], $list[1], $list[2], $list[3]);


        $siswa = $this->SiswaModel->saveBatch(array_filter(array_splice($list, 0, $this->input->post('jml'))));

        if($siswa) {
            $this->session->set_flashdata('success', 'Data berhasil diimport');
            redirect('kelas/detail/'.$this->input->post('kelas_id'));
        } else {
            $this->session->set_flashdata('error', 'Data gagal diimport');
            redirect('kelas/detail/'.$this->input->post('kelas_id'));
        }
        
	}
    
    
}



?>