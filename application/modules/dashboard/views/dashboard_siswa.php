<?php 
        $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );

?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="well well-small well-box">
	            <span class="text-muted">Selamat datang di <strong>SIAKAS | <?php echo $nama_sekolah;?></strong></span>
	            <br>
	            <h6 class="text-muted pull-right">Malang, <?php echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ?>, IP anda : <?php echo $ip;?></h6>
	            <br>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<div class="well well-small box-quick-link">
		                <a style="text-decoration: none;" href="<?php echo site_url('pembayaran/info_administrasi')?>">
		                    <div class="header">
		                        <div class="fa fa-info-circle fa-4x"></div>
		                    </div>
		                    <div class="content">Info Administrasi</div>
		                </a>
		            </div>
		            <br>
				</div>
				<div class="col-md-2">
					<div class="well well-small box-quick-link">
		                <a style="text-decoration: none;" href="<?php echo site_url('setting/list_pengumuman')?>">
		                    <div class="header">
		                        <div class="fa fa-bullhorn fa-4x"></div>
		                    </div>
		                    <div class="content">Pengumuman</div>
		                </a>
		            </div>
		            <br>
				</div>
				<div class="col-md-2">
					<div class="well well-small box-quick-link">
		                <a style="text-decoration: none;" href="<?php echo base_url(); ?>dashboard/tentang">
		                    <div class="header">
		                        <div class="fa fa-info-circle fa-4x"></div>
		                    </div>
		                    <div class="content">About</div>
		                </a>
		            </div>
		            <br>
				</div>
			</div>
		</div>
	</div>
