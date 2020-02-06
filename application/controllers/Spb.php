<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spb extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('mesin_m');
		$this->load->model('spb_m');
		$this->load->library('pdf');
	}

	public function index()
	{
		$data['spb'] = $this->spb_m->getCount();
		$this->template->load('shared/template', 'spb/browse',$data);	
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

	public function delete($id)
	{
		$this->spb_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'SPB berhasil dihapus!');
			redirect('spb','refresh');
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

	public function printSpb($id)
	{
		
		$pdf = new FPDF('L','mm',array(212,120));
        // membuat halaman baru
		$pdf->AddPage();
		$pdf->SetTitle('SPB');
        // setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		$pdf->Cell(190,7,'SURAT PENYERAHAN BARANG',0,1,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(100,5,'Ke : Gudang Barang Jadi',0,0,'L');
		$pdf->Cell(92,5,'Tgl Cetak : '.date('d/m/Y'),0,1,'R');
		$pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])

		$pdf->SetFont('Arial','B',10);

		$pdf->Cell(7,6,'NO',1,0);
		$pdf->Cell(15,6,'NO MC',1,0);
		$pdf->Cell(20,6,'NO SPP',1,0);
		$pdf->Cell(55,6,'NAMA PART',1,0);
		$pdf->Cell(45,6,'KODE PART',1,0);
		$pdf->Cell(19,6,'LOT NO',1,0);
		$pdf->Cell(16,6,'Q PLAN',1,0);
		$pdf->Cell(15,6,'Q BOX',1,1);

		$pdf->SetFont('Arial','',7);
		$data = $this->spb_m->getById($id);
		$no=1;
		foreach ($data as $row){

			$pdf->Cell(7,6,$no++,1,0);
			$pdf->Cell(15,6,$row->NoMc,1,0);
			$pdf->Cell(20,6,$row->NoSpp,1,0);
			$pdf->Cell(55,6,$row->NamaBarang,1,0);
			$pdf->Cell(45,6,$row->KodeBarang,1,0); 
			$pdf->Cell(19,6,$row->Date.'/'.strtoupper($row->Lot),1,0); 
			$pdf->Cell(16,6,$row->QtyPlan,1,0); 
			$pdf->Cell(15,6,$row->ActualQty,1,1);
		}

		$data['jumlah']= $this->spb_m->getJumlah($id);
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(177,6,'JUMLAH PCS',1,0);
		$pdf->Cell(15,6,$data['jumlah'],1,1);
		$pdf->Cell(192,4,'',0,1);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(50,6,'Mengetahui,',0,0,'C');
		$pdf->Cell(90,6,'Penerima,',0,0,'C');
		$pdf->Cell(52,6,'Dibuat Oleh,',0,1,'C');
		$pdf->Cell(192,10,'',0,1);

		$pdf->Cell(50,6,'(Leader Produksi)',0,0,'C');
		$pdf->Cell(45,6,'(Leader GuDel)',0,0,'C');
		$pdf->Cell(45,6,'(Reach Truck)',0,0,'C');
		$pdf->Cell(52,6,'(Data Entry)',0,1,'C');

		$pdf->Output();
	}

}

/* End of file Spb.php */
/* Location: ./application/controllers/Spb.php */