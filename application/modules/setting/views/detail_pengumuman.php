<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<span class="fa fa-arrow-left"></span>
			<li><a href="<?php echo site_url('setting')?>"><strong>Pengaturan</strong></a></li>
			<li><a href="<?php echo site_url('setting/data_pengumuman')?>">Data Pengumuman</a></li>
			<li class="active">Detail Pengumuman</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="well well-small well-box">
				<h5><strong>Data Pengumuman</strong> </h5>
				<hr>
			<?php foreach ($data_pengumuman as $data) { ;?>
				<p><strong><?php echo $data->subjek ?></strong>
					<button type="button" class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#hapus"><i class="fa fa-eraser fa-lg"></i></button>  
					<a href="<?php echo base_url()?>setting/edit_pengumuman/<?php echo $data->id_pengumuman?>" class="btn btn-default btn-sm pull-right"> <i class="fa fa-pencil fa-lg"></i></a>  
				</p>
				<h6><strong>Pembuat :</strong> <span class="text text-primary"><?php echo $data->username ?></span> <strong>Tgl. Pengumuman :</strong> <?php echo $data->tanggal_pengumuman ?>
					<hr>
					<h5 class="text text-muted"><?php echo $data->isi_pengumuman ?></h5>

					<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
						<div class="modal-dialog">
					    	<div class="modal-content">
					    		<div class="modal-header modal-header-danger">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel">Hapus Pengumuman</h4>
					      		</div>
					      		<div class="modal-body">
							        <form action="<?php echo site_url('setting/hapus_pengumuman');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
						            	<input type="hidden" class="form-control" name="id_pengumuman" value="<?php echo $data->id_pengumuman; ?>">
					                   	<p>Apakah anda yakin akan menghapus Pengumuman : <code class="text-danger"><?php echo $data->subjek; ?></code> ?</p>
					
							        	<div class="modal-footer">
							                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							                <button type="submit" class="btn btn-danger">Hapus</button>
							         	</div>
						        	</form>
					    		</div>
					    	</div>
						</div>
					</div>
			<?php }?>
		</div>
	</div>
</div>