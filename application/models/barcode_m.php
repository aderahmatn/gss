<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode_m extends CI_Model {

	private $_table = "tbarcode";

	public $IdBarcode;
	public $IdSpp;
	public $Date;
	public $Lot;
	public $ActualQty;

	public function rules()
	{
		return[
			
			['field' => 'lotno',
			'label' => 'Kode Shif',
			'rules' => 'required'],

			['field' => 'actualqty',
			'label' => 'Actual Quantity',
			'rules' => 'required|numeric'],

			['field' => 'idspp',
			'label' => 'No SPP',
			'rules' => 'required']
		];
	}

	public function GetAll()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tspp', 'tbarcode.IdSpp = tspp.IdSpp', 'left');
		$this->db->join('tbarang', 'tbarang.IdBarang = tspp.IdBarang', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetById($id)
	{

		return $this->db->get_where($this->_table,["idbarcode" => $id])->row();
	}

	public function GetByIdJoin($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tspp', 'tspp.IdSpp = tbarcode.IdSpp', 'left');
		$this->db->join('tbarang', 'tbarang.IdBarang = tspp.IdBarang', 'left');
		$this->db->where('tbarcode.Idbarcode', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function add()
	{
		$post = $this->input->post();
		$this->IdBarcode = $post['id'];
		$this->IdSpp = $post['idspp'];
		$this->Date = $post['date'];
		$this->Lot = $post['lotno'];
		$this->ActualQty = $post['actualqty'];
		$this->db->insert($this->_table, $this);
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('idbarcode' => $id));
	}
}

/* End of file barcode_m.php */
/* Location: ./application/models/barcode_m.php */