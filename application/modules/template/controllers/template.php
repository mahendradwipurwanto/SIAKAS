<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan!');
class Template extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("M_template");
		$this->load->model("M_session");
	}	

	public function template_login($data){
		$this->load->view('template_login', $data);

	}

	public function template_error($data){
		$this->load->view('template_error', $data);

	}

	public function template_admin($data){
		$session = $this->M_session->get_session();
		$user_id = $session['session_userid'];

		$data['username'] 		= $this->M_template->tampil_username($user_id);
		$data['pengumuman'] 	= $this->M_template->pengumuman();
		$this->load->view('template_admin', $data);
	}

	public function template_bendaharabaru($data){
		$session = $this->M_session->get_session();
		$user_id = $session['session_userid'];

		$data['username'] 	= $this->M_template->tampil_username($user_id);
		$data['pengumuman'] 	= $this->M_template->pengumuman();
		$this->load->view('template_bendaharabaru', $data);
	}

	public function template_keuanganbaru($data){
		$session = $this->M_session->get_session();
		$user_id = $session['session_userid'];

		$data['username'] 	= $this->M_template->tampil_username($user_id);
		$data['pengumuman'] 	= $this->M_template->pengumuman();
		$this->load->view('template_keuanganbaru', $data);
	}

	public function template_kepsek($data){
		$session = $this->M_session->get_session();
		$user_id = $session['session_userid'];

		$data['username'] 	= $this->M_template->tampil_username($user_id);
		$data['pengumuman'] 	= $this->M_template->pengumuman();
		$this->load->view('template_member', $data);
	}

	public function template_user($data){
		$session = $this->M_session->get_session();
		$user_id = $session['session_userid'];
		$nis     = $session['session_nis'];

		$data['username'] 	= $this->M_template->tampil_username2($nis);
		$data['pengumuman'] 	= $this->M_template->pengumuman();
		$this->load->view('template_member', $data);
	}


	function tampil_pengumuman(){
		$pengumuman = $this->M_template->pengumuman();

			echo "<strong class='upper'>".$pengumuman."</strong> ";
	}
}