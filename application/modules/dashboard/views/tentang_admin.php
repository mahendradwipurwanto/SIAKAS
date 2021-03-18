<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<li><a href="#" onclick="history.back(-1)"><strong><i class="fa fa-arrow-left"></i> Beranda</strong></a></li>
			<li class="active">Tentang Aplikasi</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="well well-small well-box">
			<table class="table" width="100%">
				<tr>
					<td><img src="<?php echo base_url()?>assets/backend/images/logo-new.png" width="260" height="85" class="thumbnail"></td>
					<td>
						<p class="content-group" align="justify">SIAKAS adalah versi awal dari aplikasi web Sistem Administrasi Keuangan Sekolah, yang bertujuan membuat mempermudah proses administrasi keuangan sekolah. Masih banyak kekurangan dalam aplikasi ini dan masih akan tetap terus diperbaiki.</p>

					    <ul class="list content-group">
					    	<li><span class="text-semibold">Developers:</span> <a href="#">Mahendra Dwi Purwanto</a></li>
					        <li><span class="text-semibold">Kelas:</span> XII RPL C</li>
					    </ul>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<?php foreach ($tentang_admin as $data) { ?>
						<span  class="text-muted"><b class="text text-info">Update Versi - <?php echo $data->update_versi;?></b> | Date Update - <?php echo $data->tanggal_update;?></span>
						<hr>
						<b>Content : </b>
						<p><?php echo $data->keterangan;?></p>
						<?php }?>
					</td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
			</table>
		</div>
	</div>
</div>