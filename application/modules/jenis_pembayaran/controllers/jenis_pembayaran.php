<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class jenis_pembayaran extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_jenis_pembayaran');					
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
			 		$data['hitung_pembayar'] = $this->M_jenis_pembayaran->hitung_pembayar();
			 		$data['jenis_pembayaran'] = $this->M_jenis_pembayaran->jenis_pembayaran();
			 		$data['pos_keuangan'] = $this->M_jenis_pembayaran->pos_keuangan();
			 		$data['data_tahunajaran'] = $this->M_jenis_pembayaran->data_tahunajaran();

					$data['module'] = "jenis_pembayaran";
					$data['fileview'] = "jenis_pembayaran";
					echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
			 		$data['hitung_pembayar'] = $this->M_jenis_pembayaran->hitung_pembayar();
			 		$data['jenis_pembayaran'] = $this->M_jenis_pembayaran->jenis_pembayaran();
			 		$data['pos_keuangan'] = $this->M_jenis_pembayaran->pos_keuangan();
			 		$data['data_tahunajaran'] = $this->M_jenis_pembayaran->data_tahunajaran();

					$data['module'] = "jenis_pembayaran";
					$data['fileview'] = "jenis_pembayaran_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function tambah_data(){
		$this->M_jenis_pembayaran->tambah_data();

		redirect('jenis_pembayaran');
	}
	function edit_data(){
		$this->M_jenis_pembayaran->edit_data();

		redirect('jenis_pembayaran');
	}

	function hapus_data(){
		$this->M_jenis_pembayaran->hapus_data();

		redirect('jenis_pembayaran');
	}

	function hapus_data_all(){
		$this->M_jenis_pembayaran->hapus_data_all();

		redirect('jenis_pembayaran');
	}

}