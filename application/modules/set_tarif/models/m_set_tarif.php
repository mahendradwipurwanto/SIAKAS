<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  M_set_tarif extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function jumlah_pembayar_bulan($id_bayar){
		$sql = "SELECT count(*) as total FROM data_tarif WHERE nis != '' AND id_jenispembayaran = '$id_bayar'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function jumlah_pembayar_bebas($id_bayar){
		$sql = "SELECT count(*) as total FROM data_tarif_bebas WHERE nis != '' AND id_jenispembayaran = '$id_bayar'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function data_kelamin($nis){
		$data_siswa = $this->db->query("SELECT * FROM data_siswa WHERE nis = '$nis'");
		return $data_siswa;
	}
 
 	function data_tarif_bebas($id_bayar, $nis){
		$sql = "SELECT *, data_tarif_bebas.keterangan as ket FROM data_tarif_bebas
				LEFT JOIN data_jenispembayaran ON
				data_tarif_bebas.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				LEFT JOIN data_siswa ON
				data_tarif_bebas.nis = data_siswa.nis
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas
				WHERE data_tarif_bebas.id_jenispembayaran = '$id_bayar' AND data_tarif_bebas.nis = '$nis'
				";
			   $query = $this->db->query($sql);

			return $query->result();
	}
 
 	function data_tarif_bulan($id_bayar, $nis){
		$sql = "SELECT *, data_tarif.keterangan as ket FROM data_tarif
				LEFT JOIN data_jenispembayaran ON
				data_tarif.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				LEFT JOIN data_siswa ON
				data_tarif.nis = data_siswa.nis
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas
				WHERE data_tarif.id_jenispembayaran = '$id_bayar' AND data_tarif.nis = '$nis'
				";
			   $query = $this->db->query($sql);

			return $query->result();
	}
 
 	function jumlah_pembayar_kelas_bulan($id_kelas){
		$sql = "SELECT count(*) as total FROM data_tarif
				LEFT JOIN data_siswa ON
				data_tarif.nis = data_siswa.nis
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas
				WHERE data_siswa.kelas = '$id_kelas' AND data_tarif.nis != ''";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function jumlah_pembayar_kelas_bebas($id_kelas){
		$sql = "SELECT count(*) as total FROM data_tarif_bebas
				LEFT JOIN data_siswa ON
				data_tarif_bebas.nis = data_siswa.nis
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas
				WHERE data_siswa.kelas = '$id_kelas' AND data_tarif_bebas.nis != ''";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function data_jurusan(){
		$sql = "SELECT * FROM data_jurusan
				ORDER BY data_jurusan.id_jurusan ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}
	
	function data_tingkat(){
		$sql = "SELECT * FROM data_tingkat";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function data_kelas($id_jurusan){

		$sql = "SELECT * FROM data_kelas
				WHERE id_jurusan='$id_jurusan' AND id_kelas IN (SELECT kelas FROM data_siswa WHERE nis IN (SELECT nis FROM data_tarif)) ORDER BY nama_kelas ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function data_kelas3($id_jurusan){

		$sql = "SELECT * FROM data_kelas
				WHERE id_jurusan='$id_jurusan' ORDER BY nama_kelas ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function kelas($id_kelas){
		$sql = "SELECT * FROM data_kelas
				WHERE id_kelas='$id_kelas'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function data_kelas2(){
		$sql = "SELECT * FROM data_kelas
				ORDER BY data_kelas.nama_kelas ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function data_pembayar_bulan($id_kelas, $id_bayar){
		$sql = "SELECT * FROM data_tarif
				LEFT JOIN data_siswa ON
				data_tarif.nis = data_siswa.nis
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas
				LEFT JOIN data_jenispembayaran ON
				data_tarif.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				WHERE data_siswa.kelas = '$id_kelas' AND data_tarif.nis != '' AND data_tarif.id_jenispembayaran = '$id_bayar'
				ORDER BY data_tarif.id_tarif ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_pembayar_bebas($id_kelas, $id_bayar){
		$sql = "SELECT * FROM data_tarif_bebas
				LEFT JOIN data_siswa ON
				data_tarif_bebas.nis = data_siswa.nis
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas
				LEFT JOIN data_jenispembayaran ON
				data_tarif_bebas.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				WHERE data_siswa.kelas = '$id_kelas' AND data_tarif_bebas.nis != '' AND data_tarif_bebas.id_jenispembayaran = '$id_bayar'
				ORDER BY data_tarif_bebas.id_tarif ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}
	
	function data_jenispembayaran($idnya){
		$sql = "SELECT * FROM data_jenispembayaran
				WHERE id_pembayaran='$idnya'";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function data_siswa($id_kelas){
		$sql = "SELECT * FROM data_siswa
				WHERE data_siswa.kelas = '$id_kelas'
				ORDER BY data_siswa.nis ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data(){

		$jenis 		= $this->input->post('jenis');
		$id_bayar 	= $this->input->post('id_bayar');
		$dasar 		= $this->input->post('dasar');


		if ($jenis == 'bebas' && $dasar == 'siswa') {

			$kumpul = $this->input->post('nis');
			
			for ($i=0; $i < count($kumpul) ; $i++) { 

			$date           	= date("Y/m/d");
			$tahun				= date("y");
			$bulan				= date("m");
			$tanggal			= date("d");

	        // Data Siswa

	        // Data Siswa
	        $tambah 			= '1';
			$id_jenispembayaran = $this->input->post('id_bayar');
			$tanggal_pembayaran = $date;
			$tarif 				= $this->input->post('tarif');
			$keterangan 		= $this->input->post('keterangan');

			$data = array (
				'id_jenispembayaran' => $id_jenispembayaran,
				'nis' 				 => $kumpul[$i],
				'tanggal_pembayaran' => $tanggal_pembayaran,
				'tarif_pembayaran'   => $tarif,
				'keterangan' 		 => $keterangan,
				'dasar' 		 	 => $dasar,
				);

			$this->db->insert('data_tarif_bebas',$data);
			}
			
		}elseif ($jenis == 'bulanan' && $dasar == 'siswa') {

			$kumpul = $this->input->post('nis');
			for ($i=0; $i < count($kumpul) ; $i++) { 

			$date           	= date("Y/m/d");
			$tahun				= date("y");
			$bulan				= date("m");
			$tanggal			= date("d");

	        // Data Siswa

	        // Data Siswa

	        $tampung 			= '2';
			// $id_status			= $tanggal.''.$bulan.''.$tahun.''.$tampung.''.$kumpul[$i];
			$id_jenispembayaran = $this->input->post('id_bayar');
			$tanggal_pembayaran = $date;
			$bulan_1 			= $this->input->post('bulan_1');
			$bulan_2 			= $this->input->post('bulan_2');
			$bulan_3 			= $this->input->post('bulan_3');
			$bulan_4 			= $this->input->post('bulan_4');
			$bulan_5 			= $this->input->post('bulan_5');
			$bulan_6 			= $this->input->post('bulan_6');
			$bulan_7 			= $this->input->post('bulan_7');
			$bulan_8 			= $this->input->post('bulan_8');
			$bulan_9    		= $this->input->post('bulan_9');
			$bulan_10   		= $this->input->post('bulan_10');
			$bulan_11   		= $this->input->post('bulan_11');
			$bulan_12   		= $this->input->post('bulan_12');
			$keterangan 		= $this->input->post('keterangan');
			$dasar 				= $this->input->post('dasar');

			$data = array (
				'id_jenispembayaran' => $id_jenispembayaran,
				'nis' 				 => $kumpul[$i],
				'tanggal_pembayaran' => $tanggal_pembayaran,
				'bulan_1'  			 => $bulan_1,
				'bulan_2' 			 => $bulan_2,
				'bulan_3' 		  	 => $bulan_3,
				'bulan_4' 			 => $bulan_4,
				'bulan_5' 			 => $bulan_5,
				'bulan_6' 			 => $bulan_6,
				'bulan_7' 			 => $bulan_7,
				'bulan_8' 		     => $bulan_8,
				'bulan_9' 			 => $bulan_9,
				'bulan_10' 			 => $bulan_10,
				'bulan_11' 			 => $bulan_11,
				'bulan_12'		     => $bulan_12,
				'keterangan' 		 => $keterangan,
				'dasar'				 => $dasar,
				'bulan1'  			 => '0',
				'bulan2' 			 => '0',
				'bulan3' 		  	 => '0',
				'bulan4' 			 => '0',
				'bulan5' 			 => '0',
				'bulan6' 			 => '0',
				'bulan7' 			 => '0',
				'bulan8' 		     => '0',
				'bulan9' 			 => '0',
				'bulan10' 			 => '0',
				'bulan11' 			 => '0',
				'bulan12'		     => '0',
				);

			$this->db->insert('data_tarif',$data);
			}
		}else{
			echo "<script>alert('Data Error!!!');windows.history.go(-1)</script>";
		}
	}

	function edit_data(){

		$jenis 			= $this->input->post('jenis');
		$id_tarif 	= $this->input->post('id_tarif');


		if ($jenis == 'bebas') {

			$id_tarif 		= $this->input->post('id_tarif');
			$tarif_pembayaran 	= $this->input->post('tarif_pembayaran');
			$keterangan 		= $this->input->post('keterangan');

			$data = array (
				'id_tarif' 		 => $id_tarif,
				'tarif_pembayaran'   => $tarif_pembayaran,
				'keterangan' 		 => $keterangan,
				);

				$this->db->where('id_tarif', $id_tarif);
				$this->db->update('data_tarif_bebas', $data);
			
		}elseif ($jenis == 'bulanan') {

			$id_tarif 		= $this->input->post('id_tarif');
			$bulan_1 			= $this->input->post('bulan_1');
			$bulan_2 			= $this->input->post('bulan_2');
			$bulan_3 			= $this->input->post('bulan_3');
			$bulan_4 			= $this->input->post('bulan_4');
			$bulan_5 			= $this->input->post('bulan_5');
			$bulan_6 			= $this->input->post('bulan_6');
			$bulan_7 			= $this->input->post('bulan_7');
			$bulan_8 			= $this->input->post('bulan_8');
			$bulan_9    		= $this->input->post('bulan_9');
			$bulan_10   		= $this->input->post('bulan_10');
			$bulan_11   		= $this->input->post('bulan_11');
			$bulan_12   		= $this->input->post('bulan_12');
			$keterangan 		= $this->input->post('keterangan');

			$data = array (
				'id_tarif' 		 => $id_tarif,
				'bulan_1'  			 => $bulan_1,
				'bulan_2' 			 => $bulan_2,
				'bulan_3' 		  	 => $bulan_3,
				'bulan_4' 			 => $bulan_4,
				'bulan_5' 			 => $bulan_5,
				'bulan_6' 			 => $bulan_6,
				'bulan_7' 			 => $bulan_7,
				'bulan_8' 		     => $bulan_8,
				'bulan_9' 			 => $bulan_9,
				'bulan_10' 			 => $bulan_10,
				'bulan_11' 			 => $bulan_11,
				'bulan_12'		     => $bulan_12,
				'keterangan' 		 => $keterangan,
				);

				$this->db->where('id_tarif', $id_tarif);
				$this->db->update('data_tarif', $data);
		}else{
			echo "<script>alert('Data Error!!!');history.go(-1);</script>";
		}
	}

	function hapus_data_all() {
		$delete = $this->input->post('msg');
		for ($i=0; $i < count($delete) ; $i++) { 
			$this->db->where('nis', $delete[$i]);
			$this->db->delete('data_tarif');
			$this->db->where('nis', $delete[$i]);
			$this->db->delete('status_tarif');
		}
	}

	function hapus_data() {
		$nis = $this->input->post('nis');
		$this->db->where('nis', $nis);
		$this->db->delete('data_tarif');
		$this->db->where('nis', $delete[$i]);
		$this->db->delete('status_tarif');
	}
 
}
?>