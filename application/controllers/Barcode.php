<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('nospp_m');
		$this->load->model('barcode_m');
	}

	public function index()
	{
		$data['brd'] = $this->barcode_m->GetAll();
		$this->template->load('shared/template', 'barcode/browse', $data);
	}

	public function create()
	{
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$barcode = $this->barcode_m;
		$validation = $this->form_validation;
		$validation->set_rules($barcode->rules());

		if ($validation->run() == FALSE)
		{
			$data['nospp']=$this->nospp_m->GetAll();
			$this->template->load('shared/template', 'barcode/create', $data);
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$barcode->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Label siap untuk dicetak!');
				redirect('barcode','refresh');
			}
		}
	}

	public function printbar($id=NULL)
	{
		$data['barcode']=$this->barcode_m->GetByIdJoin($id);
		$this->template->load('shared/template', 'barcode/print', $data);
	}

	public function delete($id)
	{
		$this->barcode_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Barcode berhasil dihapus!');
			redirect('barcode','refresh');
		}
	}
}

/* End of file Barcode.php */
/* Location: ./application/controllers/Barcode.php */