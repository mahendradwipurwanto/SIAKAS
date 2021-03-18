<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_jurusan extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function hitung(){
		$sql = "SELECT count(*) as total FROM data_jurusan";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function data_jurusan(){
		$sql = "SELECT * FROM data_jurusan
				ORDER BY data_jurusan.id_jurusan ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data(){
		
		$nama_jurusan = $this->input->post('nama_jurusan');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'nama_jurusan' => $nama_jurusan,
			'keterangan' => $keterangan,
			);

		$this->db->insert('data_jurusan',$data);
	}

	function edit_data(){
		
		$id_jurusan = $this->input->post('id_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'id_jurusan' => $id_jurusan,
			'nama_jurusan' => $nama_jurusan,
			'keterangan' => $keterangan,
			);

		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->update('data_jurusan', $data);
	}

	function hapus_data() {
		$id_jurusan = $this->input->post('id_jurusan');
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->delete('data_jurusan');
	}

	function hapus_data_all() {
		$delete = $this->input->post('msg');
		for ($i=0; $i < count($delete) ; $i++) { 
			$this->db->where('id_jurusan', $delete[$i]);
			$this->db->delete('data_jurusan');
		}
    }

}?>