<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class data_kelas extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_data_kelas');
			$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));					
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
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
		 		$data['data_kelas'] = $this->M_data_kelas->data_kelas();
		 		$data['data_jurusan'] = $this->M_data_kelas->data_jurusan();
		 		$data['data_tingkat'] = $this->M_data_kelas->data_tingkat();
		 		$data['data_tahunajaran'] = $this->M_data_kelas->data_tahunajaran();
		 		$data['hitung_kelas'] = $this->M_data_kelas->hitung_kelas();
		 		$data['hitung_kelas_t'] = $this->M_data_kelas->hitung_kelas_t();
		 		$data['hitung_kelas_r'] = $this->M_data_kelas->hitung_kelas_r();
		 		$data['hitung_kelas_m'] = $this->M_data_kelas->hitung_kelas_m();

				$data['module'] = "data_kelas";
				$data['fileview'] = "data_kelas";
				echo Modules::run('template/template_admin', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function tambah_data(){
		$this->M_data_kelas->tambah_data();

		redirect('data_kelas');
	}

	function import_data(){
		$this->M_data_kelas->import_data();

		redirect('data_kelas');
	}
	function edit_data(){
		$this->M_data_kelas->edit_data();

		redirect('data_kelas');
	}

	function hapus_data(){
		$this->M_data_kelas->hapus_data();

		redirect('data_kelas');
	}

	function hapus_data_all(){
		$this->M_data_kelas->hapus_data_all();

		redirect('data_kelas');
	}
}