<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function data_pengeluaran_1(){
		$sql = "SELECT *,data_pengeluaran.metode as caraku, data_pengeluaran.keterangan as isi FROM data_pengeluaran
				LEFT JOIN data_pos ON
				data_pengeluaran.pos_pengeluaran = data_pos.id_pos
				LEFT JOIN data_user ON
				data_pengeluaran.petugas = data_user.id_user
				ORDER BY data_pengeluaran.id_pengeluaran ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_pengeluaran($date1, $date2){
		$sql = "SELECT *,data_pengeluaran.metode as caraku,data_pengeluaran.keterangan as isi FROM data_pengeluaran
				LEFT JOIN data_pos ON
				data_pengeluaran.pos_pengeluaran = data_pos.id_pos
				LEFT JOIN data_user ON
				data_pengeluaran.petugas = data_user.id_user
				WHERE data_pengeluaran.tanggal_transaksi BETWEEN '$date1' AND '$date2'
				ORDER BY data_pengeluaran.id_pengeluaran ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_pos(){
		$sql = "SELECT * FROM data_pos
				WHERE metode = 'pengeluaran'
				ORDER BY data_pos.id_pos ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data($id_user){
	
		$pos 		= $this->input->post('pos');
		$metode 	= $this->input->post('metode');
		$keterangan = $this->input->post('keterangan');
		$jumlah 	= $this->input->post('jumlah');

			$date           	= date("Y-m-d");
			$tahun				= date("y");
			$bulan				= date("m");
			$tanggal			= date("d");

	        // Data Siswa
			
			$sql 					= "SELECT COUNT(*) as no_transaksi FROM data_pengeluaran WHERE tanggal_transaksi = '$date'";
	        $query 					= $this->db->query($sql);
	        $tampung				= $query->row('no_transaksi')+1;

	        // Data Siswa
		$kode_transaksi		= $tahun.''.$bulan.''.$tanggal.'2'.$id_user.''.$tampung;
		$petugas			= $id_user;

		$data = array (
			'kode_transaksi' 	 => $kode_transaksi,
			'tanggal_transaksi'  => $date,
			'pos_pengeluaran' 	 => $pos,
			'petugas' 			 => $petugas,
			'metode' 			 => $metode,
			'keterangan' 		 => $keterangan,
			'jumlah_pengeluaran' => $jumlah
			);

		$this->db->insert('data_pengeluaran',$data);
	}

	function edit_data(){
	
		$id_pengeluaran 		 = $this->input->post('id_pengeluaran');
		$pos 					 = $this->input->post('pos');
		$metode 				 = $this->input->post('metode');
		$keterangan 			 = $this->input->post('keterangan');
		$jumlah 				 = $this->input->post('jumlah');

		$data = array (
			'pos_pengeluaran' 	 => $pos,
			'metode' 			 => $metode,
			'keterangan' 		 => $keterangan,
			'jumlah_pengeluaran' => $jumlah
			);

		$this->db->where('id_pengeluaran', $id_pengeluaran);
		$this->db->update('data_pengeluaran',$data);
	}

	function hapus_data() {
		$id_pengeluaran = $this->input->post('id_pengeluaran');
		$this->db->where('id_pengeluaran', $id_pengeluaran);
		$this->db->delete('data_pengeluaran');
	}

}?>