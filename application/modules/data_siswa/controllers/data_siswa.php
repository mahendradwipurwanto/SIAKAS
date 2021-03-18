<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class data_siswa extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_data_siswa');
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
				redirect('data_siswa/tampil_data/123');
			}		
		}

	function tampil_data($id_nya){
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

					$id_kelas = $this->session->userdata('id_kelas');
					$data['id_kelas'] = $this->session->userdata('id_kelas');

			 		$data['data_jurusan'] 	= $this->M_data_siswa->data_jurusan();
	        		$data['data_kelas2'] 	= $this->M_data_siswa->data_kelas2();
			 		$data['kelas'] 			= $this->M_data_siswa->kelas($id_kelas, $id_nya);
			 		$data['data_siswa'] 	= $this->M_data_siswa->data_siswa($id_kelas, $id_nya);
			 		$data['hitung_siswa'] 	= $this->M_data_siswa->hitung_siswa($id_kelas, $id_nya);

					$data['module'] 	= "data_siswa";
					$data['fileview'] 	= "pilih_data";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$id_kelas = $this->session->userdata('id_kelas');
					$data['id_kelas'] = $this->session->userdata('id_kelas');

			 		$data['data_jurusan'] 	= $this->M_data_siswa->data_jurusan();
	        		$data['data_kelas2'] 	= $this->M_data_siswa->data_kelas2();
			 		$data['kelas'] 			= $this->M_data_siswa->kelas($id_kelas, $id_nya);
			 		$data['data_siswa'] 	= $this->M_data_siswa->data_siswa($id_kelas, $id_nya);
			 		$data['hitung_siswa'] 	= $this->M_data_siswa->hitung_siswa($id_kelas, $id_nya);

					$data['module'] 	= "data_siswa";
					$data['fileview'] 	= "pilih_data_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);
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
		redirect('data_siswa/tampil_data/0');
	}

	function turun()
    {		
        $id_jurusan 		= $this->input->post('id_jurusan');
        $data['data_kelas'] = $this->M_data_siswa->data_kelas($id_jurusan);
        $this->load->view('kelas',$data);
    }

	function tambah_data(){
		$this->M_data_siswa->tambah_data();

		redirect('data_siswa');
	}

	function import_data(){
		$id_kelas = $this->session->userdata('id_kelas');
		
		$this->M_data_siswa->import_data($id_kelas);

		redirect('data_siswa');
	}
	function edit_data(){
		$this->M_data_siswa->edit_data();

		redirect('data_siswa');
	}

	function hapus_data(){
		$this->M_data_siswa->hapus_data();

		redirect('data_siswa');
	}

	function hapus_data_all(){
		$this->M_data_siswa->hapus_data_all();

		redirect('data_siswa');
	}
}