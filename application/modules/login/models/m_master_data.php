<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_data extends CI_Model {
	public function __construct(){
            parent::__construct();
    }

	function get_userid($username){
		$data_userid = $this->db->query("select * from data_user WHERE username='$username'");
		return $data_userid;
	}

	function login_time($id_user){
		date_default_timezone_set("Asia/Jakarta");

		$data = array (
			'user_id'    => $id_user,
			'login_time' => date('d-m-Y | H:i'),
			);
		
		$this->db->insert('login_history',$data);
	}
}
?>