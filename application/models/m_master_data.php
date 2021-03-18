<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_data extends CI_Model {
	public function __construct(){
            parent::__construct();
    }

	function get_userid($username){
		$data_userid = $this->db->query("SELECT * FROM data_user WHERE username = '$username'");
		return $data_userid;
	}
}
?>