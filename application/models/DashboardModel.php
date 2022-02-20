<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

	public function save($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	public function get($table, $field = null, $keyword = null, $join = null, $jtable1 = null, $coloumn1 = null, $jtable2 = null, $coloumn2 = null, $jtable3 = null, $coloumn3 = null)
	{
		if ($keyword) {
			if ($join == 1) {
				$this->db->like($field, $keyword);
				$this->db->join($jtable1, $coloumn1);
				return $this->db->get($table);
			} elseif ($join == 2) {
				$this->db->like($field, $keyword);
				$this->db->join($jtable1, $coloumn1);
				$this->db->join($jtable2, $coloumn2);
				return $this->db->get($table);
			} elseif ($join == 3) {
				$this->db->like($field, $keyword);
				$this->db->join($jtable1, $coloumn1);
				$this->db->join($jtable2, $coloumn2);
				$this->db->join($jtable3, $coloumn3);
				return $this->db->get($table);
			}
			$this->db->like($field, $keyword);
			return $this->db->get($table);
		} else {
			if ($join == 1) {
				$this->db->join($jtable1, $coloumn1);
				return $this->db->get($table);
			} elseif ($join == 2) {
				$this->db->join($jtable1, $coloumn1);
				$this->db->join($jtable2, $coloumn2);
				return $this->db->get($table);
			} elseif ($join == 3) {
				$this->db->join($jtable1, $coloumn1);
				$this->db->join($jtable2, $coloumn2);
				$this->db->join($jtable3, $coloumn3);
				return $this->db->get($table);
			}
			return $this->db->get($table);
		}
	}

	public function get_by($data, $table)
	{
		return $this->db->get_where($table, $data);
	}

	public function update($field, $data, $table)
	{
		return $this->db->where($field)->update($table, $data);
	}

	public function delete($field, $table)
	{
		return $this->db->where($field)->delete($table);
	}

	public function get_kode($table, $field, $format)
	{
		$this->db->select('RIGHT('.$table.'.'.$field.',3) as kode', FALSE);
		$this->db->order_by($field,'DESC');    
		$this->db->limit(1);    
		$query = $this->db->get($table);
		if($query->num_rows() <> 0){      
			$data = $query->row(); 
			$kode = intval($data->kode) + 1; 
		} else{      
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$batas      = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = $format."-".$batas;  //format kode
		return $kodetampil;  
	}


}

/* End of file WakaSarprasModel.php */
/* Location: ./application/models/WakaSarprasModel.php */