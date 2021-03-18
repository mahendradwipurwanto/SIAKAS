<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class data_tahunajaran extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_data_tahunajaran');
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
		 		$data['data_tahunajaran'] = $this->M_data_tahunajaran->data_tahunajaran();
		 		$data['hitung'] = $this->M_data_tahunajaran->hitung();

				$data['module'] = "data_tahunajaran";
				$data['fileview'] = "data_tahunajaran";
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
		$this->M_data_tahunajaran->tambah_data();

		redirect('data_tahunajaran');
	}

	function import_data(){
		$this->M_data_tahunajaran->import_data();

		redirect('data_tahunajaran');
	}
	function edit_data(){
		$this->M_data_tahunajaran->edit_data();

		redirect('data_tahunajaran');
	}

	function hapus_data(){
		$this->M_data_tahunajaran->hapus_data();

		redirect('data_tahunajaran');
	}

	function hapus_data_all(){
		$this->M_data_tahunajaran->hapus_data_all();

		redirect('data_tahunajaran');
	}
}