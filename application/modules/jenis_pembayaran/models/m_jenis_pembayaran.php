<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jenis_pembayaran extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function hitung_pembayar(){
		$sql = "SELECT count(*) as total FROM data_jenispembayaran";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function jenis_pembayaran(){
		$sql = "SELECT * FROM data_jenispembayaran
				LEFT JOIN data_pos ON
				data_jenispembayaran.nama_pos = data_pos.id_pos
				LEFT JOIN data_tahunajaran ON
				data_jenispembayaran.tahun_ajaran = data_tahunajaran.id_ta
				ORDER BY data_jenispembayaran.id_pembayaran ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function pos_keuangan(){
		$sql = "SELECT * FROM data_pos
				ORDER BY data_pos.id_pos ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_tahunajaran(){
		$sql = "SELECT * FROM data_tahunajaran
				ORDER BY data_tahunajaran.id_ta ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data(){
		
		$nama_pos = $this->input->post('nama_pos');
		$nama_pembayaran = $this->input->post('nama_pembayaran');
		$jenis = $this->input->post('jenis');
		$tahun_ajaran = $this->input->post('tahun_ajaran');

		$data = array (
			'nama_pos' => $nama_pos,
			'nama_pembayaran' => $nama_pembayaran,
			'jenis' => $jenis,
			'tahun_ajaran' => $tahun_ajaran,
			);
		
		$this->db->insert('data_jenispembayaran',$data);
	}

	function edit_data(){
		
		$id_pembayaran = $this->input->post('id_pembayaran');
		$nama_pos = $this->input->post('nama_pos');
		$nama_pembayaran = $this->input->post('nama_pembayaran');
		$jenis = $this->input->post('jenis');
		$tahun_ajaran = $this->input->post('tahun_ajaran');

		$data = array (
			'id_pembayaran' => $id_pembayaran,
			'nama_pos' => $nama_pos,
			'nama_pembayaran' => $nama_pembayaran,
			'jenis' => $jenis,
			'tahun_ajaran' => $tahun_ajaran,
			);

		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->update('data_jenispembayaran', $data);
	}

	function hapus_data() {
		$id_pembayaran = $this->input->post('id_pembayaran');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->delete('data_jenispembayaran');
	}

	function hapus_data_all() {
		$delete = $this->input->post('msg');
		for ($i=0; $i < count($delete) ; $i++) { 
			$this->db->where('id_pembayaran', $delete[$i]);
			$this->db->delete('data_jenispembayaran');
		}
	}
 
}?>