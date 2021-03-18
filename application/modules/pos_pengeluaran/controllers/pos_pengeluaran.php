<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class pos_pengeluaran extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_pos_pengeluaran');					
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
			 		$data['hitung'] = $this->M_pos_pengeluaran->hitung();
			 		$data['pos_pengeluaran'] = $this->M_pos_pengeluaran->pos_pengeluaran();

					$data['module'] = "pos_pengeluaran";
					$data['fileview'] = "pos_pengeluaran";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {
			 		$data['hitung'] = $this->M_pos_pengeluaran->hitung();
			 		$data['pos_pengeluaran'] = $this->M_pos_pengeluaran->pos_pengeluaran();

					$data['module'] = "pos_pengeluaran";
					$data['fileview'] = "pos_pengeluaran_bendahara";
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
		$this->M_pos_pengeluaran->tambah_data();

		redirect('pos_pengeluaran');
	}
	function edit_data(){
		$this->M_pos_pengeluaran->edit_data();

		redirect('pos_pengeluaran');
	}

	function hapus_data(){
		$this->M_pos_pengeluaran->hapus_data();

		redirect('pos_pengeluaran');
	}

	function hapus_data_all(){
		$this->M_pos_pengeluaran->hapus_data_all();

		redirect('pos_pengeluaran');
	}

}