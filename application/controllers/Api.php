<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
	}

	public function get($url)
	{
		if ($url == "at") {
			$id_at = array('id_aktiva_tetap' => $this->input->post('id', TRUE));
			$data  = $this->DashboardModel->get_by($id_at, 'aktiva_tetap')->row();
			echo json_encode($data);

		} elseif ($url == "kategori") {
			$id_kategori = array('id_kategori' => $this->input->post('id', TRUE));
			$data        = $this->DashboardModel->get_by($id_kategori, 'kategori')->row();
			echo json_encode($data);

		} elseif ($url == "penyusutan") {

			$id_penyusutan = array('id_penyusutan' => $this->input->post('id', TRUE));
			$data          = $this->DashboardModel->get_by($id_penyusutan, 'penyusutan')->row();
			echo json_encode($data);

		} elseif ($url == "at_dihentikan") {

			$id_at_dihentikan = array('id_at_dihentikan' => $this->input->post('id', TRUE));
			$data             = $this->DashboardModel->get_by($id_at_dihentikan, 'at_dihentikan')->row();
			echo json_encode($data);

		}
	}

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */