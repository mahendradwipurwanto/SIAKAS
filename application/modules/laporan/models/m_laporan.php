<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	
	function data_transaksi(){
		$hariini = date("Y-m-d");
		$sql = "SELECT * FROM data_transaksi WHERE tanggal_pembayaran = '$hariini' ORDER BY tanggal_pembayaran ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function detail_transaksi($kode_transaksi){
		$hariini = date("Y-m-d");
		$sql = "SELECT * FROM data_transaksi WHERE kode_transaksi LIKE '$kode_transaksi%'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_transaksi_bulan(){
		$bulanini = date("Y-m");
		$sql = "SELECT * FROM data_transaksi WHERE tanggal_pembayaran LIKE '%$bulanini-%' ORDER BY tanggal_pembayaran ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_transaksi_tanggal($date1, $date2){
		$hariini = date("Y/m/d");
		$sql = "SELECT * FROM data_transaksi WHERE tanggal_pembayaran BETWEEN '$date1' AND '$date2' ORDER BY tanggal_pembayaran ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
}?>