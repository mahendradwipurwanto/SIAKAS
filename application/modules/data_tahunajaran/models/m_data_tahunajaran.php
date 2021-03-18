<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_tahunajaran extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function hitung(){
		$sql = "SELECT count(*) as total FROM data_tahunajaran";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function data_tahunajaran(){
		$sql = "SELECT * FROM data_tahunajaran
				ORDER BY data_tahunajaran.id_ta ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data(){
		
		$nama_ta = $this->input->post('nama_ta');
		$status_kelulusan = $this->input->post('status_kelulusan');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'nama_ta' => $nama_ta,
			'status_kelulusan' => $status_kelulusan,
			'keterangan' => $keterangan,
			);

		$this->db->insert('data_tahunajaran',$data);
	}

	function edit_data(){
		
		$id_ta = $this->input->post('id_ta');
		$nama_ta = $this->input->post('nama_ta');
		$status_kelulusan = $this->input->post('status_kelulusan');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'nama_ta' => $nama_ta,
			'status_kelulusan' => $status_kelulusan,
			'keterangan' => $keterangan,


			);

		$this->db->where('id_ta', $id_ta);
		$this->db->update('data_tahunajaran', $data);
	}

	function hapus_data() {
		$id_ta = $this->input->post('id_ta');
		$this->db->where('id_ta', $id_ta);
		$this->db->delete('data_tahunajaran');
	}

	function hapus_data_all() {
			$delete = $this->input->post('msg');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_ta', $delete[$i]);
				$this->db->delete('data_tahunajaran');
			}
	}

}?>