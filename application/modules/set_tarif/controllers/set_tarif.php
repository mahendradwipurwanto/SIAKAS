<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class set_tarif extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_set_tarif');					
	}
	
	function index(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login

				}elseif ($id_user && $level=='bendahara') {

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function tarif(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login	

					$id_ta			= $this->input->post('id_ta');
					$id_bayar		= $this->input->post('id_bayar');	
					$jenis 			= $this->input->post('jenis');
					$id_kelas 		= '0';

					$data['id_bayar']	= $id_bayar;
					$data['jenis']		= $jenis;
					$data['id_kelas']	= $id_kelas;

					if ($jenis == 'bulanan') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 			= $this->M_set_tarif->data_pembayar_bulan($id_kelas, $id_bayar);
				 	$data['kelas'] 					= $this->M_set_tarif->kelas($id_kelas, $id_bayar, $id_ta);
				 	$data['data_jurusan'] 			= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bulan'] 	= $this->M_set_tarif->jumlah_pembayar_bulan($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bulan";
						echo Modules::run('template/template_admin', $data);

					}elseif ($jenis == 'bebas') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 			= $this->M_set_tarif->data_pembayar_bebas($id_kelas, $id_bayar);
				 	$data['kelas'] 					= $this->M_set_tarif->kelas($id_kelas, $id_bayar);
				 	$data['data_jurusan'] 			= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bebas'] 	= $this->M_set_tarif->jumlah_pembayar_bebas($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bebas";
						echo Modules::run('template/template_admin', $data);

					}else{

						$data['module'] = "jenis_pembayaran";
						$data['fileview'] = "jenis_pembayaran";
						echo Modules::run('template/template_admin', $data);

					}

				}elseif ($id_user && $level=='bendahara') {

					$id_ta			= $this->input->post('id_ta');
					$id_bayar		= $this->input->post('id_bayar');	
					$jenis 			= $this->input->post('jenis');
					$id_kelas 		= '0';

					$data['id_bayar']	= $id_bayar;
					$data['jenis']		= $jenis;
					$data['id_kelas']	= $id_kelas;

					if ($jenis == 'bulanan') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 			= $this->M_set_tarif->data_pembayar_bulan($id_kelas, $id_bayar);
				 	$data['kelas'] 					= $this->M_set_tarif->kelas($id_kelas, $id_bayar, $id_ta);
				 	$data['data_jurusan'] 			= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bulan'] 		= $this->M_set_tarif->jumlah_pembayar_bulan($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bulan";
						echo Modules::run('template/template_keuanganbaru', $data);

					}elseif ($jenis == 'bebas') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 			= $this->M_set_tarif->data_pembayar_bebas($id_kelas, $id_bayar);
				 	$data['kelas'] 					= $this->M_set_tarif->kelas($id_kelas, $id_bayar);
				 	$data['data_jurusan'] 			= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bebas'] 		= $this->M_set_tarif->jumlah_pembayar_bebas($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bebas";
						echo Modules::run('template/template_keuanganbaru', $data);

					}

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}	
		}
	
	function tarif2($id_bayar){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login

					$id_kelas 		= '0';

					$a 	= $this->input->post('jenis');

					if ( $a == '') {
						$jenis 			= $this->session->userdata('jenis');
					}else{
						$id_bayar		= $this->input->post('id_bayar');	
						$jenis 			= $this->input->post('jenis');
					}

						$kelasku = $this->input->post('id_kelas');

						if ($kelasku != '') {
							$this->session->set_userdata('id_kelas', $this->input->post('id_kelas'));
						}else{
							$this->session->set_userdata('id_kelas', $this->input->post('pilihan'));
						}


						$id_kelas 		  = $this->session->userdata('id_kelas');
						$data['id_kelas'] = $this->session->userdata('id_kelas');

						$data['id_bayar']	= $id_bayar;
						$data['jenis']		= $jenis;
						$data['id_kelas']	= $id_kelas;

					if ($jenis == 'bulanan') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 	= $this->M_set_tarif->data_pembayar_bulan($id_kelas, $id_bayar);
				 	$data['jumlah_pembayar_kelas'] 	= $this->M_set_tarif->jumlah_pembayar_kelas_bulan($id_kelas, $id_bayar);
				 	$data['kelas'] 			= $this->M_set_tarif->kelas($id_kelas, $id_bayar);
				 	$data['data_jurusan'] 	= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bulan'] = $this->M_set_tarif->jumlah_pembayar_bulan($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bulan";
						echo Modules::run('template/template_admin', $data);

					}elseif ($jenis == 'bebas') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 	= $this->M_set_tarif->data_pembayar_bebas($id_kelas, $id_bayar);
				 	$data['jumlah_pembayar_kelas'] 	= $this->M_set_tarif->jumlah_pembayar_kelas_bebas($id_kelas, $id_bayar);
				 	$data['kelas'] 			= $this->M_set_tarif->kelas($id_kelas, $id_bayar);
				 	$data['data_jurusan'] 	= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bebas'] = $this->M_set_tarif->jumlah_pembayar_bebas($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bebas";
						echo Modules::run('template/template_admin', $data);

					}else{

						$data['module'] = "jenis_pembayaran";
						$data['fileview'] = "jenis_pembayaran";
						echo Modules::run('template/template_admin', $data);

					}

				}elseif ($id_user && $level=='bendahara') {

					$id_kelas 		= '0';

					$a 	= $this->input->post('jenis');

					if ( $a == '') {
						$jenis 			= $this->session->userdata('jenis');
					}else{
						$id_bayar		= $this->input->post('id_bayar');	
						$jenis 			= $this->input->post('jenis');
					}

						$this->session->set_userdata('id_kelas', $this->input->post('pilihan'));

						$id_kelas 		  = $this->session->userdata('id_kelas');
						$data['id_kelas'] = $this->session->userdata('id_kelas');

						$data['id_bayar']	= $id_bayar;
						$data['jenis']		= $jenis;
						$data['id_kelas']	= $id_kelas;

					if ($jenis == 'bulanan') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 	= $this->M_set_tarif->data_pembayar_bulan($id_kelas, $id_bayar);
				 	$data['jumlah_pembayar_kelas'] 	= $this->M_set_tarif->jumlah_pembayar_kelas_bulan($id_kelas, $id_bayar);
				 	$data['kelas'] 			= $this->M_set_tarif->kelas($id_kelas, $id_bayar);
				 	$data['data_jurusan'] 	= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bulan'] = $this->M_set_tarif->jumlah_pembayar_bulan($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bulan";
						echo Modules::run('template/template_keuanganbaru', $data);

					}elseif ($jenis == 'bebas') {

				 	$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
				 	$data['data_pembayar'] 	= $this->M_set_tarif->data_pembayar_bebas($id_kelas, $id_bayar);
				 	$data['jumlah_pembayar_kelas'] 	= $this->M_set_tarif->jumlah_pembayar_kelas_bebas($id_kelas, $id_bayar);
				 	$data['kelas'] 			= $this->M_set_tarif->kelas($id_kelas, $id_bayar);
				 	$data['data_jurusan'] 	= $this->M_set_tarif->data_jurusan();
					$data['jumlah_pembayar_bebas'] = $this->M_set_tarif->jumlah_pembayar_bebas($id_bayar);

						$data['module'] = "set_tarif";
						$data['fileview'] = "set_tarif_bebas";
						echo Modules::run('template/template_keuanganbaru', $data);

					}

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

	function atur($id_bayar){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login

					$jenis = $this->input->post('jenis');
					$dasar = $this->input->post('dasar');

						$data['jenis'] 		    		= $jenis;
						$data['id_bayar'] 	    		= $id_bayar;
						$data['data_tingkat']   		= $this->M_set_tarif->data_tingkat();
						$data['data_jurusan']   		= $this->M_set_tarif->data_jurusan();
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
						$data['data_kelas2'] 			= $this->M_set_tarif->data_kelas2();

					if ($jenis == 'bulanan' && $dasar == 'Berdasarkan Siswa') {

							$data['module'] = "set_tarif";
							$data['fileview'] = "bulan_siswa";
							echo Modules::run('template/template_admin', $data);

					}elseif ($jenis == 'bebas' && $dasar == 'Berdasarkan Siswa') {

							$data['module'] = "set_tarif";
							$data['fileview'] = "bebas_siswa";
							echo Modules::run('template/template_admin', $data);

					}else{
						echo 'ERROR';
					}

				}elseif ($id_user && $level=='bendahara') {
					
					$jenis = $this->input->post('jenis');
					$dasar = $this->input->post('dasar');

						$data['jenis'] 		    		= $jenis;
						$data['id_bayar'] 	    		= $id_bayar;
						$data['data_tingkat']   		= $this->M_set_tarif->data_tingkat();
						$data['data_jurusan']   		= $this->M_set_tarif->data_jurusan();
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);
						$data['data_kelas2'] 			= $this->M_set_tarif->data_kelas2();

					if ($jenis == 'bulanan' && $dasar == 'Berdasarkan Siswa') {

							$data['module'] = "set_tarif";
							$data['fileview'] = "bulan_siswa";
							echo Modules::run('template/template_keuanganbaru', $data);

					}elseif ($jenis == 'bebas' && $dasar == 'Berdasarkan Siswa') {

							$data['module'] = "set_tarif";
							$data['fileview'] = "bebas_siswa";
							echo Modules::run('template/template_keuanganbaru', $data);

					}else{
						echo 'ERROR';
					}

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}

	}
	
	function lihat(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login

					$id_bayar 	= $this->input->post('id_bayar');
					$jenis 		= $this->input->post('jenis');
					$nis 		= $this->input->post('nis');

					$result= $this->M_set_tarif->data_kelamin($nis);
				
						foreach ($result->result() as $row ){
							$isi['jk']  = $row->jk;
						}

					if ($isi['jk'] == 'Laki-laki' OR $isi['jk'] == 'L') {
						$data['profil']	= 'default_siswa.png';
					}elseif ($isi['jk'] == 'Perempuan' OR $isi['jk'] == 'P') {
						$data['profil']	= 'default_siswi.png';
					}else{
						$data['profil']	= 'default_siswa.png';
					}

					$data['id_bayar']	= $id_bayar;
					$data['jenis']		= $jenis;

					if ($jenis == 'bebas') {
						
						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bebas($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "lihat_bebas";
						echo Modules::run('template/template_admin', $data);
					}elseif ($jenis == 'bulanan') {

						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bulan($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "lihat_bulan";
						echo Modules::run('template/template_admin', $data);
					}else{

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "tarif2/".$id_bayar."";
						echo Modules::run('template/template_admin', $data);
					}	

				}elseif ($id_user && $level=='bendahara') {

					$id_bayar 	= $this->input->post('id_bayar');
					$jenis 		= $this->input->post('jenis');
					$nis 		= $this->input->post('nis');

					$result= $this->M_set_tarif->data_kelamin($nis);
				
						foreach ($result->result() as $row ){
							$isi['jk']  = $row->jk;
						}

					if ($isi['jk'] == 'Laki-laki' OR $isi['jk'] == 'L') {
						$data['profil']	= 'default_siswa.png';
					}elseif ($isi['jk'] == 'Perempuan' OR $isi['jk'] == 'P') {
						$data['profil']	= 'default_siswi.png';
					}else{
						$data['profil']	= 'default_siswa.png';
					}

					$data['id_bayar']	= $id_bayar;
					$data['jenis']		= $jenis;

					if ($jenis == 'bebas') {
						
						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bebas($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "lihat_bebas";
						echo Modules::run('template/template_keuanganbaru', $data);
					}elseif ($jenis == 'bulanan') {

						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bulan($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "lihat_bulan";
						echo Modules::run('template/template_keuanganbaru', $data);
					}else{

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "tarif2/".$id_bayar."";
						echo Modules::run('template/template_keuanganbaru', $data);
					}

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}	
		}
	
	function edit(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login

					$id_bayar 	= $this->input->post('id_bayar');
					$jenis 		= $this->input->post('jenis');
					$nis 		= $this->input->post('nis');

					$result= $this->M_set_tarif->data_kelamin($nis);
				
						foreach ($result->result() as $row ){
							$isi['jk']  = $row->jk;
						}

					if ($isi['jk'] == 'Laki-laki' OR $isi['jk'] == 'L') {
						$data['profil']	= 'default_siswa.png';
					}elseif ($isi['jk'] == 'Perempuan' OR $isi['jk'] == 'P') {
						$data['profil']	= 'default_siswi.png';
					}else{
						$data['profil']	= 'default_siswa.png';
					}

					$data['id_bayar']	= $id_bayar;
					$data['jenis']		= $jenis;

					if ($jenis == 'bebas') {
						
						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bebas($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "edit_bebas";
						echo Modules::run('template/template_admin', $data);
					}elseif ($jenis == 'bulanan') {

						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bulan($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "edit_bulan";
						echo Modules::run('template/template_admin', $data);
					}else{

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "tarif2/".$id_bayar."";
						echo Modules::run('template/template_admin', $data);
					}

				}elseif ($id_user && $level=='bendahara') {

					$id_bayar 	= $this->input->post('id_bayar');
					$jenis 		= $this->input->post('jenis');
					$nis 		= $this->input->post('nis');

					$result= $this->M_set_tarif->data_kelamin($nis);
				
						foreach ($result->result() as $row ){
							$isi['jk']  = $row->jk;
						}

					if ($isi['jk'] == 'Laki-laki' OR $isi['jk'] == 'L') {
						$data['profil']	= 'default_siswa.png';
					}elseif ($isi['jk'] == 'Perempuan' OR $isi['jk'] == 'P') {
						$data['profil']	= 'default_siswi.png';
					}else{
						$data['profil']	= 'default_siswa.png';
					}

					$data['id_bayar']	= $id_bayar;
					$data['jenis']		= $jenis;

					if ($jenis == 'bebas') {
						
						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bebas($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "edit_bebas";
						echo Modules::run('template/template_keuanganbaru', $data);
					}elseif ($jenis == 'bulanan') {

						$data['data_transaksi'] = $this->M_set_tarif->data_tarif_bulan($id_bayar, $nis);
						$data['data_jenispembayaran'] 	= $this->M_set_tarif->data_jenispembayaran($id_bayar);

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "edit_bulan";
						echo Modules::run('template/template_keuanganbaru', $data);
					}else{

				 		$data['module']   = "set_tarif";
				        $data['fileview'] = "tarif2/".$id_bayar."";
						echo Modules::run('template/template_keuanganbaru', $data);
					}

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function setpilih(){
		$this->session->set_userdata('id_kelas', $this->input->post('pilihan'));
		redirect('set_tarif/tarif2/0');
	}

	function turun()
    {		
        $id_jurusan 		= $this->input->post('id_jurusan');
        $data['data_kelas'] = $this->M_set_tarif->data_kelas($id_jurusan);
        $this->load->view('kelas',$data);
    }

	function kelas()
    {		
        $id_jurusan 		= $this->input->post('id_jurusan');
        $data['data_kelas'] = $this->M_set_tarif->data_kelas3($id_jurusan);
        $this->load->view('kelas2',$data);
    }

	function turun2()
    {		
        $id_kelas 		= $this->input->post('id_kelas');
        $data['data_siswa'] = $this->M_set_tarif->data_siswa($id_kelas);
        $this->load->view('siswa',$data);
    }

	function hapus_data(){
		$id_bayar = $this->input->post('id_bayar');
		$this->M_set_tarif->hapus_data();

		redirect('set_tarif/tarif2/'.$id_bayar.'');
	}

	function hapus_data_all(){
		$id_bayar = $this->input->post('id_bayar');
		$this->M_set_tarif->hapus_data_all();

		redirect('set_tarif/tarif2/'.$id_bayar.'');
	}

	function tambah_data(){
		$id_bayar = $this->input->post('id_bayar');
		$this->session->set_userdata('jenis', $this->input->post('jenis'));
		$this->M_set_tarif->tambah_data();

		redirect('set_tarif/tarif2/'.$id_bayar.'');
	}

	function edit_data(){
		$id_bayar = $this->input->post('id_bayar');
		$this->session->set_userdata('jenis', $this->input->post('jenis'));
		$this->M_set_tarif->edit_data();

		redirect('set_tarif/tarif2/'.$id_bayar.'');
	}

}