<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('barang_m');
	}

	public function index()
	{
		$data['barang'] = $this->barang_m->GetAll();
		$this->template->load('shared/template', 'barang/browse', $data);	
		
	}

	public function create()
	{
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$barang = $this->barang_m;
		$validation = $this->form_validation;
		$validation->set_rules($barang->rules());

		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'barang/create');
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$barang->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data barang berhasil ditambahkan!');
				redirect('barang/create','refresh');
			}
		}
	}

	public function update($id = null)
	{
		if (!isset($id)) redirect('barang');
		
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$barang = $this->barang_m;
		$validation = $this->form_validation;
		$validation->set_rules($barang->rules());
		
		if ($validation->run()) {
			$post = $this->input->post(null, TRUE);
			$barang->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Update data barang berhasil!');
				redirect('barang','refresh');
			}else{
				$this->session->set_flashdata('warning', 'Data barang tidak ada yang diupdate!');
				redirect('barang','refresh');
			}
		}
		$data['barang'] = $this->barang_m->GetById($id);
		if (!$data['barang']) {
			$this->session->set_flashdata('error', 'Data barang tidak ditemukan!');
			redirect('barang','refresh');
		}
		$this->template->load('shared/template', 'barang/edit', $data);
	}

	public function delete($id)
	{
		$this->barang_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data barang berhasil dihapus!');
			redirect('barang','refresh');
		}
	}
	public function kodebrg_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tbarang WHERE KodeBarang = '$post[kodebrg]' AND IdBarang != '$post[id]' ");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('kodebrg_check','%s sudah ada!');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */