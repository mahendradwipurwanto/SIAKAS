<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class pengeluaran extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_pengeluaran');					
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
					$date1 = '00-00-0000';
					$date2 = '00-00-0000';

						$data['data_pengeluaran'] = $this->M_pengeluaran->data_pengeluaran($date1, $date2);
						$data['data_pos'] 		    = $this->M_pengeluaran->data_pos();

						$data['date1'] = $date1;
						$data['date2'] = $date2;

					$data['module'] = "pengeluaran";
					$data['fileview'] = "pengeluaran";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$date1 = '00-00-0000';
					$date2 = '00-00-0000';
					
						$data['data_pengeluaran'] = $this->M_pengeluaran->data_pengeluaran($date1, $date2);
						$data['data_pos'] 		    = $this->M_pengeluaran->data_pos();

						$data['date1'] = $date1;
						$data['date2'] = $date2;

					$data['module'] = "pengeluaran";
					$data['fileview'] = "pengeluaran_bendahara";
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

					$data['date1'] = $date1;
					$data['date2'] = $date2;

					$data['data_pengeluaran'] = $this->M_pengeluaran->data_pengeluaran($date1, $date2);
					$data['data_pos'] 		    = $this->M_pengeluaran->data_pos();

						$data['module'] = "pengeluaran";
						$data['fileview'] = "pengeluaran";
						echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$date1 = $this->input->post('date1');
					$date2 = $this->input->post('date2');

					$data['date1'] = $date1;
					$data['date2'] = $date2;

					$data['data_pengeluaran'] = $this->M_pengeluaran->data_pengeluaran($date1, $date2);
					$data['data_pos'] 		    = $this->M_pengeluaran->data_pos();

						$data['module'] = "pengeluaran";
						$data['fileview'] = "pengeluaran_bendahara";
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
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];

		$this->M_pengeluaran->tambah_data($id_user);
		redirect('pengeluaran');
	}

	function edit_data(){
		$this->M_pengeluaran->edit_data();
		redirect('pengeluaran');
	}

	function hapus_data(){
		$this->M_pengeluaran->hapus_data();
		redirect('pengeluaran');
	}

}