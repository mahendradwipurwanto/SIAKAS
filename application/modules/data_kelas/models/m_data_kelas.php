<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_kelas extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function hitung_kelas(){
		$sql = "SELECT count(*) as total FROM data_kelas";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function hitung_kelas_t(){
		$sql = "SELECT count(*) as total FROM data_kelas WHERE id_jurusan = '1'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function hitung_kelas_r(){
		$sql = "SELECT count(*) as total FROM data_kelas WHERE id_jurusan = '2'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
 
 	function hitung_kelas_m(){
		$sql = "SELECT count(*) as total FROM data_kelas WHERE id_jurusan = '3'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function data_kelas(){
		$sql = "SELECT *,data_kelas.keterangan as keterangan, data_jurusan.keterangan as ket, data_tingkat.keterangan as ket2, data_tahunajaran.keterangan as ket3 FROM data_kelas
				LEFT JOIN data_jurusan ON
				data_kelas.id_jurusan = data_jurusan.id_jurusan
				LEFT JOIN data_tingkat ON
				data_kelas.id_tingkat = data_tingkat.id_tingkat
				LEFT JOIN data_tahunajaran ON
				data_kelas.id_ta = data_tahunajaran.id_ta
				ORDER BY data_kelas.id_kelas ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_jurusan(){
		$sql = "SELECT * FROM data_jurusan
				ORDER BY data_jurusan.id_jurusan DESC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_tingkat(){
		$sql = "SELECT * FROM data_tingkat
				ORDER BY data_tingkat.id_tingkat DESC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function data_tahunajaran(){
		$sql = "SELECT * FROM data_tahunajaran
				ORDER BY data_tahunajaran.id_ta DESC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data(){
	
		$nama_kelas = $this->input->post('nama_kelas');
		$id_jurusan = $this->input->post('id_jurusan');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'nama_kelas' => $nama_kelas,
			'id_jurusan' => $id_jurusan,
			'keterangan' => $keterangan,
			);

		$this->db->insert('data_kelas',$data);
	}

	function edit_data(){
		
		$id_kelas = $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
		$id_jurusan = $this->input->post('id_jurusan');
		$keterangan = $this->input->post('keterangan');

		$data = array (
			'id_kelas' => $id_kelas,
			'nama_kelas' => $nama_kelas,
			'id_jurusan' => $id_jurusan,
			'keterangan' => $keterangan,
			);

		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('data_kelas', $data);
	}

	function hapus_data() {
		$id_kelas = $this->input->post('id_kelas');
		$this->db->where('id_kelas', $id_kelas);
		$this->db->delete('data_kelas');

		$this->db->where('kelas', $id_kelas);
		$this->db->delete('data_siswa');
	}

	function hapus_data_all() {
			$delete = $this->input->post('msg');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_kelas', $delete[$i]);
				$this->db->delete('data_kelas');

				$this->db->where('kelas', $delete[$i]);
				$this->db->delete('data_siswa');
			}
	}

	function import_data(){

        $fileName = time().$_FILES['file']['name'];
         
		$id_ta 		= $this->input->post('id_ta');
		$id_tingkat = $this->input->post('id_tingkat');
		$id_jurusan = $this->input->post('id_jurusan');

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
             
            for ($row = 5; $row <= $highestRow; $row++){                  //  <- memilih row tempat data berada                
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database 0, no kolom                                
                 $data = array(
                    "nama_kelas"	=> $rowData[0][2],
                    "keterangan"	=> $rowData[0][3],
                    "id_ta"			=> $id_ta,
                    "id_tingkat"	=> $id_tingkat,
                    "id_jurusan"	=> $id_jurusan
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("data_kelas",$data);
                     
            }
    }

}?>