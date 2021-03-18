<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class data_jurusan extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_data_jurusan');
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
		 		$data['data_jurusan'] = $this->M_data_jurusan->data_jurusan();
		 		$data['hitung'] = $this->M_data_jurusan->hitung();

				$data['module'] = "data_jurusan";
				$data['fileview'] = "data_jurusan";
				echo Modules::run('template/template_admin', $data);
				}
				else {
					$data['module'] = "login";
					$data['fileview'] = "login";
					echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function tambah_data(){
		$this->M_data_jurusan->tambah_data();

		redirect('data_jurusan');
	}

	function import_data(){
		$this->M_data_jurusan->import_data();

		redirect('data_jurusan');
	}
	function edit_data(){
		$this->M_data_jurusan->edit_data();

		redirect('data_jurusan');
	}

	function hapus_data(){
		$this->M_data_jurusan->hapus_data();

		redirect('data_jurusan');
	}

	function hapus_data_all(){
		$this->M_data_jurusan->hapus_data_all();

		redirect('data_jurusan');
	}
}