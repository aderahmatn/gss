<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nospp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('nospp_m');
		$this->load->model('barang_m');
	}

	public function index()
	{
		$data['nospp'] = $this->nospp_m->GetAll();
		$this->template->load('shared/template', 'nospp/browse', $data);	
		
	}

	public function create()
	{
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$nospp = $this->nospp_m;
		$validation = $this->form_validation;
		$validation->set_rules($nospp->rules());

		if ($validation->run() == FALSE)
		{
			$nomor = $this->nospp_m->CheckNoSpp();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
			$nourut = substr($nomor, 3, 4);
			$newnospp = $nourut + 1;
			$data= array('No_SPP' => $newnospp);
			$data['barang']=$this->barang_m->GetAll();
			$this->template->load('shared/template', 'nospp/create', $data);
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$nospp->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'No SPP berhasil ditambahkan!');
				redirect('nospp/create','refresh');
			}
		}
	}

	public function update($id = null)
	{
		if (!isset($id)) redirect('nospp');
		
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$nospp = $this->nospp_m;
		$validation = $this->form_validation;
		$validation->set_rules($nospp->rules());
		
		if ($validation->run()) {
			$post = $this->input->post(null, TRUE);
			$nospp->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'No SPP barang berhasil!');
				redirect('nospp','refresh');
			}else{
				$this->session->set_flashdata('warning', 'No SPP tidak ada yang diupdate!');
				redirect('nospp','refresh');
			}
		}
		$data['nospp'] = $this->nospp_m->GetById($id);
		if (!$data['nospp']) {
			$this->session->set_flashdata('error', 'No SPP tidak ditemukan!');
			redirect('nospp','refresh');
		}
		$this->template->load('shared/template', 'nospp/edit', $data);
	}

	public function delete($id)
	{
		$this->nospp_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'No SPP berhasil dihapus!');
			redirect('nospp','refresh');
		}
	}
}

/* End of file Nospp.php */
/* Location: ./application/controllers/Nospp.php */