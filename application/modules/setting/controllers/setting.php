<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class setting extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_setting');					
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

					$data['module'] = "setting";
					$data['fileview'] = "setting";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {
					$data['ip']					= $_SERVER['REMOTE_ADDR'];

						$data['nama_sekolah']		= $this->M_setting->nama_sekolah();
						$data['alamat_sekolah']		= $this->M_setting->alamat_sekolah();
						$data['telp']				= $this->M_setting->telp();

					$data['module'] = "setting";
					$data['fileview'] = "setting_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {
					$data['edit_username']		= $this->M_setting->edit_username();
					$data['data_user'] = $this->M_setting->data_user($id_user);

					$data['module'] = "setting";
					$data['fileview'] = "setting_user";
					echo Modules::run('template/template_kepsek', $data);

				}elseif ($id_user && $level=='user') {
					$data['edit_username']		= $this->M_setting->edit_username();
					$data['data_user'] = $this->M_setting->data_user($id_user);

					$data['module'] = "setting";
					$data['fileview'] = "setting_user";
					echo Modules::run('template/template_user', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function lihat_user(){
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
				if ($id_user && $level=='bendahara'){
				//user sudah login
					$data['edit_username']		= $this->M_setting->edit_username();
					$data['data_user'] = $this->M_setting->data_user($id_user);

				$data['module'] = "setting";
				$data['fileview'] = "setting_user";
				echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='user'){
				//user sudah login
					$data['edit_username']		= $this->M_setting->edit_username();
					$data['data_user'] = $this->M_setting->data_user($id_user);

				$data['module'] = "setting";
				$data['fileview'] = "setting_user";
				echo Modules::run('template/template_member', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function backup(){
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

					$data['module'] = "setting";
					$data['fileview'] = "backup";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$data['module'] = "setting";
					$data['fileview'] = "backup";
					echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function data_user(){
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
					$data['data_user']	= $this->M_setting->data_user2();
					$data['data_level']	= $this->M_setting->data_level();

				$data['module'] = "setting";
				$data['fileview'] = "data_user";
				echo Modules::run('template/template_admin', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function website(){
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
						$data['nama_sekolah']	= $this->M_setting->nama_sekolah();
						$data['alamat_sekolah']	= $this->M_setting->alamat_sekolah();
						$data['jenjang']		= $this->M_setting->jenjang();
						$data['telp']			= $this->M_setting->telp();
						$data['setting_user']	= $this->M_setting->setting_user();

					$data['module'] = "setting";
					$data['fileview'] = "website";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

						$data['nama_sekolah']	= $this->M_setting->nama_sekolah();
						$data['alamat_sekolah']	= $this->M_setting->alamat_sekolah();
						$data['jenjang']	= $this->M_setting->jenjang();
						$data['telp']			= $this->M_setting->telp();
						$data['setting_user']	= $this->M_setting->setting_user();

					$data['module'] = "setting";
					$data['fileview'] = "website";
					echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function data_level(){
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
					$data['data_level']	= $this->M_setting->data_level();

				$data['module'] = "setting";
				$data['fileview'] = "data_level";
				echo Modules::run('template/template_admin', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function data_metode(){
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
						$data['data_metode']	= $this->M_setting->data_metode();

					$data['module'] = "setting";
					$data['fileview'] = "data_metode";
					echo Modules::run('template/template_admin', $data);
				
				}elseif ($id_user && $level=='bendahara') {
					
						$data['data_metode']	= $this->M_setting->data_metode();

					$data['module'] = "setting";
					$data['fileview'] = "data_metode";
					echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function data_update(){
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
					$data['data_update']	= $this->M_setting->data_update();

				$data['module'] = "setting";
				$data['fileview'] = "data_update";
				echo Modules::run('template/template_admin', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function data_pengumuman(){
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
					$data['data_pengumuman']	= $this->M_setting->data_pengumuman();

					$data['module'] = "setting";
					$data['fileview'] = "data_pengumuman";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {
					$data['data_pengumuman']	= $this->M_setting->data_pengumuman();

					$data['module'] = "setting";
					$data['fileview'] = "data_pengumuman";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {
					$data['data_pengumuman']	= $this->M_setting->data_pengumuman();

					$data['module'] = "setting";
					$data['fileview'] = "data_pengumuman";
					echo Modules::run('template/template_kepsek', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function buat_pengumuman(){
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

					$data['module'] = "setting";
					$data['fileview'] = "buat_pengumuman";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$data['module'] = "setting";
					$data['fileview'] = "buat_pengumuman";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

					$data['module'] = "setting";
					$data['fileview'] = "buat_pengumuman";
					echo Modules::run('template/template_kepsek', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function edit_pengumuman($id_pengumuman){
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

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "edit_pengumuman";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "edit_pengumuman";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "edit_pengumuman";
					echo Modules::run('template/template_kepsek', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function detail_pengumuman($id_pengumuman){
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

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman";
					echo Modules::run('template/template_kepsek', $data);

				}elseif ($id_user && $level=='user') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman";
					echo Modules::run('template/template_user', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function detail_pengumuman_list($id_pengumuman){
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

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman_list";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman_list";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman_list";
					echo Modules::run('template/template_kepsek', $data);

				}elseif ($id_user && $level=='user') {

					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_cari($id_pengumuman);

					$data['module'] = "setting";
					$data['fileview'] = "detail_pengumuman_list";
					echo Modules::run('template/template_user', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function list_pengumuman(){
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
					$data['date']				= date('d-m-Y');
					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_list();

					$data['module'] = "setting";
					$data['fileview'] = "list_pengumuman";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$data['date']				= date('d-m-Y');
					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_list();

					$data['module'] = "setting";
					$data['fileview'] = "list_pengumuman";
					echo Modules::run('template/template_bendaharabaru', $data);

				}elseif ($id_user && $level=='kepsek') {

					$data['date']				= date('d-m-Y');
					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_list();

					$data['module'] = "setting";
					$data['fileview'] = "list_pengumuman";
					echo Modules::run('template/template_kepsek', $data);

				}elseif ($id_user && $level=='user') {

					$data['date']				= date('d-m-Y');
					$data['data_pengumuman']	= $this->M_setting->data_pengumuman_list();

					$data['module'] = "setting";
					$data['fileview'] = "list_pengumuman";
					echo Modules::run('template/template_user', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function update_website(){
		$this->M_setting->update_website();

		redirect('setting/website');
	}




	function tambah_user(){
		$this->M_setting->tambah_user();

		redirect('setting/data_user');
	}

	function update_user(){
		$this->M_setting->update_user();

		redirect('setting/data_user');
	}

	function hapus_user(){
		$this->M_setting->hapus_user();

		redirect('setting/data_user');
	}




	function tambah_level(){
		$this->M_setting->tambah_level();

		redirect('setting/data_level');
	}

	function update_level(){
		$this->M_setting->update_level();

		redirect('setting/data_level');
	}

	function hapus_level(){
		$this->M_setting->hapus_level();

		redirect('setting/data_level');
	}




	function tambah_metode(){
		$this->M_setting->tambah_metode();

		redirect('setting/data_metode');
	}

	function update_metode(){
		$this->M_setting->update_metode();

		redirect('setting/data_metode');
	}

	function hapus_metode(){
		$this->M_setting->hapus_metode();

		redirect('setting/data_metode');
	}




	function tambah_update(){
		$this->M_setting->tambah_update();

		redirect('setting/data_update');
	}

	function update_update(){
		$this->M_setting->update_update();

		redirect('setting/data_update');
	}

	function hapus_update(){
		$this->M_setting->hapus_update();

		redirect('setting/data_update');
	}




	function tambah_pengumuman(){
	$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];

		$this->M_setting->tambah_pengumuman($id_user);

		redirect('setting/data_pengumuman');
	}

	function update_pengumuman(){
		$this->M_setting->update_pengumuman();

		redirect('setting/data_pengumuman');
	}

	function hapus_pengumuman(){
		$this->M_setting->hapus_pengumuman();

		redirect('setting/data_pengumuman');
	}





	function update_datauser(){
		$session = $this->M_session->get_session();

			$id_user = $session['session_userid'];

		$this->M_setting->update_datauser($id_user);

		redirect('dashboard');
	}



}?>