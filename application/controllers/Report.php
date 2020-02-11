<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_m');
	}

	public function periodik()
	{
		$this->template->load('shared/template', 'report/periodik');	
		
	}
	public function tampilPeriodik()
	{
		$tgl1 = $this->input->post('tglmulai');
		$tgl2 = $this->input->post('tglakhir');
		$data['tgl1'] = $this->input->post('tglmulai');
		$data['tgl2'] = $this->input->post('tglakhir');
		$data['barcode']=$this->report_m->getByRange($tgl1,$tgl2);
		$this->template->load('shared/template', 'report/periodik_v',$data);	
	}

	public function stok()
	{
		$data['stok']=$this->report_m->getStok();
		$this->template->load('shared/template', 'report/stok',$data);	
	}

	
}


public function exportStok()
    {
        include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
        $excel = new PHPExcel();
        $excel->getProperties()->setCreator('PTGSS v.1.0')
        ->setLastModifiedBy('PTGSS v.1.0')
        ->setTitle("Laporan SPB per part")
        ->setSubject("Laporan SPB per part")
        ->setDescription("Laporan SPB per part PT GSS")
        ->setKeywords("Laporan SPB per part");

        $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
            'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN SPB PER-PART"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "KODE PART"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PART"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "QTY PLAN"); // Set kolom D3 dengan tulisan 
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "ACTUAL QTY"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "SELISIH"); // Set kolom E3 dengan tulisan "ALAMAT"

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    
    $data=$this->report_m->getStok();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($data as $data){ // Lakukan looping pada variabel siswa
        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->KodeBarang);
        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, strtoupper($data->NamaBarang));
        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, strtoupper($data->QtyPlan));
        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, strtoupper($data->ActualQty));
        $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, strtoupper($data->QtyPlan-$data->ActualQty));


      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);



      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
  }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E


    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan SPB per-Part");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan_SPB_perPart.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
}
}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */