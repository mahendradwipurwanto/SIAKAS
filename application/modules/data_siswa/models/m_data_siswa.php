<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_siswa extends CI_Model {
	function __construct(){
		parent::__construct();
	}
 
 	function hitung_siswa($id_kelas){
		$sql = "SELECT count(*) as total FROM data_siswa WHERE kelas = '$id_kelas'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function data_jurusan(){
		$sql = "SELECT * FROM data_jurusan
				ORDER BY data_jurusan.id_jurusan ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}
	
	function data_kelas($id_jurusan){
		$sql = "SELECT * FROM data_kelas
				WHERE id_jurusan='$id_jurusan'";
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
		$sql = "SELECT * FROM data_kelas";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function data_siswa($id_kelas){
		$sql = "SELECT * FROM data_siswa
				LEFT JOIN data_kelas ON
				data_siswa.kelas = data_kelas.id_kelas
				WHERE data_siswa.kelas = '$id_kelas'
				ORDER BY data_siswa.nis ASC ";
			   $query = $this->db->query($sql);

			return $query->result();
	}

	function tambah_data(){
		
		$nis			= $this->input->post('nis');
		$nama 			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$jk 			= $this->input->post('jk');
		$id_kelas		= $this->input->post('id_kelas');
		$tempat_lahir 	= $this->input->post('tempat_lahir');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$agama 			= $this->input->post('agama');
		$no_telp 		= $this->input->post('no_telp');
		$nama_wali 		= $this->input->post('nama_wali');
		$alamat_wali 	= $this->input->post('alamat_wali');
		$pekerjaan 		= $this->input->post('pekerjaan');
		$no_telp_ortu 	= $this->input->post('no_telp_ortu');

		$data = array (
			'nis' 			=> $nis,
			'nama' 			=> $nama,
			'alamat' 		=> $alamat,
			'jk' 			=> $jk,
			'kelas' 		=> $id_kelas,
			'tempat_lahir' 	=> $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'agama' 		=> $agama,
			'no_telp' 		=> $no_telp,
			'nama_wali' 	=> $nama_wali,
			'alamat_wali' 	=> $alamat_wali,
			'pekerjaan' 	=> $pekerjaan,
			'no_telp_ortu' 	=> $no_telp_ortu,
			);

		$this->db->insert('data_siswa',$data);
	}

	function edit_data(){
		
		$nis			= $this->input->post('nis');
		$nama 			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$jk 			= $this->input->post('jk');
		$id_kelas		= $this->input->post('id_kelas');
		$tempat_lahir 	= $this->input->post('tempat_lahir');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$agama 			= $this->input->post('agama');
		$no_telp 		= $this->input->post('no_telp');
		$nama_wali 		= $this->input->post('nama_wali');
		$alamat_wali 	= $this->input->post('alamat_wali');
		$pekerjaan 		= $this->input->post('pekerjaan');
		$no_telp_ortu 	= $this->input->post('no_telp_ortu');
		$data = array (
			'nis' 			=> $nis,
			'nama' 			=> $nama,
			'alamat' 		=> $alamat,
			'jk' 			=> $jk,
			'kelas' 		=> $id_kelas,
			'tempat_lahir' 	=> $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'agama' 		=> $agama,
			'no_telp' 		=> $no_telp,
			'nama_wali' 	=> $nama_wali,
			'alamat_wali' 	=> $alamat_wali,
			'pekerjaan' 	=> $pekerjaan,
			'no_telp_ortu' 	=> $no_telp_ortu,
			);

		$this->db->where('nis', $nis);
		$this->db->update('data_siswa', $data);
	}

	function hapus_data() {
		$nis = $this->input->post('nis');
		$this->db->where('nis', $nis);
		$this->db->delete('data_siswa');
	}

	function hapus_data_all() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('msg');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('nis', $delete[$i]);
				$this->db->delete('data_siswa');
			}
		}
	}

	function import_data($id_kelas){

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
             
            for ($row = 5; $row <= $highestRow; $row++){                  //  <- memilih row tempat data berada                
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database 0, no kolom                                
                 $data = array(
                    "nis"			=> $rowData[0][2],
                    "nama"			=> $rowData[0][3],
                    "alamat"		=> $rowData[0][4],
                    "jk"			=> $rowData[0][5],
                    "tempat_lahir"	=> $rowData[0][6],
                    "tanggal_lahir"	=> $rowData[0][7],
                    "agama"			=> $rowData[0][8],
                    "no_telp"		=> $rowData[0][9],
                    "kelas"			=> $id_kelas,
                    "nama_wali"		=> $rowData[0][10],
                    "alamat_wali"	=> $rowData[0][11],
                    "pekerjaan"		=> $rowData[0][12],
                    "no_telp_ortu"	=> $rowData[0][13]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("data_siswa",$data);
                     
            }
    }

}?>