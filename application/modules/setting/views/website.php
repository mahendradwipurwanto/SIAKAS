<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<span class="fa fa-arrow-left"></span>
			<li><a href="<?php echo site_url('setting')?>"><strong>Pengaturan</strong></a></li>
			<li class="active">Website</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="panel-title text-muted"><strong>Pengaturan</strong></h5>
			</div>
			<div class="panel-body">
				<form action="<?php echo site_url('setting/update_website')?>" method="POST" class="form-horizontal">
					<div class="form-group">
						<span class="control-label col-sm-4">Nama Sekolah <span class="text text-danger">*</span></span>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_sekolah" value="<?php echo $nama_sekolah?>" required="required">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<span class="control-label col-sm-4">Alamat Sekolah <span class="text text-danger">*</span></span>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="alamat_sekolah" value="<?php echo $alamat_sekolah?>" required="required">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<span class="control-label col-sm-4">Jenjang Sekolah</span>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="jenjang" value="<?php echo $jenjang?>">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<span class="control-label col-sm-4">Telpon Sekolah</span>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="telp" value="<?php echo $telp?>">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<span class="control-label col-sm-4">Edit username siswa</span>
						<div class="col-sm-6">
							<?php
							if ($setting_user == 1) {
							?>
			                    <input type="radio" name="registrasi-siswa" value="1" checked="checked"> Tampilkan
			                    <input type="radio" name="registrasi-siswa" value="0" style="margin-left: 50px;"> Sembunyikan
							<?php } else{ ?>
			                    <input type="radio" name="registrasi-siswa" value="1"> Tampilkan
			                    <input type="radio" name="registrasi-siswa" value="0" checked="checked" style="margin-left: 50px;"> Sembunyikan
							<?php } ?>
						</div>
					</div>
					<hr>
					<button type="submit" class="btn btn-primary pull-right">Update Data Website</button>
				</form>
			</div>
		</div>
	</div>
</div>