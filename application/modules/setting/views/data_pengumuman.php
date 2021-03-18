
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<li><a href="#" onclick="history.back(-1)"><strong><i class="fa fa-arrow-left"></i> Pengaturan</strong></a></li>
			<li class="active">Data Pengumuman</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="well well-small well-box">
			<h4><strong>Data Pengumuman</strong> </h4><a href="<?php echo site_url('setting/buat_pengumuman')?>" class="btn btn-primary pull-right" style="margin-top: -35px">Buat Pengumuman</a>
			<hr>
			<table id="table-scroll" class="table table-bordered table-condensed" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Tgl. Tampil</th>
						<th>Tgl. Tutup</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomer=1; foreach ($data_pengumuman as $data) { ;?>
					<tr>
						<td><?php echo $nomer ?></td>
						<td><?php echo $data->subjek ?></td>
						<td><?php echo $data->tanggal_pengumuman ?></td>
						<td><?php echo $data->tanggal_akhir ?></td>
						<td>
							<a href="<?php echo base_url()?>setting/detail_pengumuman/<?php echo $data->id_pengumuman?>" class="btn btn-default btn-xs"> <i class="fa fa-search-plus"></i></a>
							<a href="<?php echo base_url()?>setting/edit_pengumuman/<?php echo $data->id_pengumuman?>" class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i></a>
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $nomer;?>"><i class="fa fa-eraser"></i></button>
						</td>
					</tr>

					<div class="modal fade" id="hapus<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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

					<?php $nomer++;}?>
				</tbody>
			</table>
		</div>
	</div>
</div>