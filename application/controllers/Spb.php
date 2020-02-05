<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spb extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mesin_m');
		$this->load->model('spb_m');
	}

	public function index()
	{
		$this->template->load('shared/template', 'spb/browse');	
	}

	public function create()
	{
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$spb = $this->spb_m;
		$validation = $this->form_validation;
		$validation->set_rules($spb->rules());

		if ($validation->run() == FALSE)
		{
			$data['mesin'] = $this->mesin_m->GetAll();
			$this->template->load('shared/template', 'spb/create',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$data['val'] = $this->input->post(null, TRUE);
			$data['scan'] = $this->spb_m->getById($id);
			$this->template->load('shared/template', 'spb/scan',$data);
		}
	}



	public function scanbar()
	{
		$spb = $this->spb_m;
		$post = $this->input->post(null, TRUE);
		$spb->add($post);
		$id=$this->input->post('id');
		$data['scan'] = $this->spb_m->getById($id);
		$data['val'] = $this->input->post(null, TRUE);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Scan berhasil');
			$this->template->load('shared/template', 'spb/scan',$data);
		}
	}

}

/* End of file Spb.php */
/* Location: ./application/controllers/Spb.php */