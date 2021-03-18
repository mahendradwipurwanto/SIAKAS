<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class dashboard extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_dashboard');					
	}
	
	function index(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_level']){
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis   	 = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
					$data['ip']					= $_SERVER['REMOTE_ADDR'];
			 		$data['tampil_data']    	= $password;
			 		$data['hitung_guru']   		= $this->M_dashboard->hitung_guru();
			 		$data['hitung_siswa']   	= $this->M_dashboard->hitung_siswa();
			 		$data['hitung_kelas']   	= $this->M_dashboard->hitung_kelas();
			 		$data['hitung_jurusan'] 	= $this->M_dashboard->hitung_jurusan();
			 		$data['login_history']  	= $this->M_dashboard->login_history();
					$data['data_update']		= $this->M_dashboard->data_update();
					$data['data_pembayaran']	= $this->M_dashboard->data_pembayaran();
					$data['data_pengeluaran']	= $this->M_dashboard->data_pengeluaran();

						$data['nama_sekolah']		= $this->M_dashboard->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_dashboard->alamat_sekolah();
						$data['telp']				= $this->M_dashboard->telp();

					$data['module'] = "dashboard";
					$data['fileview'] = "dashboard_admin";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {
					$data['ip']					= $_SERVER['REMOTE_ADDR'];
			 		$data['tampil_data']    	= $password;
			 		$data['hitung_guru']   		= $this->M_dashboard->hitung_guru();
			 		$data['hitung_siswa']   	= $this->M_dashboard->hitung_siswa();
			 		$data['hitung_kelas']   	= $this->M_dashboard->hitung_kelas();
			 		$data['hitung_jurusan'] 	= $this->M_dashboard->hitung_jurusan();
			 		$data['login_history']  	= $this->M_dashboard->login_history();
					$data['data_update']		= $this->M_dashboard->data_update();
					$data['data_pembayaran']	= $this->M_dashboard->data_pembayaran();
					$data['data_pengeluaran']	= $this->M_dashboard->data_pengeluaran();

						$data['nama_sekolah']		= $this->M_dashboard->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_dashboard->alamat_sekolah();
						$data['telp']				= $this->M_dashboard->telp();

					$data['module'] = "dashboard";
					$data['fileview'] = "dashboard_bendaharabaru";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

					$data['ip']					= $_SERVER['REMOTE_ADDR'];
			 		$data['tampil_data']    	= $password;
			 		$data['hitung_guru']   		= $this->M_dashboard->hitung_guru();
			 		$data['hitung_siswa']   	= $this->M_dashboard->hitung_siswa();
			 		$data['hitung_kelas']   	= $this->M_dashboard->hitung_kelas();
			 		$data['hitung_jurusan'] 	= $this->M_dashboard->hitung_jurusan();
			 		$data['login_history']  	= $this->M_dashboard->login_history();
					$data['data_update']		= $this->M_dashboard->data_update();
					$data['data_pembayaran']	= $this->M_dashboard->data_pembayaran();
					$data['data_pengeluaran']	= $this->M_dashboard->data_pengeluaran();

						$data['nama_sekolah']		= $this->M_dashboard->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_dashboard->alamat_sekolah();
						$data['telp']				= $this->M_dashboard->telp();

					$data['module'] = "dashboard";
					$data['fileview'] = "dashboard_kepsek";
					echo Modules::run('template/template_kepsek', $data);

				}elseif ($id_user && $level=='user') {
					$data['ip']					= $_SERVER['REMOTE_ADDR'];
			 		$data['tampil_data']    	= $password;

			 		$data['data_siswa']   		= $this->M_dashboard->data_siswa($nis);

			 		$data['hitung_guru']   		= $this->M_dashboard->hitung_guru();
			 		$data['hitung_siswa']   	= $this->M_dashboard->hitung_siswa();
			 		$data['hitung_kelas']   	= $this->M_dashboard->hitung_kelas();
			 		$data['hitung_jurusan'] 	= $this->M_dashboard->hitung_jurusan();
			 		$data['login_history']  	= $this->M_dashboard->login_history();
					$data['data_update']		= $this->M_dashboard->data_update();
					$data['data_pembayaran']	= $this->M_dashboard->data_pembayaran();
					$data['data_pengeluaran']	= $this->M_dashboard->data_pengeluaran();

						$data['nama_sekolah']		= $this->M_dashboard->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_dashboard->alamat_sekolah();
						$data['telp']				= $this->M_dashboard->telp();

					$data['module'] = "dashboard";
					$data['fileview'] = "dashboard_siswa";
					echo Modules::run('template/template_user', $data);

				}else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function master(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_level']){
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis   	 = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='bendahara'){
					$data['ip']					= $_SERVER['REMOTE_ADDR'];
			 		$data['tampil_data']    	= $password;
			 		$data['hitung_guru']   		= $this->M_dashboard->hitung_guru();
			 		$data['hitung_siswa']   	= $this->M_dashboard->hitung_siswa();
			 		$data['hitung_kelas']   	= $this->M_dashboard->hitung_kelas();
			 		$data['hitung_jurusan'] 	= $this->M_dashboard->hitung_jurusan();
			 		$data['login_history']  	= $this->M_dashboard->login_history();
					$data['data_update']		= $this->M_dashboard->data_update();
					$data['data_pembayaran']	= $this->M_dashboard->data_pembayaran();
					$data['data_pengeluaran']	= $this->M_dashboard->data_pengeluaran();

						$data['nama_sekolah']		= $this->M_dashboard->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_dashboard->alamat_sekolah();
						$data['telp']				= $this->M_dashboard->telp();

					$data['module'] = "dashboard";
					$data['fileview'] = "master";
					echo Modules::run('template/template_bendaharabaru', $data);

				}else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function keuangan(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_level']){
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis   	 = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='bendahara'){
					$data['ip']					= $_SERVER['REMOTE_ADDR'];
			 		$data['tampil_data']    	= $password;
			 		$data['hitung_guru']   		= $this->M_dashboard->hitung_guru();
			 		$data['hitung_siswa']   	= $this->M_dashboard->hitung_siswa();
			 		$data['hitung_kelas']   	= $this->M_dashboard->hitung_kelas();
			 		$data['hitung_jurusan'] 	= $this->M_dashboard->hitung_jurusan();
			 		$data['login_history']  	= $this->M_dashboard->login_history();
					$data['data_update']		= $this->M_dashboard->data_update();
					$data['data_pembayaran']	= $this->M_dashboard->data_pembayaran();
					$data['data_pengeluaran']	= $this->M_dashboard->data_pengeluaran();

						$data['nama_sekolah']		= $this->M_dashboard->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_dashboard->alamat_sekolah();
						$data['telp']				= $this->M_dashboard->telp();

					$data['module'] = "dashboard";
					$data['fileview'] = "keuangan";
					echo Modules::run('template/template_bendaharabaru', $data);

				}else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function transaksi(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_level']){
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis   	 = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='bendahara'){
					$data['ip']					= $_SERVER['REMOTE_ADDR'];
			 		$data['tampil_data']    	= $password;
			 		$data['hitung_guru']   		= $this->M_dashboard->hitung_guru();
			 		$data['hitung_siswa']   	= $this->M_dashboard->hitung_siswa();
			 		$data['hitung_kelas']   	= $this->M_dashboard->hitung_kelas();
			 		$data['hitung_jurusan'] 	= $this->M_dashboard->hitung_jurusan();
			 		$data['login_history']  	= $this->M_dashboard->login_history();
					$data['data_update']		= $this->M_dashboard->data_update();
					$data['data_pembayaran']	= $this->M_dashboard->data_pembayaran();
					$data['data_pengeluaran']	= $this->M_dashboard->data_pengeluaran();

						$data['nama_sekolah']		= $this->M_dashboard->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_dashboard->alamat_sekolah();
						$data['telp']				= $this->M_dashboard->telp();

					$data['module'] = "dashboard";
					$data['fileview'] = "transaksi";
					echo Modules::run('template/template_bendaharabaru', $data);

				}else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function tentang(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_level']){
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis   	 = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
			 		$data['tentang']   		= $this->M_dashboard->tentang();

					$data['module'] = "dashboard";
					$data['fileview'] = "tentang";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {
			 		$data['tentang']   		= $this->M_dashboard->tentang();
					$data['module'] = "dashboard";
					$data['fileview'] = "tentang";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

			 		$data['tentang']   		= $this->M_dashboard->tentang();

					$data['module'] = "dashboard";
					$data['fileview'] = "tentang";
					echo Modules::run('template/template_kepsek', $data);

				}elseif ($id_user && $level=='user') {

			 		$data['tentang']   		= $this->M_dashboard->tentang();

					$data['module'] = "dashboard";
					$data['fileview'] = "tentang";
					echo Modules::run('template/template_user', $data);

				}else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function tentang_admin($id){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_level']){
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis   	 = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
			 		$data['tentang_admin']   		= $this->M_dashboard->tentang_admin($id);

					$data['module'] = "dashboard";
					$data['fileview'] = "tentang_admin";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {
			 		$data['tentang']   		= $this->M_dashboard->tentang();
					$data['module'] = "dashboard";
					$data['fileview'] = "tentang";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

			 		$data['tentang_admin']   		= $this->M_dashboard->tentang_admin($id);

					$data['module'] = "dashboard";
					$data['fileview'] = "tentang_admin";
					echo Modules::run('template/template_kepsek', $data);

				}elseif ($id_user && $level=='user') {

			 		$data['tentang_admin']   		= $this->M_dashboard->tentang_admin($id);

					$data['module'] = "dashboard";
					$data['fileview'] = "tentang_admin";
					echo Modules::run('template/template_user', $data);

				}else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}

}