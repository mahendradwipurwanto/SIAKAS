<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class menu extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_menu');					
	}	

	public function menu_master($data){
		 $session = $this->M_session->get_session();
		 $username = $session['session_userid'];
		 $user_id = $session['session_user'];

		$this->load->view('menu_master', $data);
	}

	public function menu_pencarian($data){
		 $session = $this->M_session->get_session();
		 $username = $session['session_userid'];
		 $user_id = $session['session_user'];

		$this->load->view('menu_pencarian', $data);
	}

	public function menu_laporan($data){
		 $session = $this->M_session->get_session();
		 $username = $session['session_userid'];
		 $user_id = $session['session_user'];

		$this->load->view('menu_keuangan', $data);
	}

	public function menu_keuangan($data){
		 $session = $this->M_session->get_session();
		 $username = $session['session_userid'];
		 $user_id = $session['session_user'];

		$this->load->view('menu_keuangan', $data);
	}

	public function menu_transaksi($data){
		 $session = $this->M_session->get_session();
		 $username = $session['session_userid'];
		 $user_id = $session['session_user'];

		$this->load->view('menu_transaksi', $data);
	}

}