<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_guru extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function hitung_guru(){
		$sql = "SELECT count(*) as total FROM data_guru";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function data_guru(){
		$sql = "SELECT * FROM data_guru
				ORDER BY data_guru.id_guru ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function fetch_data(){
		$this->db->select('*');
	     $query = $this->db->get('data_guru');
	     return $query->result_array();
	}

	function tambah_data(){
		
		$nip = $this->input->post('nip');
		$nama_guru = $this->input->post('nama_guru');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');

		$data = array (
			'nip' => $nip,
			'nama_guru' => $nama_guru,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			);

		$this->db->insert('data_guru',$data);
	}

	function edit_data(){
		
		$id_guru = $this->input->post('id_guru');
		$nip = $this->input->post('nip');
		$nama_guru = $this->input->post('nama_guru');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');

		$data = array (
			'id_guru' => $id_guru,
			'nip' => $nip,
			'nama_guru' => $nama_guru,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			);

		$this->db->where('id_guru', $id_guru);
		$this->db->update('data_guru', $data);
	}

	function hapus_data() {
		$id_guru = $this->input->post('id_guru');
		$this->db->where('id_guru', $id_guru);
		$this->db->delete('data_guru');
	}

	function hapus_data_all() {
		$delete = $this->input->post('msg');
		for ($i=0; $i < count($delete) ; $i++) { 
			$this->db->where('id_guru', $delete[$i]);
			$this->db->delete('data_guru');
		}
	}

	function import_data(){
        $fileName = time().$_FILES['file']['name'];
         
        $config['upload_path'] = './assets/backend/excel/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        $inputFileName = './assets/backend/excel/'.$media['file_name'];
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 5; $row <= $highestRow; $row++){ //  <- memilih row tempat data berada                
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null,true,true);
                                                 
                //Sesuaikan sama nama kolom tabel di database 0, no kolom                                
                 $data = array(
                    "nip"		=> $rowData[0][2],
                    "nama_guru"	=> $rowData[0][3],
                    "alamat"	=> $rowData[0][4],
                    "no_telp"	=> $rowData[0][5]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("data_guru",$data);
                     
            }
    }

}?>