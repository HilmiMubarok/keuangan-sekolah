<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    public function index() {
		
        $file_data = $_FILES['file']['tmp_name'];

        $reader 	=  \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet 	= $reader->load($file_data);
        $sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
        echo "<pre>";
        // var_dump($sheet_data); die;
        $list 			= [];

        foreach($sheet_data as $key => $value) {
            if($key != 1) {
                // $list[] = [
                //     'nis' => $value[1],
                //     'nama' => $value[2],
                //     'kelas' => $value[3],
                //     'jurusan' => $value[4],
                //     'alamat' => $value[5],
                //     'tgl_lahir' => $value[6],
                //     'jenis_kelamin' => $value[7],
                //     'agama' => $value[8],
                //     'nama_ayah' => $value[9],
                //     'pekerjaan_ayah' => $value[10],
                //     'nama_ibu' => $value[11],
                //     'pekerjaan_ibu' => $value[12],
                //     'asal_sekolah' => $value[13],
                //     'telp' => $value[13],
                // ];
                $list[] = [
                    'nis' => $value[1],
                    'nisn' => $value[2],
                    'nama' => $value[3],
                    'jenkel' => $value[4],
                    'tempat_lahir' => $value[5],
                    'tgl_lahir' => $value[6],
                    'alamat' => $value[7],
                    'bapak' => $value[8],
                    'ibuk' => $value[9],
                    'pekerjaan_ortu' => $value[10],
                    'asal_sekolah' => $value[11],
                    'telp' => $value[12],
                ];
            }
        }
        unset($list[0], $list[1], $list[2], $list[3]);
        var_dump($list); die;
        
	}
    
    
}



?>