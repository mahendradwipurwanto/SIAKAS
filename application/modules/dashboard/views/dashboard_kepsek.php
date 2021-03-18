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
	            <span class="text-muted">Selamat datang di <strong>SIAKAS - Sistem Informasi Administrasi Sekolah | <?php echo $nama_sekolah;?></strong></span>
	            <h6 class="text-muted pull-right">Malang, <?php echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ?>, IP anda : <?php echo $ip;?></h6>
	            <br>
	            <span class="text-muted"><i class="fa fa-map-marker"></i> Alamat: <?php echo $alamat_sekolah;?>  Telpon: <?php echo $telp;?></span>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>Laporan</h4>
			<div class="row">
				<div class="col-md-2">
					<div class="well well-small box-quick-link">
		                <a style="text-decoration: none;" href="<?php echo site_url('laporan')?>">
		                    <div class="header">
		                        <div class="fa fa-refresh fa-4x"></div>
		                    </div>
		                    <div class="content">Hari Ini</div>
		                </a>
		            </div>
		            <br>
				</div>
				<div class="col-md-2">
					<div class="well well-small box-quick-link">
		                <a style="text-decoration: none;" href="<?php echo site_url('laporan/bulan')?>">
		                    <div class="header">
		                        <div class="fa fa-newspaper-o fa-4x"></div>
		                    </div>
		                    <div class="content">Bulan Ini</div>
		                </a>
		            </div>
		            <br>
				</div>
				<div class="col-md-2">
					<div class="well well-small box-quick-link">
		                <a style="text-decoration: none;" href="<?php echo site_url('laporan/tanggal')?>">
		                    <div class="header">
		                        <div class="fa fa-calendar fa-4x"></div>
		                    </div>
		                    <div class="content">Tanggal</div>
		                </a>
		            </div>
		            <br>
				</div>
				<div class="col-md-2">
					<div class="well well-small box-quick-link">
		                <a style="text-decoration: none;" href="<?php echo site_url('setting/data_pengumuman')?>">
		                    <div class="header">
		                        <div class="fa fa-bullhorn fa-4x"></div>
		                    </div>
		                    <div class="content">Pengumuman</div>
		                </a>
		            </div>
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
	            </div>
			</div>
	</div>
</div>
