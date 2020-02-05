<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nospp_m extends CI_Model {

	private $_table = "tspp";

	public $IdSpp;
	public $NoSpp;
	public $IdBarang;
	public $QtyPlan;

	public function rules()
	{
		return[
			
			['field' => 'kodebrg',
			'label' => 'Kode Barang',
			'rules' => 'required'],

			['field' => 'qtyplan',
			'label' => 'Quantity Planning',
			'rules' => 'required|numeric'],
		];
	}

	public function GetAll()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tbarang', 'tbarang.IdBarang = tspp.IdBarang', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetByIdJoin($id)
	{
		$this->db->select('*');
		$this->db->select('tspp.IdSpp');
		$this->db->from($this->_table);
		$this->db->join('tbarcode', 'tbarcode.IdSpp = tspp.IdSpp', 'left');
		$this->db->join('tbarang', 'tbarang.IdBarang = tspp.IdBarang', 'left');
		$this->db->where('tspp.IdSpp', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function add()
	{
		$post = $this->input->post();
		$this->IdSpp = $post['id'];
		$this->NoSpp = $post['nospp'];
		$this->IdBarang = $post['kodebrg'];
		$this->QtyPlan = $post['qtyplan'];
		$this->db->insert($this->_table, $this);
	}

	public function update($post)
	{
		$post = $this->input->post();
		$this->IdSpp = $post['id'];
		$this->NoSpp = $post['nospp'];
		$this->IdBarang = $post['kodebrg'];
		$this->QtyPlan = $post['qtyplan'];
		$this->db->update($this->_table, $this, array('IdSpp' => $post['id']));
	}

	public function GetById($id)
	{
		return $this->db->get_where($this->_table,["IdSpp" => $id])->row();
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdSpp' => $id));
	}

	public function CheckNoSpp()
    {
        $query = $this->db->query("SELECT MAX(NoSpp) as NoSPP from tspp");
        $hasil = $query->row();
        return $hasil->NoSPP;
    }

}

/* End of file nospp_m.php */
/* Location: ./application/models/nospp_m.php */