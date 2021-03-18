<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Pembayaran extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');
			$this->load->model('M_pembayaran');					
	}
	
	function index(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
						$nis					  = '000';

						$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
						$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
						$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
						$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
					$data['module'] = "pembayaran";
					$data['fileview'] = "pembayaran";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

						$nis					  = '000';

						$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
						$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
						$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
						$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
					$data['module'] = "pembayaran";
					$data['fileview'] = "pembayaran_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}
	
	function nama_siswa(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
						$nis					  = '000';

						$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
						$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
						$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
						$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
					$data['module'] = "pembayaran";
					$data['fileview'] = "pencarian_nis";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

						$nis					  = '000';

						$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
						$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
						$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
						$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
					$data['module'] = "pembayaran";
					$data['fileview'] = "pencarian_nis_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}		
		}

	function tahun()
    {		
        $id_ta = $this->input->post('id_ta');
        $data['data_kelas'] = $this->M_pembayaran->data_kelas($id_ta);
        $this->load->view('kelas',$data);
    }
	
	function kelas()
    {		
        $id_kelas = $this->input->post('id_kelas');
        $data['data_siswa'] = $this->M_pembayaran->data_siswa($id_kelas);
        $this->load->view('nama',$data);
    }

    function tampil(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
					
					$this->session->set_userdata('nis', $this->input->post('nis'));
					$nis = $this->session->userdata('nis');

							$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
							$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
							$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
							$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
							$data['data_riwayat'] = $this->M_pembayaran->data_riwayat($nis);
					
						$data['module'] = "pembayaran";
						$data['fileview'] = "pembayaran";
						echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$this->session->set_userdata('nis', $this->input->post('nis'));
					$nis = $this->session->userdata('nis');

							$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
							$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
							$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
							$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
							$data['data_riwayat'] = $this->M_pembayaran->data_riwayat($nis);
					
						$data['module'] = "pembayaran";
						$data['fileview'] = "pembayaran_bendahara";
						echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

    function tampil_2(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
					
					$this->session->set_userdata('nis', $this->input->post('nis'));
					$nis = $this->session->userdata('nis');

							$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
							$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
							$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
							$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
							$data['data_riwayat'] = $this->M_pembayaran->data_riwayat($nis);
					
						$data['module'] = "pembayaran";
						$data['fileview'] = "pencarian_nis";
						echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$this->session->set_userdata('nis', $this->input->post('nis'));
					$nis = $this->session->userdata('nis');

							$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
							$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
							$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
							$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
							$data['data_riwayat'] = $this->M_pembayaran->data_riwayat($nis);
					
						$data['module'] = "pembayaran";
						$data['fileview'] = "pencarian_nis_bendahara";
						echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

    function tampil_tambah($idnya){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login

					$nis = $this->session->userdata('nis');

							$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
							$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
							$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
							$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
							$data['data_riwayat'] = $this->M_pembayaran->data_riwayat($nis);
					
						$data['module'] = "pembayaran";
						$data['fileview'] = "pembayaran";
						echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

					$nis = $this->session->userdata('nis');

							$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
							$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
							$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
							$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
							$data['data_riwayat'] = $this->M_pembayaran->data_riwayat($nis);
					
						$data['module'] = "pembayaran";
						$data['fileview'] = "pembayaran_bendahara";
						echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

    function bulanan(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
			    		$nis = $this->input->post('nis');

						$data['data_pembayaran'] 	= $this->M_pembayaran->data_pembayar($nis);
						$data['data_pilih'] 	= $this->M_pembayaran->data_pilih($nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "bayar_bulan";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

			    		$nis = $this->input->post('nis');

						$data['data_pembayaran'] 	= $this->M_pembayaran->data_pembayar($nis);
						$data['data_pilih'] 	= $this->M_pembayaran->data_pilih($nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "bayar_bulan_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

    function bebas(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
			    		$nis = $this->input->post('nis');
			    		
						$data['data_pembayaran'] 	= $this->M_pembayaran->data_pembayar($nis);
						$data['data_bebas'] 	= $this->M_pembayaran->data_bebas($nis);
						$data['data_pilih_bebas'] 	= $this->M_pembayaran->data_pilih_bebas($nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "bayar_bebas";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {

			    		$nis = $this->input->post('nis');
			    		
						$data['data_pembayaran'] 	= $this->M_pembayaran->data_pembayar($nis);
						$data['data_bebas'] 	= $this->M_pembayaran->data_bebas($nis);
						$data['data_pilih_bebas'] 	= $this->M_pembayaran->data_pilih_bebas($nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "bayar_bebas_bendahara";
					echo Modules::run('template/template_bendaharabaru', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
	}

	function turun()
    {		
        $id_tarif 		= $this->input->post('id_tarif');
        $data['data_bayar'] = $this->M_pembayaran->data_bayar($id_tarif);
        $this->load->view('bayar',$data);
    }

	function tambah_transaksi(){
		$this->M_pembayaran->tambah_transaksi();
		$this->session->set_userdata('nis', $this->input->post('nis'));
		redirect('pembayaran/tampil_tambah/0');
	}

    function info_administrasi(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis     = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='user'){
				//user sudah login

							$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
							$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
							$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
							$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);
							$data['data_riwayat'] = $this->M_pembayaran->data_riwayat($nis);
					
						$data['module'] = "pembayaran";
						$data['fileview'] = "info";
						echo Modules::run('template/template_user', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

    function detail_bulan($id_tarif){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis     = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='user'){
				//user sudah login

						$data['data_bulanan'] = $this->M_pembayaran->data_bulanan2($id_tarif, $nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "detail_bulan";
					echo Modules::run('template/template_user', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

    function detail_bebas($id_tarif){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis     = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='user'){
				//user sudah login

						$data['data_bebas'] = $this->M_pembayaran->data_bebas2($id_tarif, $nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "detail_bebas";
					echo Modules::run('template/template_user', $data);

				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

    function pembayaran_nis(){
	$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$nis     = $session['session_nis'];
			$level   = $session['session_level'];
			$password   = $session['session_password'];
				//user sudah login
				if ($id_user && $level=='admin'){
				//user sudah login
						$nis					  = '000';

						$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
						$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
						$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
						$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "pembayaran_nis";
					echo Modules::run('template/template_admin', $data);

				}elseif ($id_user && $level=='bendahara') {
				//user sudah login
						$nis					  = '000';

						$data['data_tahunajaran'] = $this->M_pembayaran->data_tahunajaran();
						$data['data_pembayar'] = $this->M_pembayaran->data_pembayar($nis);
						$data['data_bulanan'] = $this->M_pembayaran->data_bulanan($nis);
						$data['data_bebas'] = $this->M_pembayaran->data_bebas($nis);

					$data['module'] = "pembayaran";
					$data['fileview'] = "pembayaran_nis";
					echo Modules::run('template/template_bendaharabaru', $data);
				}
				else {
	 			$data['module']   = "login";
	            $data['fileview'] = "login";
				echo Modules::run('template/template_login', $data);
				}
			}
		}

	function search(){
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('data_siswa')->like('nama',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama,
				'nis'	=>$row->nis,
				'jk'	=>$row->jk

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}


	function cari_siswa(){
		$this->M_pengeluaran->cari_siswa();
		redirect('pembayaran_nis');
	}



}