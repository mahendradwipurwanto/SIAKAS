<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_template extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	function tampil_username($user_id){
		$nama;
        $result = mysql_query("SELECT username FROM data_user where id_user='$user_id'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['username'];
			}
		return $nama;
	}
	
	function tampil_username2($user_id){
		$nama;
        $result = mysql_query("SELECT nama FROM data_siswa where nis='$user_id'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['nama'];
			}
		return $nama;
	}
	
	function pengumuman(){
		$hariini	= date('Y-m-d');
		$sql = "SELECT count(*) as total FROM setting_pengumuman WHERE tanggal_pengumuman <= '$hariini' AND tanggal_akhir >='$hariini'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
}