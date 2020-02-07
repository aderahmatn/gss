<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {

	private $_table = "tbarcode";

	public function getByRange($tgl1, $tgl2)
	{
		$this->db->select('*');
		$this->db->from('tbarcode');
		$this->db->where('tbarcode.Date >=', $tgl1);
		$this->db->where('tbarcode.Date <=', $tgl2);
		$this->db->join('tspp', 'tspp.IdSpp = tbarcode.IdSpp', 'left');
		$this->db->join('tbarang', 'tbarang.IdBarang = tspp.IdBarang', 'left');
		$this->db->order_by('tbarcode.Date','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getStok()
	{
		$this->db->from('tbarcode');
		$this->db->join('tspp', 'tspp.IdSpp = tbarcode.IdSpp', 'left');
		$this->db->join('tbarang', 'tbarang.IdBarang = tspp.IdBarang', 'left');
		$this->db->select('*, SUM(tbarcode.ActualQty) as stok');
		$this->db->group_by('tbarang.IdBarang');
		$query = $this->db->get();
		return$query->result();
	}
}

/* End of file report_m.php */
/* Location: ./application/models/report_m.php */