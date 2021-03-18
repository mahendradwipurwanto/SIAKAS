<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pindah_kelas extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	function data_kelas(){
		$sql = "SELECT * FROM data_kelas ORDER BY nama_kelas ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function data_kelas2($id_kelas){
		$sql = "SELECT * FROM data_kelas WHERE id_kelas != '$id_kelas' ORDER BY nama_kelas ASC";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function pindah_kelas(){
		
		$kelas_asal		= $this->input->post('id_kelas');
		$kelas_tujuan	= $this->input->post('kelas_tujuan');

		$data = array (
			'kelas' 	=> $kelas_tujuan,
			);

		$this->db->where('kelas', $kelas_asal);
		$this->db->update('data_siswa', $data);
	}
}?>