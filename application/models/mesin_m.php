<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin_m extends CI_Model {

	private $_table = "tmesin";

	public $IdMesin;
	public $NoMc;
	public $Merk;
	public $Tonase;

	public function rules()
	{
		return[
			
			['field' => 'nomc',
			'label' => 'No MC',
			'rules' => 'required|callback_nomc_check'],

			['field' => 'merk',
			'label' => 'Merk',
			'rules' => 'required'],

			['field' => 'tonase',
			'label' => 'Tonasi',
			'rules' => 'required|numeric'],
		];
	}

	public function GetAll()
	{
		return $this->db->get($this->_table)->result();
	}
	public function add()
	{
		$post = $this->input->post();
		$this->IdMesin = $post['id'];
		$this->NoMc = $post['nomc'];
		$this->Merk = $post['merk'];
		$this->Tonase = $post['tonase'];
		$this->db->insert($this->_table, $this);
	}
	public function GetById($id)
	{
		return $this->db->get_where($this->_table,["IdMesin" => $id])->row();
	}
	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdMesin' => $id));
	}
}

/* End of file mesin_m.php */
/* Location: ./application/models/mesin_m.php */