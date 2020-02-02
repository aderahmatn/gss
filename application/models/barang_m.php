<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {

	private $_table = "tbarang";

	public $IdBarang;
	public $KodeBarang;
	public $NamaBarang;
	public $Qty;
	public $Box;
	public $Label;

	public function rules()
	{
		return[
			
			['field' => 'kodebrg',
			'label' => 'Kode Barang',
			'rules' => 'required|callback_kodebrg_check'],

			['field' => 'namabrg',
			'label' => 'Nama Barang',
			'rules' => 'required'],

			['field' => 'qty',
			'label' => 'Quantity',
			'rules' => 'required|numeric'],

			['field' => 'box',
			'label' => 'Box',
			'rules' => 'required'],

			['field' => 'label',
			'label' => 'Label',
			'rules' => 'required'],
		];
	}

	public function GetAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function add()
	{
		$post = $this->input->post();
		$this->IdBarang = $post['id'];
		$this->KodeBarang = $post['kodebrg'];
		$this->NamaBarang = $post['namabrg'];
		$this->Qty = $post['qty'];
		$this->Box = $post['box'];
		$this->Label = $post['label'];
		$this->db->insert($this->_table, $this);
	}

	public function update($post)
	{
		$post = $this->input->post();
		$this->IdBarang = $post['id'];
		$this->KodeBarang = $post['kodebrg'];
		$this->NamaBarang = $post['namabrg'];
		$this->Qty = $post['qty'];
		$this->Box = $post['box'];
		$this->Label = $post['label'];
		$this->db->update($this->_table, $this, array('IdBarang' => $post['id']));
	}

	public function GetById($id)
	{
		return $this->db->get_where($this->_table,["IdBarang" => $id])->row();
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdBarang' => $id));
	}

}

/* End of file barang_m.php */
/* Location: ./application/models/barang_m.php */