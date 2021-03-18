<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class pindah_kelas extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_pindah_kelas');					
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
				 	$data['data_kelas'] 			= $this->M_pindah_kelas->data_kelas();

				$data['module'] = "pindah_kelas";
				$data['fileview'] = "pindah_kelas";
				echo Modules::run('template/template_admin', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function pindah(){
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
				 	$data['data_kelas'] 			= $this->M_pindah_kelas->data_kelas();

				$data['module'] = "pindah_kelas";
				$data['fileview'] = "pindah";
				echo Modules::run('template/template_admin', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function kelas()
    {		
        $id_kelas 		= $this->input->post('id_kelas');
        $data['data_kelas2'] = $this->M_pindah_kelas->data_kelas2($id_kelas);
        $this->load->view('kelas',$data);
    }

	function pindah_kelasnya(){
		$this->M_pindah_kelas->pindah_kelas();

		redirect('pindah_kelas/pindah');
	}

}