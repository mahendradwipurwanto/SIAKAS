<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class printer extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_printer');
			$this->load->library('Pdf');						
	}

	function index(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}	

	function cetak_guru() {
		
		
    $sql    = "SELECT * FROM data_guru";
	
    $hasil = mysql_query($sql);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Data Guru');
    $pdf->SetSubject('Daftar Data Guru');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('helvetica', '', '9', '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<h6 align="center"><img src="assets/backend/images/kopsurat/eksternal.png" width="600px" height="100px"></h6>
			<hr>
			<br>
			<h3 align="center">Daftar Nama Guru SMKN 8 MALANG</h3>
			<br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th width="5%">No</th>
                <th width="15%">NIP</th>
              	<th width="25%">Nama Guru</th>
              	<th width="35%">Alamat</th>
              	<th width="20%">No Telepon </th>
             
             </tr>
			 </table>';
			 $no=1;
		   while ($data = mysql_fetch_array($hasil))
		   {
					 $html .= '<table align="left" width="100%" cellspacing="0" cellpadding="5" border="0.1em">
					 <tr>
		                <td width="5%">'.$no.'</td>
		                <td width="15%">'.$data['nip'].'</td>
		              	<td width="25%">'.$data['nama_guru'].'</td>
		              	<td width="35%">'.$data['alamat'].'</td>
		              	<td width="20%">'.$data['no_telp'].'</td>
		            </tr></table> ';
						   
			$no++;			   
		    
		   }

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('Data_Guru.pdf', 'I');    
    }



	function cetak_siswa($id_kelas) {
	

		
    $sql    = "SELECT * FROM data_siswa WHERE kelas='$id_kelas'";
	
    $hasil = mysql_query($sql);

	$kelas		= $this->M_printer->tampilkelas($id_kelas);
    // create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Data Siswa');
    $pdf->SetSubject('Daftar Data Siswa');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('helvetica', '', '9', '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
    $html = '
    		<h6 align="center"><img src="assets/backend/images/kopsurat/eksternal.png" width="600px" height="100px"></h6>
			<hr>
			<br>
			<h3 align="center">Daftar Nama Siswa Kelas '. $kelas.' SMKN 8 MALANG</h3>
			<br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em" >
			<tr>
                <th width="2%">No</th>
				<th width="8%">NIS</th>
				<th width="12%">Nama</th>
				<th width="15%">Alamat</th>
				<th width="2%">J/K</th>
				<th width="6%">Tempat Lahir</th>
				<th width="5%">Tanggal Lahir</th>
				<th width="5%">Agama</th>
				<th width="5%">No Telp</th>
				<th width="12%">Nama Wali</th>
				<th width="15%">Alamat Wali</th>
				<th width="8%">Pekerjaan Wali</th>
				<th width="5%">No Telepon Wali</th>             
             </tr>
			 </table>';
			 $no=1;
		   while ($data = mysql_fetch_array($hasil))
		   {
					 $html .= '<table align="left" width="100%" cellspacing="0" cellpadding="5" border="0.1em">
					 <tr>
		                <td width="2%">'.$no.'</td>
		                <td width="8%">'.$data['nis'].'</td>
		              	<td width="12%">'.$data['nama'].'</td>
		              	<td width="15%">'.$data['alamat'].'</td>
		              	<td width="2%">'.$data['jk'].'</td>
		              	<td width="6%">'.$data['tempat_lahir'].'</td>
		              	<td width="5%">'.$data['tanggal_lahir'].'</td>
		              	<td width="5%">'.$data['agama'].'</td>
		              	<td width="5%">'.$data['no_telp'].'</td>
		              	<td width="12%">'.$data['nama_wali'].'</td>
		              	<td width="15%">'.$data['alamat_wali'].'</td>
		              	<td width="8%">'.$data['pekerjaan'].'</td>
		              	<td width="5%">'.$data['no_telp_ortu'].'</td>
		            </tr></table> ';
						   
			$no++;			   
		    
		   }

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('Data_Siswa.pdf', 'I');    
    }

	function cetak_kelas() {
		
		
    $sql    = "SELECT *,data_kelas.keterangan as keterangan, data_jurusan.keterangan as ket, data_tingkat.keterangan as ket2, data_tahunajaran.keterangan as ket3 FROM data_kelas
				LEFT JOIN data_jurusan ON
				data_kelas.id_jurusan = data_jurusan.id_jurusan
				LEFT JOIN data_tingkat ON
				data_kelas.id_tingkat = data_tingkat.id_tingkat
				LEFT JOIN data_tahunajaran ON
				data_kelas.id_ta = data_tahunajaran.id_ta
				ORDER BY data_kelas.id_kelas ASC";
	
    $hasil = mysql_query($sql);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Data Kelas');
    $pdf->SetSubject('Daftar Data Kelas');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('helvetica', '', '9', '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<h6 align="center"><img src="assets/backend/images/kopsurat/eksternal.png" width="600px" height="100px"></h6>
			<hr>
			<br>
			<h3 align="center">Daftar Nama Kelas SMKN 8 MALANG</h3>
			<br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th width="5%">No</th>
                <th width="15%">Nama Kelas</th>
              	<th width="25%">Nama jurusan</th>
              	<th width="25%">Tingkatan</th>
              	<th width="30%">Keterangan</th>
             
             </tr>
			 </table>';
			 $no=1;
		   while ($data = mysql_fetch_array($hasil))
		   {
					 $html .= '<table align="left" width="100%" cellspacing="0" cellpadding="5" border="0.1em">
					 <tr>
		                <td width="5%">'.$no.'</td>
		                <td width="15%">'.$data['nama_kelas'].'</td>
		              	<td width="25%">'.$data['nama_jurusan'].'</td>
		              	<td width="25%">'.$data['nama_tingkat'].'</td>
		              	<td width="30%">'.$data['keterangan'].'</td>
		            </tr></table> ';
						   
			$no++;			   
		    
		   }

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('Data_kelas.pdf', 'I');    
    }

	function cetak_jurusan() {
		
		
    $sql    = "SELECT * FROM data_jurusan
				ORDER BY data_jurusan.id_jurusan ASC";
	
    $hasil = mysql_query($sql);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Data Jurusan');
    $pdf->SetSubject('Daftar Data Jurusan');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('helvetica', '', '9', '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<h6 align="center"><img src="assets/backend/images/kopsurat/eksternal.png" width="600px" height="100px"></h6>
			<hr>
			<br>
			<h3 align="center">Daftar Nama Jurusan SMKN 8 MALANG</h3>
			<br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th width="5%">No</th>
                <th width="45%">Nama Jurusan</th>
              	<th width="50%">Keterangan</th>
             
             </tr>
			 </table>';
			 $no=1;
		   while ($data = mysql_fetch_array($hasil))
		   {
					 $html .= '<table align="left" width="100%" cellspacing="0" cellpadding="5" border="0.1em">
					 <tr>
		                <td width="5%">'.$no.'</td>
		              	<td width="45%">'.$data['nama_jurusan'].'</td>
		              	<td width="50%">'.$data['keterangan'].'</td>
		            </tr></table> ';
						   
			$no++;			   
		    
		   }

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('Data_Jurusan.pdf', 'I');    
    }

	function cetak_tahunajaran() {
		
		
    $sql    = "SELECT * FROM data_tahunajaran
				ORDER BY data_tahunajaran.id_ta ASC";
	
    $hasil = mysql_query($sql);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Data Tahun Ajaran');
    $pdf->SetSubject('Daftar Data Tahun Ajaran');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('helvetica', '', '9', '', true);   
	$pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
	// Set some content to print
	
    $html = '<h6 align="center"><img src="assets/backend/images/kopsurat/eksternal.png" width="600px" height="100px"></h6>
			<hr>
			<br>
			<h3 align="center">Daftar Tahun Ajaran SMKN 8 MALANG</h3>
			<br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th width="5%">No</th>
                <th width="35%">Tahun Ajaran</th>
                <th width="25%">Status Kelulusan</th>
              	<th width="35%">Keterangan</th>
             
             </tr>
			 </table>';
			 $no=1;
		   while ($data = mysql_fetch_array($hasil))
		   {
					 $html .= '<table align="left" width="100%" cellspacing="0" cellpadding="5" border="0.1em">
					 <tr>
		                <td width="5%">'.$no.'</td>
		              	<td width="35%">'.$data['nama_ta'].'</td>
		              	<td width="25%">'.$data['status_kelulusan'].'</td>
		              	<td width="35%">'.$data['keterangan'].'</td>
		            </tr></table> ';
						   
			$no++;			   
		    
		   }

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('Data_tahunajaran.pdf', 'I');    
    }

    function cetak_pos() {
        
        
    $sql    = "SELECT * FROM data_pos
                ORDER BY data_pos.id_pos ASC";
    
    $hasil = mysql_query($sql);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Data POS Keuangan');
    $pdf->SetSubject('Daftar POS Keuangan');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('helvetica', '', '9', '', true);   
    $pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
    // Set some content to print
    
    $html = '<h6 align="center"><img src="assets/backend/images/kopsurat/eksternal.png" width="600px" height="100px"></h6>
            <hr>
            <br>
            <h3 align="center">Data POS Keuangan</h3>
            <br>
            <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
            <tr>
                <th width="5%">No</th>
                <th width="35%">Nama POS Keuangan</th>
                <th width="60%">Keterangan</th>
             
             </tr>
             </table>';
             $no=1;
           while ($data = mysql_fetch_array($hasil))
           {
                     $html .= '<table align="left" width="100%" cellspacing="0" cellpadding="5" border="0.1em">
                     <tr>
                        <td width="5%">'.$no.'</td>
                        <td width="35%">'.$data['nama_pos'].'</td>
                        <td width="60%">'.$data['keterangan'].'</td>
                    </tr></table> ';
                           
            $no++;             
            
           }

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->Output('Data POS Keuangan.pdf', 'I');    
    }

    function cetak_jenis_pembayaran() {
        
        
    $sql    = "SELECT * FROM data_jenispembayaran
                LEFT JOIN data_pos ON
                data_jenispembayaran.nama_pos = data_pos.id_pos
                LEFT JOIN data_tahunajaran ON
                data_jenispembayaran.tahun_ajaran = data_tahunajaran.id_ta
                ORDER BY data_jenispembayaran.id_pembayaran ASC";
    
    $hasil = mysql_query($sql);
    
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Data Jenis Pembayaran');
    $pdf->SetSubject('Daftar Jenis Pembayaran');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('helvetica', '', '9', '', true);   
    $pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
    // Set some content to print
    
    $html = '<h6 align="center"><img src="assets/backend/images/kopsurat/eksternal.png" width="600px" height="100px"></h6>
            <hr>
            <br>
            <h3 align="center">Data Jenis Pembayaran</h3>
            <br>
            <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama POS Keuangan</th>
                <th width="30%">Nama Jenis Pembayaran</th>
                <th width="20%">Jenis</th>
                <th width="20%">Tahun Ajaran</th>
             
             </tr>
             </table>';
             $no=1;
           while ($data = mysql_fetch_array($hasil))
           {
                     $html .= '<table align="left" width="100%" cellspacing="0" cellpadding="5" border="0.1em">
                     <tr>
                        <td width="5%">'.$no.'</td>
                        <td width="25%">'.$data['nama_pos'].'</td>
                        <td width="30%">'.$data['nama_pembayaran'].'</td>
                        <td width="20%">'.$data['jenis'].'</td>
                        <td width="20%">'.$data['nama_ta'].'</td>

                    </tr></table> ';
                           
            $no++;             
            
           }

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->Output('Data Jenis Pembayaran.pdf', 'I');    
    }

    function cetak_transaksi($kode_transaksi) {
        $sql    = "SELECT * FROM data_transaksi
                    LEFT JOIN data_jenispembayaran ON
                    data_transaksi.id_jenispembayaran = data_jenispembayaran.id_pembayaran
                    LEFT JOIN data_siswa ON
                    data_transaksi.nis = data_siswa.nis

                    LEFT JOIN data_kelas ON 
                    data_siswa.kelas = data_kelas.id_kelas
                    WHERE data_transaksi.id_transaksi = '$kode_transaksi'";
    
    $hasil = mysql_query($sql);
    $detail = $this->M_printer->data_transaksi($kode_transaksi);
    // create new PDF document

    $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Transaksi '.$kode_transaksi.'');
    $pdf->SetSubject('KWITANSI');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('times', '', '10', '', false);   
    $pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
    // Set some content to print
    $html = '
            <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="35%"><img src="assets/backend/images/kopsurat/eksternal.png" width="280px" height="50px"></td>
                    <td width="35%"><strong style="font-size:18px;">Bukti Setoran</strong></td>
                    <td width="30%" align="right"><span style="font-size:40px;">BNI</span></td>
                </tr>
            </table>
            <hr>
            <br>
            ';
        foreach($detail as $row) {
    $html .= '
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="25%"></td>
                    <td width="30%"></td>
                    <td colspan="2" width="45%"><strong><u>Penyetor ( Wajib Diisi ) :</u></strong></td>
                </tr>
                <tr>
                    <td width="25%">Malang, Tgl '.$row->tanggal_pembayaran.'</td>
                    <td width="30%"></td>
                    <td width="10%">Nama</td>
                    <td width="35%">: '.$row->nama.'</td>
                </tr>
                <tr>
                    <td colspan="2" width="55%"></td>
                    <td width="10%">Kelas</td>
                    <td width="35%">: '.$row->nis.'</td>
                </tr>
                <tr>
                    <td colspan="2" width="55%"></td>
                    <td width="10%">Kelas</td>
                    <td width="35%">: '.$row->nama_kelas.'</td>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="42%"></td>
                    <td width="13%"><strong>1 SPP</strong></td>
                    <td width="8%"><strong>Rekening</strong></td>
                    <td width="10%"><strong>340099910</strong></td>
                    <td width="12%"><strong>bulan '.$row->bulan.'</strong></td>
                    <td width="15%"><strong>Rp '.$row->jumlah_pembayaran.'</strong></td>
                </tr>
                <tr>
                    <td width="42%"></td>
                    <td width="13%"><strong>2 Kesiswaan</strong></td>
                    <td width="8%"><strong>Rekening</strong></td>
                    <td width="10%"><strong>339650716</strong></td>
                    <td width="12%"><strong>bulan .....</strong></td>
                    <td width="15%"><strong>Rp ....................</strong></td>
                </tr>                
                <tr>
                    <td width="42%"></td>
                    <td width="13%"><strong>3 ...........</strong></td>
                    <td width="8%"><strong>Rekening</strong></td>
                    <td width="10%"><strong>..................</strong></td>
                    <td width="12%"><strong>bulan .....</strong></td>
                    <td width="15%"><strong>Rp ....................</strong></td>
                </tr>               
                <tr>
                    <td width="42%"></td>
                    <td width="13%"></td>
                    <td width="8%"></td>
                    <td width="10%"></td>
                    <td width="12%"></td>
                    <td width="15%"><hr></td>
                </tr>              
                <tr>
                    <td width="42%"></td>
                    <td width="13%">Jumlah total</td>
                    <td width="8%"></td>
                    <td width="10%"></td>
                    <td width="12%"></td>
                    <td width="15%">Rp '.$row->jumlah_pembayaran.'</td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="41%">
                        <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                            <tr>
                                <td width="4%"></td>
                                <td width="40%">_________________</td>
                                <td width="8%"></td>
                                <td width="40%">_________________</td>
                                <td width="3%"></td>
                            </tr>
                            <tr>
                                <td width="4%"></td>
                                <td align="center" width="40%">Teller</td>
                                <td width="8%"></td>
                                <td align="center" width="40%">Penyetor</td>
                                <td width="8%"></td>
                            </tr>
                        </table>
                    </td>
                    <td width="59%">
                        <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
                            <tr>
                                <td height="40px"> Terbilang: </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <table width="100%">
                <tr>
                    <td width="80%">
                        <table width="100%">
                            <tr>
                                <td><p style="font-size:8px;">Bank telah melaksanakan transaksi sesuai dengan permintaan Penyetor. Sehubungan dengan hal tersebut, Penyetor dengan ini membebaskan bank dari segala tuntutan hukum berkenaan dengan transaksi di atas, Bukti Setoran ini merupakan alat bukti yang sah</p></td>
                            </tr>
                        </table>
                    </td>
                    <td width="20%" style="font-size:8px:">
                        Lembar 1   untuk Bank<br>
                        Lembar 2   untuk Sekolah<br>
                        Lembar 3   untuk Penyetor
                    </td>
                </tr>
            </table>
            ';
        }
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->Output(''.$kode_transaksi.'.pdf', 'I');    
    }

    function cetak_pengeluaran($kode_transaksi) {
        $sql    = "SELECT *,data_pengeluaran.metode as caraku, data_pengeluaran.keterangan as isi FROM data_pengeluaran
                LEFT JOIN data_pos ON
                data_pengeluaran.pos_pengeluaran = data_pos.id_pos
                LEFT JOIN data_user ON
                data_pengeluaran.petugas = data_user.id_user
                WHERE data_pengeluaran.kode_transaksi = '$kode_transaksi'";
    
    $hasil = mysql_query($sql);
    $detail = $this->M_printer->data_transaksi($kode_transaksi);
    // create new PDF document

    $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SIAKAS | Sistem Informasi Administrasi Keuangan Sekolah');
    $pdf->SetTitle('Transaksi '.$kode_transaksi.'');
    $pdf->SetSubject('KWITANSI');
    $pdf->SetKeywords('TCPDF, PDF, DATA');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins('5px', '5px', '5px');
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('times', '', '10', '', false);   
    $pdf->AddPage(); 
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    
    // Set some content to print
    $html = '
            <table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="35%"><img src="assets/backend/images/kopsurat/eksternal.png" width="280px" height="50px"></td>
                    <td width="35%"><strong style="font-size:18px;">Bukti Setoran</strong></td>
                    <td width="30%" align="right"><span style="font-size:40px;">BNI</span></td>
                </tr>
            </table>
            <hr>
            <br>
            ';
        foreach($detail as $row) {
    $html .= '
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="25%"></td>
                    <td width="30%"></td>
                    <td colspan="2" width="45%"><strong><u>Penyetor ( Wajib Diisi ) :</u></strong></td>
                </tr>
                <tr>
                    <td width="25%">Malang, Tgl '.$row->tanggal_pembayaran.'</td>
                    <td width="30%"></td>
                    <td width="10%">Nama</td>
                    <td width="35%">: '.$row->nama.'</td>
                </tr>
                <tr>
                    <td colspan="2" width="55%"></td>
                    <td width="10%">Kelas</td>
                    <td width="35%">: '.$row->nis.'</td>
                </tr>
                <tr>
                    <td colspan="2" width="55%"></td>
                    <td width="10%">Kelas</td>
                    <td width="35%">: '.$row->nama_kelas.'</td>
                </tr>
            </table>
            ';
        }
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
    $pdf->Output(''.$kode_transaksi.'.pdf', 'I');    
    }


}