<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class laporan extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_laporan');					
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
					$data['data_transaksi'] = $this->M_laporan->data_transaksi();

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_hariini";
				echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
				//user sudah login
					$data['data_transaksi'] = $this->M_laporan->data_transaksi();

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_hariini";
				echo Modules::run('template/template_bendaharabaru', $data);
				}elseif ($id_user && $level='kepsek') {
				//user sudah login
					$data['data_transaksi'] = $this->M_laporan->data_transaksi();

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_hariini";
				echo Modules::run('template/template_kepsek', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function detail_laporan($kode_transaksi){
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
					$data['data_transaksi'] = $this->M_laporan->detail_transaksi($kode_transaksi);
					$data['kode_transaksi'] = $kode_transaksi;

				$data['module'] = "laporan";
				$data['fileview'] = "detail_laporan";
				echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
				//user sudah login
					$data['data_transaksi'] = $this->M_laporan->detail_transaksi($kode_transaksi);
					$data['kode_transaksi'] = $kode_transaksi;

				$data['module'] = "laporan";
				$data['fileview'] = "detail_laporan";
				echo Modules::run('template/template_bendaharabaru', $data);
				}elseif ($id_user && $level='kepsek') {
				//user sudah login
					$data['data_transaksi'] = $this->M_laporan->detail_transaksi($kode_transaksi);
					$data['kode_transaksi'] = $kode_transaksi;

				$data['module'] = "laporan";
				$data['fileview'] = "detail_laporan";
				echo Modules::run('template/template_kepsek', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function bulan(){
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
					$data['data_transaksi'] = $this->M_laporan->data_transaksi_bulan();

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_bulanini";
				echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
				//user sudah login
					$data['data_transaksi'] = $this->M_laporan->data_transaksi_bulan();

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_bulanini";
				echo Modules::run('template/template_bendaharabaru', $data);
				}elseif ($id_user && $level='kepsek') {
				//user sudah login
					$data['data_transaksi'] = $this->M_laporan->data_transaksi_bulan();

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_bulanini";
				echo Modules::run('template/template_kepsek', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function tanggal(){
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
					$date1 = '00-00-0000';
					$date2 = '00-00-0000';

					$data['data_transaksi'] = $this->M_laporan->data_transaksi_tanggal($date1, $date2);

						$data['date1'] = $date1;
						$data['date2'] = $date2;

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_tanggal";
				echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
				//user sudah login
					$date1 = '00-00-0000';
					$date2 = '00-00-0000';

					$data['data_transaksi'] = $this->M_laporan->data_transaksi_tanggal($date1, $date2);

						$data['date1'] = $date1;
						$data['date2'] = $date2;

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_tanggal";
				echo Modules::run('template/template_bendaharabaru', $data);
				}elseif ($id_user && $level='kepsek') {
				//user sudah login
					$date1 = '00-00-0000';
					$date2 = '00-00-0000';

					$data['data_transaksi'] = $this->M_laporan->data_transaksi_tanggal($date1, $date2);

						$data['date1'] = $date1;
						$data['date2'] = $date2;

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_tanggal";
				echo Modules::run('template/template_kepsek', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function setpilih(){
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
					$date1 = $this->input->post('date1');
					$date2 = $this->input->post('date2');

					$data['data_transaksi'] = $this->M_laporan->data_transaksi_tanggal($date1, $date2);

						$data['date1'] = $date1;
						$data['date2'] = $date2;
						
				$data['module'] = "laporan";
				$data['fileview'] = "laporan_tanggal";
				echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
				//user sudah login
					$date1 = $this->input->post('date1');
					$date2 = $this->input->post('date2');

					$data['data_transaksi'] = $this->M_laporan->data_transaksi_tanggal($date1, $date2);

						$data['date1'] = $date1;
						$data['date2'] = $date2;

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_tanggal";
				echo Modules::run('template/template_bendaharabaru', $data);
				}elseif ($id_user && $level='kepsek') {
				//user sudah login
					$date1 = $this->input->post('date1');
					$date2 = $this->input->post('date2');

					$data['data_transaksi'] = $this->M_laporan->data_transaksi_tanggal($date1, $date2);

						$data['date1'] = $date1;
						$data['date2'] = $date2;

				$data['module'] = "laporan";
				$data['fileview'] = "laporan_tanggal";
				echo Modules::run('template/template_kepsek', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

}