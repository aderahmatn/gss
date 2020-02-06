<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spb_m extends CI_Model {

	private $_table = "tspb";

	public $IdSpb;
	public $IdBarcode;
	public $IdMesin;

	public function rules()
	{
		return[
			
			['field' => 'nomc',
			'label' => 'No Mesin',
			'rules' => 'required']
		];
	}

	public function add()
	{
		$post = $this->input->post();
		$this->IdSpb = $post['id'];
		$this->IdBarcode = $post['barcode'];
		$this->IdMesin = $post['nomc'];
		$this->db->insert($this->_table, $this);
	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tmesin', 'tmesin.IdMesin = tspb.IdMesin', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function getCount()
	{
		$this->db->select('IdSpb, tspb.IdMesin, tmesin.NoMc');
		$this->db->select('count(IdBarcode) AS jml');
		$this->db->group_by('IdSpb');
		$this->db->from($this->_table);
		$this->db->join('tmesin', 'tmesin.IdMesin = tspb.IdMesin', 'left');	
		$query = $this->db->get();
		return $query->result();
	}

	public function getJumlah($id)
	{
		$this->db->from($this->_table);
		$this->db->where('tspb.IdSpb', $id);
		$this->db->join('tbarcode', 'tbarcode.idbarcode = tspb.IdBarcode', 'left');	
		$this->db->select('SUM(tbarcode.ActualQty) AS jml');
		$this->db->group_by('tspb.IdSpb');
		$query = $this->db->get();
		$hasil = $query->row();
		return $hasil->jml;
	}

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('tspb.IdSpb', $id);
		$this->db->join('tbarcode', 'tbarcode.idbarcode = tspb.IdBarcode', 'left');	
		$this->db->join('tmesin', 'tmesin.IdMesin = tspb.IdMesin', 'left');	
		$this->db->join('tspp', 'tspp.IdSpp = tbarcode.IdSpp', 'left');
		$this->db->join('tbarang', 'tbarang.Idbarang = tspp.Idbarang', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdSpb' => $id));
	}
}

/* End of file spb_m.php */
/* Location: ./application/models/spb_m.php */