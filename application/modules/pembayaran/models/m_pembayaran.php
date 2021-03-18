<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pembayaran extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function data_tahunajaran(){
		$sql = "SELECT * FROM data_tahunajaran WHERE status_kelulusan = 'Aktif'
				ORDER BY id_ta ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}
	
	function data_kelas($id_ta){
		$sql = "SELECT * FROM data_kelas
				WHERE id_ta='$id_ta' ORDER BY nama_kelas ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_siswa($id_kelas){
		$sql = "SELECT * FROM data_siswa
				WHERE kelas='$id_kelas' ORDER BY id_siswa ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_pembayar($nis){
		$sql = "SELECT * FROM data_siswa
				INNER JOIN data_kelas ON 
				data_siswa.kelas = data_kelas.id_kelas
				WHERE data_siswa.nis = '$nis'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_bulanan($nis){
		$sql = "SELECT * FROM data_tarif 
				LEFT JOIN data_jenispembayaran ON
				data_tarif.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				WHERE data_tarif.nis = '$nis'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function data_bulanan2($id_tarif, $nis){
		$sql = "SELECT * FROM data_tarif 
				LEFT JOIN data_jenispembayaran ON
				data_tarif.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				WHERE data_tarif.id_tarif = '$id_tarif' AND data_tarif.nis = '$nis'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_bebas($nis){
		$sql = "SELECT * FROM data_tarif_bebas 
				LEFT JOIN data_jenispembayaran ON
				data_tarif_bebas.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				WHERE data_tarif_bebas.nis = '$nis'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_bebas2($id_tarif,$nis){
		$sql = "SELECT * FROM data_tarif_bebas 
				LEFT JOIN data_jenispembayaran ON
				data_tarif_bebas.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				WHERE data_tarif_bebas.id_tarif = '$id_tarif' AND data_tarif_bebas.nis = '$nis'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_riwayat($nis){
		$sql = "SELECT * FROM data_transaksi
				LEFT JOIN data_siswa ON
				data_transaksi.nis = data_siswa.nis
				LEFT JOIN data_jenispembayaran ON
				data_transaksi.id_jenispembayaran = data_jenispembayaran.id_pembayaran
				WHERE data_transaksi.nis = '$nis' ORDER BY data_transaksi.kode_transaksi DESC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_pilih($nis){
		$sql = "SELECT * FROM data_jenispembayaran
				LEFT JOIN data_tarif ON 
				data_jenispembayaran.id_pembayaran = data_tarif.id_jenispembayaran
				WHERE data_tarif.nis = '$nis'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_pilih_bebas($nis){
		$sql = "SELECT * FROM data_jenispembayaran
				LEFT JOIN data_tarif_bebas ON 
				data_jenispembayaran.id_pembayaran = data_tarif_bebas.id_jenispembayaran
				WHERE data_tarif_bebas.nis = '$nis'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	
	function data_bayar($id_tarif){
		$sql = "SELECT * FROM data_tarif WHERE id_tarif = '$id_tarif'";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tambah_transaksi(){

		$jenis 		= $this->input->post('jenis');

		if ($jenis == 'bebas') {

			$id_tarif			= $this->input->post('id_tarif');
			$telah_dibayar		= $this->input->post('telah_dibayar');
			$nis 				= $this->input->post('nis');

			$date           	= date("y-m-d");
			$tahun				= date("y");
			$bulan				= date("m");
			$tanggal			= date("d");

	        // Data Siswa
			
			$sql 					= "SELECT COUNT(*) as no_transaksi FROM data_transaksi WHERE tanggal_pembayaran = '$date'";
	        $query 					= $this->db->query($sql);
	        $tampung				= $query->row('no_transaksi')+1;

	        // Data Siswa
			$kode_transaksi		= $tahun.''.$bulan.'0'.$tampung.''.$tanggal.''.$nis;
			$id_jenispembayaran = $this->input->post('id_bayar');
			$nis 				= $this->input->post('nis');
			$tanggal_pembayaran = $date;
			$cara_pembayaran	= $this->input->post('cara_pembayaran');
			$jumlah_pembayaran 	= $this->input->post('jumlah_pembayaran');

			$data = array (
				'kode_transaksi'	 => $kode_transaksi,
				'id_jenispembayaran' => $id_jenispembayaran,
				'tanggal_pembayaran' => $tanggal_pembayaran,
				'nis'  			 	 => $nis,
				'tanggal_pembayaran' => $tanggal_pembayaran,
				'cara_pembayaran' 	 => $cara_pembayaran,
				'bulan' 			 => 'bebas',
				'jumlah_pembayaran'  => $jumlah_pembayaran,
				);

			$this->db->insert('data_transaksi',$data);
 
			$akhir = $telah_dibayar+$jumlah_pembayaran;

			$data2 = array (
				'telah_dibayar'	 => $akhir
				);

			$this->db->where('id_tarif', $id_tarif);
			$this->db->update('data_tarif_bebas',$data2);
			
		}elseif ($jenis == 'bulanan') {

			$bulan1  			 = $this->input->post('bulan1');
			$bulan2 			 = $this->input->post('bulan2');
			$bulan3 		  	 = $this->input->post('bulan3');
			$bulan4 			 = $this->input->post('bulan4');
			$bulan5 			 = $this->input->post('bulan5');
			$bulan6 			 = $this->input->post('bulan6');
			$bulan7 			 = $this->input->post('bulan7');
			$bulan8 		     = $this->input->post('bulan8');
			$bulan9 			 = $this->input->post('bulan9');
			$bulan10 			 = $this->input->post('bulan10');
			$bulan11 			 = $this->input->post('bulan11');
			$bulan12		     = $this->input->post('bulan12');

			$id_tarif			 = $this->input->post('id_tarif');
			$id_cari			 = $this->input->post('id_bayar');
			$syarat				 = $this->input->post('nis');



				if ($bulan1 == '1') {
					$bulan_1  = 'Januari,';
					$status_1 = 'LUNAS';
	            	$nilai_1  = $this->input->post('nilai_1');
				}elseif($bulan1 == 'LUNAS'){
					$status_1 = 'LUNAS';
					$bulan_1 = '';
	            	$nilai_1 = '0';
				}else{
					$bulan_1 = '';
	            	$nilai_1 = '0';
				}

				if ($bulan1 == '1') {
					$bulan_2  = 'Februari,';
					$status_2 = 'LUNAS';
	            	$nilai_2  = $this->input->post('nilai_2');
				}elseif($bulan2 == 'LUNAS'){
					$status_2 = 'LUNAS';
					$bulan_2 = '';
	            	$nilai_2 = '0';
				}else{
					$bulan_2 = '';
	            	$nilai_2 = '0';
				}

				if ($bulan1 == '1') {
					$bulan_3  = 'Maret,';
					$status_3 = 'LUNAS';
	            	$nilai_3  = $this->input->post('nilai_3');
				}elseif($bulan3 == 'LUNAS'){
					$status_3 = 'LUNAS';
					$bulan_3 = '';
	            	$nilai_3 = '0';
				}else{
					$bulan_3 = '';
	            	$nilai_3 = '0';
				}

				if ($bulan4 == '1') {
					$bulan_4  = 'April,';
					$status_4 = 'LUNAS';
	            	$nilai_4  = $this->input->post('nilai_4');
				}elseif($bulan4 == 'LUNAS'){
					$status_4 = 'LUNAS';
					$bulan_4 = '';
	            	$nilai_4 = '0';
				}else{
					$bulan_4 = '';
	            	$nilai_4 = '0';
				}

				if ($bulan1 == '1') {
					$bulan_5  = 'Mei,';
					$status_5 = 'LUNAS';
	            	$nilai_5  = $this->input->post('nilai_5');
				}elseif($bulan5 == 'LUNAS'){
					$status_5 = 'LUNAS';
					$bulan_5 = '';
	            	$nilai_5 = '0';
				}else{
					$bulan_5 = '';
	            	$nilai_5 = '0';
				}

				if ($bulan1 == '1') {
					$bulan_6  = 'Juni,';
					$status_6 = 'LUNAS';
	            	$nilai_6  = $this->input->post('nilai_6');
				}elseif($bulan6 == 'LUNAS'){
					$status_6 = 'LUNAS';
					$bulan_6 = '';
	            	$nilai_6 = '0';
				}else{
					$bulan_6 = '';
	            	$nilai_6 = '0';
				}

				if ($bulan7 == '1') {
					$bulan_7  = 'Juli,';
					$status_7 = 'LUNAS';
	            	$nilai_7  = $this->input->post('nilai_7');
				}elseif($bulan7 == 'LUNAS'){
					$status_7 = 'LUNAS';
					$bulan_7 = '';
	            	$nilai_7 = '0';
				}else{
					$bulan_7 = '';
	            	$nilai_7 = '0';
				}

				if ($bulan8 == '1') {
					$bulan_8  = 'Agustus,';
					$status_8 = 'LUNAS';
	            	$nilai_8  = $this->input->post('nilai_8');
				}elseif($bulan8 == 'LUNAS'){
					$status_8 = 'LUNAS';
					$bulan_8 = '';
	            	$nilai_8 = '0';
				}else{
					$bulan_8 = '';
	            	$nilai_8 = '0';
				}

				if ($bulan9 == '1') {
					$bulan_9  = 'September,';
					$status_9 = 'LUNAS';
	            	$nilai_9  = $this->input->post('nilai_9');
				}elseif($bulan9 == 'LUNAS'){
					$status_9 = 'LUNAS';
					$bulan_9 = '';
	            	$nilai_9 = '0';
				}else{
					$bulan_9 = '';
	            	$nilai_9 = '0';
				}

				if ($bulan10 == '1') {
					$bulan_10  = 'Oktober,';
					$status_10 = 'LUNAS';
	            	$nilai_10  = $this->input->post('nilai_10');
				}elseif($bulan10 == 'LUNAS'){
					$status_10 = 'LUNAS';
					$bulan_10 = '';
	            	$nilai_10 = '0';
				}else{
					$bulan_10 = '';
	            	$nilai_10 = '0';
				}

				if ($bulan11 == '1') {
					$bulan_11  = 'November,';
					$status_11 = 'LUNAS';
	            	$nilai_11  = $this->input->post('nilai_11');
				}elseif($bulan11 == 'LUNAS'){
					$status_11 = 'LUNAS';
					$bulan_11 = '';
	            	$nilai_11 = '0';
				}else{
					$bulan_11 = '';
	            	$nilai_11 = '0';
				}

				if ($bulan12 == '1') {
					$bulan_12  = 'Desember,';
					$status_12 = 'LUNAS';
	            	$nilai_12  = $this->input->post('nilai_12');
				}elseif($bulan12 == 'LUNAS'){
					$status_12 = 'LUNAS';
					$bulan_12 = '';
	            	$nilai_12 = '0';
				}else{
					$bulan_12 = '';
	            	$nilai_12 = '0';
				}









				
				// if ($bulan1 == '1' OR $bulan1 == 'LUNAS') {
				// 	$bulan_1  = 'Januari,';
				// 	$status_1 = 'LUNAS';
	   //          	$nilai_1  = $this->input->post('nilai_1');

				// }else{
				// 	$bulan_1 = '';
	   //          	$nilai_1 = '0';
				// }

				// if ($bulan2 == '1' OR $bulan2 == 'LUNAS') {
				// 	$bulan_2  = 'Februari,';
				// 	$status_2 = 'LUNAS';
	   //          	$nilai_2  = $this->input->post('nilai_2');
				// }else{
				// 	$bulan_2 = '';
	   //          	$nilai_2 = '0';
				// }

				// if ($bulan3 == '1' OR $bulan3 == 'LUNAS') {
				// 	$bulan_3  = 'Maret,';
				// 	$status_3 = 'LUNAS';
	   //          	$nilai_3  = $this->input->post('nilai_3');
				// }else{
				// 	$bulan_3 = '';
	   //          	$nilai_3 = '0';
				// }

				// if ($bulan4 == '1' OR $bulan4 == 'LUNAS') {
				// 	$bulan_4  = 'April,';
				// 	$status_4 = 'LUNAS';
	   //          	$nilai_4  = $this->input->post('nilai_4');
				// }else{
				// 	$bulan_4 = '';
	   //          	$nilai_4 = '0';
				// }

				// if ($bulan5 == '1' OR $bulan5 == 'LUNAS') {
				// 	$bulan_5  = 'Mei,';
				// 	$status_5 = 'LUNAS';
	   //          	$nilai_5  = $this->input->post('nilai_5');
				// }else{
				// 	$bulan_5 = '';
	   //          	$nilai_5 = '0';
				// }

				// if ($bulan6 == '1' OR $bulan6 == 'LUNAS') {
				// 	$bulan_6  = 'Juni,';
				// 	$status_6 = 'LUNAS';
	   //          	$nilai_6  = $this->input->post('nilai_6');
				// }else{
				// 	$bulan_6 = '';
	   //          	$nilai_6 = '0';
				// }

				// if ($bulan7 == '1' OR $bulan7 == 'LUNAS') {
				// 	$bulan_7  = 'Juli,';
				// 	$status_7 = 'LUNAS';
	   //          	$nilai_7  = $this->input->post('nilai_7');
				// }else{
				// 	$bulan_7 = '';
	   //          	$nilai_7 = '0';
				// }

				// if ($bulan8 == '1' OR $bulan8 == 'LUNAS') {
				// 	$bulan_8  = 'Agustus,';
				// 	$status_8 = 'LUNAS';
	   //          	$nilai_8  = $this->input->post('nilai_8');
				// }else{
				// 	$bulan_8 = '';
	   //          	$nilai_8 = '0';
				// }

				// if ($bulan9 == '1' OR $bulan9 == 'LUNAS') {
				// 	$bulan_9  = 'September,';
				// 	$status_9 = 'LUNAS';
	   //          	$nilai_9  = $this->input->post('nilai_9');
				// }else{
				// 	$bulan_9 = '';
	   //          	$nilai_9 = '0';
				// }

				// if ($bulan10 == '1' OR $bulan10 == 'LUNAS') {
				// 	$bulan_10  = 'Oktober,';
				// 	$status_10 = 'LUNAS';
	   //          	$nilai_10  = $this->input->post('nilai_10');
				// }else{
				// 	$bulan_10 = '';
	   //          	$nilai_10 = '0';
				// }

				// if ($bulan11 == '1' OR $bulan11 == 'LUNAS') {
				// 	$bulan_11  = 'November,';
				// 	$status_11 = 'LUNAS';
	   //          	$nilai_11  = $this->input->post('nilai_11');
				// }else{
				// 	$bulan_11 = '';
	   //          	$nilai_11 = '0';
				// }

				// if ($bulan12 == '1' OR $bulan12 == 'LUNAS') {
				// 	$bulan_12  = 'Desember,';
				// 	$status_12 = 'LUNAS';
	   //          	$nilai_12  = $this->input->post('nilai_12');
				// }else{
				// 	$bulan_12 = '';
	   //          	$nilai_12 = '0';
				// }

			$nis = $this->input->post('nis');
			$metode = $this->input->post('metode');

			$date           	= date("Y-m-d");
			$tahun				= date("y");
			$bulan				= date("m");
			$tanggal			= date("d");

	        // Data Siswa
		
			$sql 					= "SELECT COUNT(*) as no_transaksi FROM data_transaksi WHERE tanggal_pembayaran = '$date'";
	        $query 					= $this->db->query($sql);
	        $tampung				= $query->row('no_transaksi')+1;
	        $tampung2				= $query->row('no_transaksi')+2;

	        // Data Siswa
			$kode_transaksi		= $tahun.'1'.$bulan.'0'.$tampung.''.$tanggal.''.$tampung2.''.$nis;
			$id_jenispembayaran = $this->input->post('id_bayar');
			$nis 				= $this->input->post('nis');
			$tanggal_pembayaran = $date;
			$cara_pembayaran	= $this->input->post('cara_pembayaran');
			$bulan  			= $this->input->post('bulan');
			$jumlah_pembayaran 	= $this->input->post('jumlah_pembayaran');

			$data = array (
				'kode_transaksi'	 => $kode_transaksi,
				'id_jenispembayaran' => $id_jenispembayaran,
				'tanggal_pembayaran' => $tanggal_pembayaran,
				'nis'  			 	 => $nis,
				'tanggal_pembayaran' => $tanggal_pembayaran,
				'cara_pembayaran' 	 => $cara_pembayaran,
				'bulan' 			 => $bulan_1.' '.$bulan_2.' '.$bulan_3.' '.$bulan_4.' '.$bulan_5.' '.$bulan_6.' '.$bulan_7.' '.$bulan_8.' '.$bulan_9.' '.$bulan_10.' '.$bulan_11.' '.$bulan_12,
				'jumlah_pembayaran'  => $nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5+$nilai_6+$nilai_7+$nilai_8+$nilai_9+$nilai_10+$nilai_11+$nilai_12,
				);

			$data2 = array (
				'bulan1'			=> $status_1,
				'bulan2'			=> $status_2,
				'bulan3'			=> $status_3,
				'bulan4'			=> $status_4,
				'bulan5'			=> $status_5,
				'bulan6'			=> $status_6,
				'bulan7'			=> $status_7,
				'bulan8'			=> $status_8,
				'bulan9'			=> $status_9,
				'bulan10'			=> $status_10,
				'bulan11'			=> $status_11,
				'bulan12'			=> $status_12,
			);

			$this->db->insert('data_transaksi',$data);

			$this->db->where('id_tarif', $id_tarif);
			$this->db->update('data_tarif',$data2);
		}else{
			echo "<script>alert('Data Error!!!');windows.history.go(-1)</script>";
		}
	}

}?>