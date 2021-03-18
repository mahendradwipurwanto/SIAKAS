<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function data_siswa($id){
		$hariini = date("Y-m-d");
		$sql = "SELECT * FROM data_siswa
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas 
				WHERE data_siswa.nis = '$id'";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tentang(){
		$sql = "SELECT * FROM setting_update ORDER BY id_update DESC";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tentang_admin($id){
		$sql = "SELECT * FROM setting_update WHERE id_update = '$id'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_pembayaran(){
		$hariini = date("Y-m-d");
		$sql = "SELECT * FROM data_transaksi
				LEFT JOIN data_jenispembayaran ON
				data_transaksi.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				LEFT JOIN data_pos ON
				data_jenispembayaran.nama_pos = data_pos.id_pos
				WHERE data_pos.metode = 'pembayaran' AND data_transaksi.tanggal_pembayaran = '$hariini'
				ORDER BY data_transaksi.tanggal_pembayaran ASC LIMIt 0,5";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_pengeluaran(){
		$hariini = date("Y-m-d");
		$sql = "SELECT * FROM data_pengeluaran
				LEFT JOIN data_pos ON
				data_pengeluaran.pos_pengeluaran = data_pos.id_pos
				WHERE data_pos.metode = 'pengeluaran' AND data_pengeluaran.tanggal_transaksi = '$hariini'
				ORDER BY data_pengeluaran.tanggal_transaksi ASC LIMIt 0,5";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function data_update(){
		$sql = "SELECT * FROM setting_update";
			   $query = $this->db->query($sql);

			return $query->result();
	}
 
 	function hitung_guru(){
		$sql = "SELECT count(*) as total FROM data_guru";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function hitung_siswa(){
		$sql = "SELECT count(*) as total FROM data_siswa";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function hitung_kelas(){
		$sql = "SELECT count(*) as total FROM data_kelas";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function hitung_jurusan(){
		$sql = "SELECT count(*) as total FROM data_jurusan";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function login_history(){
		$sql = "SELECT * FROM login_history
				LEFT JOIN data_user ON
				login_history.user_id = data_user.id_user
				ORDER BY login_history.id_history DESC LIMIT 0,5";
			   $query = $this->db->query($sql);

			return $query->result();
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
 
}?>