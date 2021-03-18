<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class data_guru extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_data_guru');
			$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));					
	}
	
	function index(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
			 		$data['data_guru'] = $this->M_data_guru->data_guru();
			 		$data['hitung_guru'] = $this->M_data_guru->hitung_guru();

					$data['module'] = "data_guru";
					$data['fileview'] = "data_guru";
					echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
			 		$data['data_guru'] = $this->M_data_guru->data_guru();
			 		$data['hitung_guru'] = $this->M_data_guru->hitung_guru();

					$data['module'] = "data_guru";
					$data['fileview'] = "data_guru_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);

				}else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}

    function export(){
		  date_default_timezone_set("Asia/Jakarta");

			// $excelku = new PHPExcel();

			// // Set properties
			// $excelku->getProperties()->setCreator("SIAKAS")
			//                          ->setLastModifiedBy("ADMIN - SIAKAS");

			// // Set lebar kolom
			// $excelku->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			// $excelku->getActiveSheet()->getColumnDimension('B')->setWidth(10);
			// $excelku->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			// $excelku->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			// $excelku->getActiveSheet()->getColumnDimension('E')->setWidth(10);

			// // Mergecell, menyatukan beberapa kolom
			// $excelku->getActiveSheet()->mergeCells('A1:D1');
			// $excelku->getActiveSheet()->mergeCells('A2:D2');

			// // Buat Kolom judul tabel
			// $SI = $excelku->setActiveSheetIndex(0);
			// $SI->setCellValue('A1', 'Data Guru'); //Judul laporan
			// $SI->setCellValue('A3', 'No'); //Kolom No
			// $SI->setCellValue('B3', 'NIP Guru'); //Kolom Nama
			// $SI->setCellValue('C3', 'Nama Guru'); //Kolom Nama
			// $SI->setCellValue('D3', 'Alamat'); //Kolom Alamat
			// $SI->setCellValue('E3', 'No Telp'); //Kolom Telp

			// //Mengeset Syle nya
			// $headerStylenya = new PHPExcel_Style();
			// $bodyStylenya   = new PHPExcel_Style();

			// $headerStylenya->applyFromArray(
			// 	array('fill' 	=> array(
			// 		  'type'    => PHPExcel_Style_Fill::FILL_SOLID,
			// 		  'color'   => array('argb' => 'FFEEEEEE')),
			// 		  'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
			// 						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
			// 						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
			// 						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
			// 		  )
			// 	));
				
			// $bodyStylenya->applyFromArray(
			// 	array('fill' 	=> array(
			// 		  'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
			// 		  'color'	=> array('argb' => 'FFFFFFFF')),
			// 		  'borders' => array(
			// 						'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
			// 						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
			// 						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
			// 						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
			// 		  )
			//     ));

			// //Menggunakan HeaderStylenya
			// $excelku->getActiveSheet()->setSharedStyle($headerStylenya, "A3:D3");

			// // Mengambil data dari tabel
			// $sql	= "SELECT * from data_guru";
		 //    $hasil = mysql_query($sql);
		 //    $data  = mysql_fetch_array($hasil);
			// $baris  = 4; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
			// $no     = 1;


			// while ($data = mysql_fetch_array($hasil)) {
			//   $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
			//   $SI->setCellValue("B".$baris,$data['nip']); //mengisi data untuk nama
			//   $SI->setCellValue("C".$baris,$data['nama_guru']); //mengisi data untuk nama
			//   $SI->setCellValue("D".$baris,$data['alamat']); //mengisi data untuk alamat
			//   $SI->setCellValue("E".$baris,$data['no_telp']); //mengisi data untuk TELP
			//   $baris++; //looping untuk barisnya
			// }
			// //Membuat garis di body tabel (isi data)
			// $excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "A4:D$baris");

			// //Memberi nama sheet
			// $excelku->getActiveSheet()->setTitle('DataGuru');

			// $excelku->setActiveSheetIndex(0);

   // 			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


   //  		header('Content-Disposition: attachment;filename="data_guru.xlsx"');

  	// 		header('Cache-Control: max-age=0');


   // 			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'xlsx');


   //      	$objWriter->save('php://output');

		      // Panggil class PHPExcel nya
			    $excel = new PHPExcel();
			    // Settingan awal fil excel
			    $excel->getProperties()->setCreator('SIAKAS ADMIN')
			                 ->setLastModifiedBy('SIAKAS ADMIN')
			                 ->setTitle("Data Guru")
			                 ->setSubject("Guru")
			                 ->setDescription("Laporan Semua Data Guru")
			                 ->setKeywords("Data Guru");
			    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
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
			    $excel->setActiveSheetIndex(0)->setCellValue('A1', htmlspecialchars_decode("DATA GURU")); // Set kolom A1 dengan tulisan "DATA SISWA"
			    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
			    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
			    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			    // Buat header tabel nya pada baris ke 3
			    $excel->setActiveSheetIndex(0)->setCellValue('A3', htmlspecialchars_decode("NO")); // Set kolom A3 dengan tulisan "NO"
			    $excel->setActiveSheetIndex(0)->setCellValue('B3', htmlspecialchars_decode("NIP")); // Set kolom B3 dengan tulisan "NIS"
			    $excel->setActiveSheetIndex(0)->setCellValue('C3', htmlspecialchars_decode("NAMA GURU")); // Set kolom C3 dengan tulisan "NAMA"
			    $excel->setActiveSheetIndex(0)->setCellValue('D3', htmlspecialchars_decode("ALAMAT")); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			    $excel->setActiveSheetIndex(0)->setCellValue('E3', htmlspecialchars_decode("NO TELP")); // Set kolom E3 dengan tulisan "ALAMAT"
			    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
			    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
			    $guru = $this->M_data_guru->data_guru();
			    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
			    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			    foreach($guru as $data){ // Lakukan looping pada variabel guru
			      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, htmlspecialchars_decode($no));
			      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, htmlspecialchars_decode($data->nip));
			      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, htmlspecialchars_decode($data->nama_guru));
			      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, htmlspecialchars_decode($data->alamat));
			      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, htmlspecialchars_decode($data->no_telp));
			      
			      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			      
			      $no++; // Tambah 1 setiap kali looping
			      $numrow++; // Tambah 1 setiap kali looping
			    }
			    // Set width kolom
			    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
			    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
			    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
			    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
			    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
			    
			    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			    // Set orientasi kertas jadi LANDSCAPE
			    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			    // Set judul file excel nya
			    $excel->getActiveSheet(0)->setTitle("Laporan Data Guru");
			    $excel->setActiveSheetIndex(0);
			    // Proses file excel
				header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			    header('Content-Disposition: attachment; filename="DataGuru.xlsx"'); // Set nama file excel nya
			    header('Cache-Control: max-age=0');
			    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			    ob_end_clean();
			    $objWriter->save('php://output');
			    exit;
		}


	function tambah_data(){
		$this->M_data_guru->tambah_data();

		redirect('data_guru');
	}

	function import_data(){
		$this->M_data_guru->import_data();

		redirect('data_guru');
	}
	function edit_data(){
		$this->M_data_guru->edit_data();

		redirect('data_guru');
	}

	function hapus_data(){
		$this->M_data_guru->hapus_data();

		redirect('data_guru');
	}

	function hapus_data_all(){
		$this->M_data_guru->hapus_data_all();

		redirect('data_guru');
	}
}