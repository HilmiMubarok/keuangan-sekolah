<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
		$this->load->library('Pdf');
		$this->load->helper('tanggal');
		if ($this->session->userdata('logged_in') == FALSE ) {
			redirect("auth");
		}
	}

	public function admin()
	{

		if (!$this->input->get()) {
			redirect('laporan/admin','refresh');
		}


		$data['title']   = "Data Admin";
		$data['waktu']   = formatHariTanggal(date('d-M-Y'));
		$data['user']    = $this->DashboardModel->get('user')->result();
		$data['jenis']   = $this->input->get('jenis');
		$data['jabatan'] = $this->DashboardModel->get_by(array('jabatan' => $this->input->get('jabatan')), 'user')->result();

		if ($this->input->get()) {
			if (in_array('preview', $this->input->get())) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('preview/admin', $data);
				$this->load->view('templates/footer', $data);


			} elseif(in_array('cetak', $this->input->get())) {


				$this->pdf->load_view('cetak/admin', $data);
				$this->pdf->render();
				$this->pdf->stream("laporan_admin.pdf", array('Attachment'=>0));
			}
		}

			
	}

	public function kategori()
	{

		if (!$this->input->get()) {
			redirect('laporan/kategori','refresh');
		}

		$data['title']    = "Data Kategori";
		$data['waktu']    = formatHariTanggal(date('d-M-Y'));
		$data['kategori'] = $this->DashboardModel->get('kategori')->result();
		$data['jenis']    = $this->input->get('jenis');
		$data['ue']       = $this->DashboardModel->get_by(array('umur_ekonomis' => $this->input->get('option')), 'kategori')->result();


		if ($this->input->get()) {
			if (in_array('preview', $this->input->get())) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('preview/kategori', $data);
				$this->load->view('templates/footer', $data);


			} elseif(in_array('cetak', $this->input->get())) {

				$this->pdf->load_view('cetak/kategori', $data);
				$this->pdf->render();
				$this->pdf->stream("laporan_kategori.pdf", array('Attachment'=>0));
			}
		}
		
			
	}

	public function penyusutan()
	{

		if (!$this->input->get()) {
			redirect('laporan/penyusutan','refresh');
		}

			$data['at']         = $this->DashboardModel->get('aktiva_tetap')->result();
			$data['title']      = "Data Penyusutan";
			$data['waktu']      = formatHariTanggal(date('d-M-Y'));
			$join               = "penyusutan.id_aktiva_tetap = aktiva_tetap.id_aktiva_tetap";
			$join2              = "penyusutan.id_kategori = kategori.id_kategori";
			$data['penyusutan'] = $this->DashboardModel->get('penyusutan', null, null, 2, 'aktiva_tetap', $join, 'kategori', $join2)->result();
			$data['jenis']      = $this->input->get('jenis');
			$bp_where = array(
				'besar_penyusutan >= ' => $this->input->get('option1'),
				'besar_penyusutan <= ' => $this->input->get('option2')
			);
			$data['bp']         = $this->DashboardModel->get_by($bp_where, 'penyusutan')->result();
			$barang_where = array(
				'id_aktiva_tetap = ' => $this->input->get('at_lap_penyusutan')
			);
			$data['barang']   = $this->DashboardModel->get_by($barang_where, 'aktiva_tetap')->row();
			$lap_barang_where = array(
				'penyusutan.id_aktiva_tetap' => $this->input->get('at_lap_penyusutan')
			);
			$data['lap_barang'] = $this->db->join('aktiva_tetap', 'penyusutan.id_aktiva_tetap = aktiva_tetap.id_aktiva_tetap')->get_where('penyusutan', $lap_barang_where)->result();

		if ($this->input->get()) {
			if (in_array('preview', $this->input->get())) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('preview/penyusutan', $data);
				$this->load->view('templates/footer', $data);


			} elseif(in_array('cetak', $this->input->get())) {

				$this->pdf->load_view('cetak/penyusutan', $data);
				$this->pdf->render();
				$this->pdf->stream("laporan_kategori.pdf", array('Attachment'=>0));
			} 
		}


			
	}

	public function aktiva_tetap()
	{

		if (!$this->input->get()) {
			redirect('laporan/aktiva_tetap','refresh');
		}

		$data['title'] = "Data Aktiva Tetap";
		$data['waktu'] = formatHariTanggal(date('d-M-Y'));
		$data['at']    = $this->DashboardModel->get('aktiva_tetap')->result();
		$data['jenis'] = $this->input->get('jenis');
		$at_where      = array(
				'tgl_perolehan >= ' => $this->input->get('tahun1'),
				'tgl_perolehan <= ' => $this->input->get('tahun2')
			);
		$data['atw']   = $this->DashboardModel->get_by($at_where, 'aktiva_tetap')->result();

		if ($this->input->get()) {
			if (in_array('preview', $this->input->get())) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('preview/aktiva_tetap', $data);
				$this->load->view('templates/footer', $data);


			} elseif(in_array('cetak', $this->input->get())) {

				$this->pdf->load_view('cetak/aktiva_tetap', $data);
				$this->pdf->render();
				$this->pdf->stream("laporan_aktiva_tetap.pdf", array('Attachment'=>0));
			}
		}

			
	}

	public function at_dihentikan()
	{

		if (!$this->input->get()) {
			redirect('laporan/at_dihentikan','refresh');
		}

		$data['title'] = "Data Aktiva Tetap Dihentikan";
		$data['waktu'] = formatHariTanggal(date('d-M-Y'));
		$join = "at_dihentikan.id_penyusutan = penyusutan.id_penyusutan";
		$join2 = "penyusutan.id_aktiva_tetap = aktiva_tetap.id_aktiva_tetap";
		$data['atd']   = $this->DashboardModel->get('at_dihentikan', null, null, 2, 'penyusutan', $join, 'aktiva_tetap', $join2)->result();
		$data['jenis'] = $this->input->get('jenis');
		$atd_where     = array(
				'tgl_dihentikan >= ' => $this->input->get('tahun1'),
				'tgl_dihentikan <= ' => $this->input->get('tahun2')
			);
		$data['atw']   = $this->DashboardModel->get_by($atd_where, 'at_dihentikan')->result();


		if ($this->input->get()) {
			if (in_array('preview', $this->input->get())) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('preview/at_dihentikan', $data);
				$this->load->view('templates/footer', $data);


			} elseif(in_array('cetak', $this->input->get())) {

				$this->pdf->load_view('cetak/at_dihentikan', $data);
				$this->pdf->render();
				$this->pdf->stream("laporan_at_dihentikan.pdf", array('Attachment'=>0));
			}
		}

			
	}

	public function penjualan()
	{

		if (!$this->input->get()) {
			redirect('laporan/at_dihentikan','refresh');
		}

		$data['title']     = "Data Penjualan";
		$data['waktu']     = formatHariTanggal(date('d-M-Y'));
		$join              = "penjualan.id_at_dihentikan = at_dihentikan.id_at_dihentikan";
		$join2             = "at_dihentikan.id_penyusutan = penyusutan.id_penyusutan ";
		$join3             = "penyusutan.id_aktiva_tetap = aktiva_tetap.id_aktiva_tetap";		
		$data['penjualan'] = $this->DashboardModel->get('penjualan', null, null, 3, 'at_dihentikan', $join, 'penyusutan', $join2, 'aktiva_tetap', $join3)->result();
		$data['jenis']     = $this->input->get('jenis');
		$penjualan_where   = array('laba_rugi' => $this->input->get('laba_rugi'));
		$data['pwhere']    = $this->DashboardModel->get_by($penjualan_where, 'penjualan')->result();


		if ($this->input->get()) {
			if (in_array('preview', $this->input->get())) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('preview/penjualan', $data);
				$this->load->view('templates/footer', $data);


			} elseif(in_array('cetak', $this->input->get())) {

				$this->pdf->load_view('cetak/penjualan', $data);
				$this->pdf->render();
				$this->pdf->stream("laporan_penjualan.pdf", array('Attachment'=>0));
			}
		}

			
	}

}

/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */