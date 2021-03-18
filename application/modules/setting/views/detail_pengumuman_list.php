
<div class="row">
	<div class="col-md-12">
		<div class="well well-small well-box">
				<h5><strong>Data Pengumuman</strong> </h5>
				<hr>
			<?php foreach ($data_pengumuman as $data) { ;?>
				<p><strong><?php echo $data->subjek ?></strong></p>
				<h6><strong>Pembuat :</strong> <span class="text text-primary"><?php echo $data->username ?></span> <strong>Tgl. Pengumuman :</strong> <?php echo $data->tanggal_pengumuman ?>
					<hr>
					<h5 class="text text-muted"><?php echo $data->isi_pengumuman ?></h5>
			<?php }?>
		</div>
	</div>
</div>