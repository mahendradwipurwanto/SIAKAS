<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<span class="fa fa-arrow-left"></span>
			<li><a href="<?php echo site_url('setting')?>"><strong>Pengaturan</strong></a></li>
			<li><a href="<?php echo site_url('setting/data_pengumuman')?>">Data Pengumuman</a></li>
			<li class="active">Buat Pengumuman</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="well well-small well-box">
			<h4><strong>Data Pengumuman</strong> </h4>
			<hr>
			<form action="<?php echo site_url('setting/tambah_pengumuman')?>" method="POST" class="form-horizontal">
					<div class="form-group">
						<span class="control-label col-sm-3">Judul Pengumuman <span class="text text-danger">*</span></span>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="subjek" required="required">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<span class="control-label col-sm-3">Tanggal Pengumuman <span class="text text-danger">*</span></span>
						<div class="col-sm-3">
							<input type="date" class="form-control" name="tanggal_pengumuman" required="required">
						</div>
						<div class="col-sm-1">
							<h4 class="text text-muted"><strong>s/d</strong></h4>
						</div>
						<div class="col-sm-3">
							<input type="date" class="form-control" name="tanggal_akhir" required="required">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<span class="control-label col-sm-3">Isi Pengumuman</span>
						<div class="col-sm-9">
							<textarea type="text" class="form-control" id="text-ckeditor" height="1000px" name="isi_pengumuman" required="required"></textarea>
							<script>CKEDITOR.replace('text-ckeditor');</script>
						</div>
					</div>
					<hr>
					<button type="submit" class="btn btn-primary pull-right">Buat Pengumuman</button>
					<br>
					<br>
			</form>
		</div>
	</div>
</div>