<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Error_page extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');					
	}
	
	function index(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{

				$data['module'] = "error_page";
				$data['fileview'] = "404";
				echo Modules::run('template/template_error', $data);
			}		
		}

}