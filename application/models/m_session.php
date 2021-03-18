<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_session extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_session(){
		$data['session_userid']   = $this->session->userdata('session_userid');
		$data['session_nis']   	  = $this->session->userdata('session_nis');
		$data['session_username'] = $this->session->userdata('session_username');
		$data['session_password'] = $this->session->userdata('session_password');
		$data['session_level'] 	  = $this->session->userdata('session_level');
		return $data;
	}

	function store_session($id_user,$nis,$username,$password,$level){
		$this->session->set_userdata('session_userid', $id_user);
		$this->session->set_userdata('session_nis', $nis);
		$this->session->set_userdata('session_username', $username);
		$this->session->set_userdata('session_password', $password);
		$this->session->set_userdata('session_level', $level);
	}

	function destroy_session(){
		$this->session->unset_userdata('session_userid');
		$this->session->unset_userdata('session_level');
	}
}
?>