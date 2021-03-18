<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Logout extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');			
	}
	
	function index(){
		$this->M_session->destroy_session();
		
		    $data['module'] = "login";
            $data['fileview'] = "login";
			echo Modules::run('template/template_login', $data);
	}
}
?>