<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class pos_pembayaran extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_pos_pembayaran');					
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
			 		$data['hitung'] = $this->M_pos_pembayaran->hitung();
			 		$data['pos_pembayaran'] = $this->M_pos_pembayaran->pos_pembayaran();

					$data['module'] = "pos_pembayaran";
					$data['fileview'] = "pos_pembayaran";
					echo Modules::run('template/template_admin', $data);
				}elseif ($id_user && $level=='bendahara') {
			 		$data['hitung'] = $this->M_pos_pembayaran->hitung();
			 		$data['pos_pembayaran'] = $this->M_pos_pembayaran->pos_pembayaran();

					$data['module'] = "pos_pembayaran";
					$data['fileview'] = "pos_pembayaran_bendahara";
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
		$this->M_pos_pembayaran->tambah_data();

		redirect('pos_pembayaran');
	}
	function edit_data(){
		$this->M_pos_pembayaran->edit_data();

		redirect('pos_pembayaran');
	}

	function hapus_data(){
		$this->M_pos_pembayaran->hapus_data();

		redirect('pos_pembayaran');
	}

	function hapus_data_all(){
		$this->M_pos_pembayaran->hapus_data_all();

		redirect('pos_pembayaran');
	}

}