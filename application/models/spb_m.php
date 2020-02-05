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

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tbarcode', 'tbarcode.idbarcode = tspb.IdBarcode', 'left');
		$this->db->join('tspp', 'tspp.IdSpp = tbarcode.IdSpp', 'left');
		$this->db->where('IdSpb', $id);
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file spb_m.php */
/* Location: ./application/models/spb_m.php */