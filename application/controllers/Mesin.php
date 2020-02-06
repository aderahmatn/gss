<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		check_role_admin();
		$this->load->model('mesin_m');
	}

	public function index()
	{	
		$data['mesin'] = $this->mesin_m->GetAll();
		$this->template->load('shared/template', 'mesin/browse', $data);	
		
	}

	public function create()
	{
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$mesin = $this->mesin_m;
		$validation = $this->form_validation;
		$validation->set_rules($mesin->rules());

		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'mesin/create');
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$mesin->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data mesin berhasil ditambahkan!');
				redirect('mesin/create','refresh');
			}
		}
	}

	public function update($id = null)
	{
		if (!isset($id)) redirect('mesin');
		
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$mesin = $this->mesin_m;
		$validation = $this->form_validation;
		$validation->set_rules($mesin->rules());
		
		if ($validation->run()) {
			$post = $this->input->post(null, TRUE);
			$mesin->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Update data mesin berhasil!');
				redirect('mesin','refresh');
			}else{
				$this->session->set_flashdata('warning', 'Data mesin tidak ada yang diupdate!');
				redirect('mesin','refresh');
			}
		}
		$data['mesin'] = $this->mesin_m->GetById($id);
		if (!$data['mesin']) {
			$this->session->set_flashdata('error', 'Data mesin tidak ditemukan!');
			redirect('mesin','refresh');
		}
		$this->template->load('shared/template', 'mesin/edit', $data);
	}

	public function delete($id)
	{
		$this->mesin_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data mesin berhasil dihapus!');
			redirect('mesin','refresh');
		}
	}

	public function nomc_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tmesin WHERE NoMc = '$post[nomc]' AND IdMesin != '$post[id]' ");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('nomc_check','%s sudah ada!');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

/* End of file Mesin.php */
/* Location: ./application/controllers/Mesin.php */