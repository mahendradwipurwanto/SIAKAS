<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_printer extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function tampilkelas($id_kelas){
		$nama="";
		        $result = mysql_query("SELECT * FROM data_kelas WHERE id_kelas='$id_kelas'");
					while($row = mysql_fetch_array($result)){
		                $nama =$row['nama_kelas'];
					}
				return $nama;
	}

	function data_transaksi($kode_transaksi) {
	    $sql    = "SELECT * FROM data_transaksi
	                LEFT JOIN data_jenispembayaran ON
	                data_transaksi.id_jenispembayaran = data_jenispembayaran.id_pembayaran
	                LEFT JOIN data_siswa ON
	                data_transaksi.nis = data_siswa.nis

	                LEFT JOIN data_kelas ON 
	                data_siswa.kelas = data_kelas.id_kelas
	                WHERE data_transaksi.kode_transaksi LIKE '$kode_transaksi%'";
                $query = $this->db->query($sql);
            return $query->result();
    }
}?>