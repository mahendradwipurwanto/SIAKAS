<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pos_pengeluaran extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function hitung(){
		$sql = "SELECT count(*) as total FROM data_pos
				WHERE metode = 'pengeluaran'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function pos_pengeluaran(){
		$sql = "SELECT * FROM data_pos
				WHERE metode = 'pengeluaran'
				ORDER BY data_pos.id_pos ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data(){
		
		$nama_pos = $this->input->post('nama_pos');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'nama_pos' => $nama_pos,
			'keterangan' => $keterangan,
			'metode' => 'pengeluaran',
			);
		
		$this->db->insert('data_pos',$data);
	}

	function edit_data(){
		
		$id_pos = $this->input->post('id_pos');
		$nama_pos = $this->input->post('nama_pos');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'id_pos' => $id_pos,
			'nama_pos' => $nama_pos,
			'keterangan' => $keterangan,
			);

		$this->db->where('id_pos', $id_pos);
		$this->db->update('data_pos', $data);
	}

	function hapus_data() {
		$id_pos = $this->input->post('id_pos');
		$this->db->where('id_pos', $id_pos);
		$this->db->delete('data_pos');
	}

	function hapus_data_all() {
		$delete = $this->input->post('msg');
		for ($i=0; $i < count($delete) ; $i++) { 
			$this->db->where('id_pos', $delete[$i]);
			$this->db->delete('data_pos');
		}
	}
}?>