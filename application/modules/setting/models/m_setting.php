<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_setting extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function data_pengumuman(){
		$sql = "SELECT * FROM setting_pengumuman";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_user($id_user){
		$sql = "SELECT * FROM data_user WHERE id_user = '$id_user'";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_pengumuman_list(){
		$hariini	= date('Y-m-d');
		$sql = "SELECT * FROM setting_pengumuman
				LEFT JOIN data_user ON 
				setting_pengumuman.id_user = data_user.id_user
				WHERE setting_pengumuman.tanggal_pengumuman <= '$hariini' AND setting_pengumuman.tanggal_akhir >='$hariini'";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_pengumuman_cari($id){
		$sql = "SELECT * FROM setting_pengumuman
				LEFT JOIN data_user ON 
				setting_pengumuman.id_user = data_user.id_user
				WHERE id_pengumuman = '$id'";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_metode(){
		$sql = "SELECT * FROM setting_metode";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_update(){
		$sql = "SELECT * FROM setting_update";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_level(){
		$sql = "SELECT * FROM setting_level";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_website(){
		$sql = "SELECT * FROM setting_website";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_user2(){
		$sql = "SELECT * FROM data_user";
			   $query = $this->db->query($sql);

			return $query->result();
	}
	
	function edit_username(){
		$nama;
        $result = mysql_query("SELECT value FROM setting_website where id_website = 'edit-username-siswa'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['value'];
			}
		return $nama;
	}
	
	function nama_sekolah(){
		$nama;
        $result = mysql_query("SELECT value FROM setting_website where id_website = 'nama-sekolah'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['value'];
			}
		return $nama;
	}
	
	function alamat_sekolah(){
		$nama;
        $result = mysql_query("SELECT value FROM setting_website where id_website = 'alamat'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['value'];
			}
		return $nama;
	}
	
	function telp(){
		$nama;
        $result = mysql_query("SELECT value FROM setting_website where id_website = 'telp'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['value'];
			}
		return $nama;
	}
	
	function jenjang(){
		$nama;
        $result = mysql_query("SELECT value FROM setting_website where id_website = 'jenjang'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['value'];
			}
		return $nama;
	}
	
	function setting_user(){
		$nama;
        $result = mysql_query("SELECT value FROM setting_website where id_website = 'edit-username-siswa'");
			while($row = mysql_fetch_array($result)){
                $nama=$row['value'];
			}
		return $nama;
	}

	function update_website(){

		$a = $this->input->post('nama_sekolah');
		$b = $this->input->post('alamat_sekolah');
		$c = $this->input->post('jenjang');
		$d = $this->input->post('telp');
		$e = $this->input->post('registrasi-siswa');

		$aa = array (
			'value' => $a,
			);

		$bb = array (
			'value' => $b,
			);

		$cc = array (
			'value' => $c,
			);

		$dd = array (
			'value' => $d,
			);

		$ee = array (
			'value' => $e,
			);

		$this->db->where('id_website', 'nama-sekolah');
		$this->db->update('setting_website', $aa);

		$this->db->where('id_website', 'alamat');
		$this->db->update('setting_website', $bb);

		$this->db->where('id_website', 'jenjang');
		$this->db->update('setting_website', $cc);

		$this->db->where('id_website', 'telp');
		$this->db->update('setting_website', $dd);

		$this->db->where('id_website', 'edit-username-siswa');
		$this->db->update('setting_website', $ee);
	}

	function tambah_user(){
	
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$level 	  = $this->input->post('level');

		$data = array (
			'username'   => $username,
			'password'   => $password,
			'level' 	 => $level,
			);

		$this->db->insert('data_user',$data);
	}

	function update_user(){
	
		$id_user  = $this->input->post('id_user');

		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$level = $this->input->post('level');

		$data = array (
			'username'   => $username,
			'password'   => $password,
			'level' 	 => $level,
			);

		$this->db->where('id_user',$id_user);
		$this->db->update('data_user',$data);
	}

	function hapus_user() {
		$id_user = $this->input->post('id_user');
		$this->db->where('id_user', $id_user);
		$this->db->delete('data_user');
	}



	function tambah_level(){

		$level 		= $this->input->post('level');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'level' 	   => $level,
			'keterangan'   => $keterangan,
			);

		$this->db->insert('setting_level',$data);
	}

	function update_level(){
	
		$id_level  = $this->input->post('id_level');

		$level 		= $this->input->post('level');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'level' 	   => $level,
			'keterangan'   => $keterangan,
			);

		$this->db->where('id_level',$id_level);
		$this->db->update('setting_level',$data);
	}

	function hapus_level() {
		$id_level = $this->input->post('id_level');
		$this->db->where('id_level', $id_level);
		$this->db->delete('setting_level');
	}



	function tambah_metode(){

		$nama_metode = $this->input->post('nama_metode');
		$keterangan  = $this->input->post('keterangan');

		$data = array (
			'nama_metode'  => $nama_metode,
			'keterangan'   => $keterangan,
			);

		$this->db->insert('setting_metode',$data);
	}

	function update_metode(){
	
		$id_metode  = $this->input->post('id_metode');

		$nama_metode 		= $this->input->post('nama_metode');
		$keterangan 		= $this->input->post('keterangan');

		$data = array (
			'nama_metode'  => $nama_metode,
			'keterangan'   => $keterangan,
			);

		$this->db->where('id_metode',$id_metode);
		$this->db->update('setting_metode',$data);
	}

	function hapus_metode() {
		$id_metode = $this->input->post('id_metode');
		$this->db->where('id_metode', $id_metode);
		$this->db->delete('setting_metode');
	}



	function tambah_update(){

		$update_versi 		= $this->input->post('update_versi');
		$tanggal_update     = $this->input->post('tanggal_update');
		$keterangan  		= $this->input->post('keterangan');

		$data = array (
			'update_versi'    => $update_versi,
			'tanggal_update'  => $tanggal_update,
			'keterangan'      => $keterangan,
			);

		$this->db->insert('setting_update',$data);
	}

	function update_update(){
	
		$id_update  = $this->input->post('id_update');

		$update_versi 		= $this->input->post('update_versi');
		$tanggal_update     = $this->input->post('tanggal_update');
		$keterangan  		= $this->input->post('keterangan');

		$data = array (
			'update_versi'    => $update_versi,
			'tanggal_update'  => $tanggal_update,
			'keterangan'      => $keterangan,
			);

		$this->db->where('id_update',$id_update);
		$this->db->update('setting_update',$data);
	}

	function hapus_update() {
		$id_update = $this->input->post('id_update');
		$this->db->where('id_update', $id_update);
		$this->db->delete('setting_update');
	}



	function tambah_pengumuman($id_user){

		$subjek 				= $this->input->post('subjek');
		$tanggal_pengumuman     = $this->input->post('tanggal_pengumuman');
		$tanggal_akhir	        = $this->input->post('tanggal_akhir');
		$isi_pengumuman  		= $this->input->post('isi_pengumuman');

		$data = array (
			'subjek'    		  => $subjek,
			'tanggal_pengumuman'  => $tanggal_pengumuman,
			'tanggal_akhir'		  => $tanggal_akhir,
			'isi_pengumuman'      => $isi_pengumuman,
			'id_user'      		  => $id_user,
			);

		$this->db->insert('setting_pengumuman',$data);
	}

	function update_pengumuman(){
	
		$id_pengumuman  = $this->input->post('id_pengumuman');

		$subjek 				= $this->input->post('subjek');
		$tanggal_pengumuman     = $this->input->post('tanggal_pengumuman');
		$tanggal_akhir	        = $this->input->post('tanggal_akhir');
		$isi_pengumuman  		= $this->input->post('isi_pengumuman');

		$data = array (
			'subjek'    		  => $subjek,
			'tanggal_pengumuman'  => $tanggal_pengumuman,
			'tanggal_akhir'		  => $tanggal_akhir,
			'isi_pengumuman'      => $isi_pengumuman,
			);

		$this->db->where('id_pengumuman',$id_pengumuman);
		$this->db->update('setting_pengumuman',$data);
	}

	function hapus_pengumuman() {
		$id_pengumuman = $this->input->post('id_pengumuman');
		$this->db->where('id_pengumuman', $id_pengumuman);
		$this->db->delete('setting_pengumuman');
	}



	function update_datauser($user_id){

		$username 				= $this->input->post('username');
		$password		        = sha1($this->input->post('password'));

		if ($username == '') {

			$data = array (
				'password'  => $password,
				);
		}else{

			$data = array (
				'username'  => $username,
				'password'  => $password,
				);
		}

		$this->db->where('id_user',$user_id);
		$this->db->update('data_user',$data);
	}

}?>