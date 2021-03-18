<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<span class="fa fa-arrow-left"></span>
			<li><a href="<?php echo site_url('setting')?>"><strong>Pengaturan</strong></a></li>
			<li class="active">Data Level</li>
		</ol>
	</div>
</div>
		<div class="row">
			<div class="col-md-12">
		        <div class="well well-small well-box">
		        	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">Tambah Data</button>
		        	<br>
		        	<br>
					<table id="table" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>User Level</th>
								<th>Keterangan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php $nomer=1; foreach ($data_level as $baris) { ;?>
							<tr>
								<td><?php echo $nomer ;?></td>
								<td><?php echo $baris->level ;?></td>
								<td><?php echo $baris->keterangan ;?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $nomer; ?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapus<?php echo $nomer; ?>"><i class="fa fa-eraser"></i></a></td>
							</tr>	
					</form>
						<!-- modal -->
							<div class="modal fade" id="edit<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
								<div class="modal-dialog">
							    	<div class="modal-content">
							    		<div class="modal-header modal-header-primary">
									        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									        <h4 class="modal-title" id="myModalLabel">Edit data dari <code class="text-success"><?php echo $baris->level; ?></code></h4>
							      		</div>
							      		<div class="modal-body">
									        <form action="<?php echo site_url('setting/update_level');?>" enctype="multipart/form-data" method="post">
								            	<input type="hidden" class="form-control" name="id_level" value="<?php echo $baris->id_level; ?>">
								            	<div class="form-group">
													<h6 for="nama">Level:</h6>
													<input type="text" class="form-control input-sm" name="level" value="<?php echo $baris->level?>">
												</div>
								            	<div class="form-group">
													<h6 for="nama">Keterangan:</h6>
													<textarea type="textarea" class="form-control input-sm" name="keterangan" ><?php echo $baris->keterangan?></textarea>
												</div>

									        	<div class="modal-footer">
									                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
									                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
									         	</div>
								        	</form>
							    		</div>
							    	</div>
								</div>
							</div>

							<div class="modal fade" id="hapus<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
								<div class="modal-dialog">
							    	<div class="modal-content">
							    		<div class="modal-header modal-header-danger">
									        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									        <h4 class="modal-title" id="myModalLabel">Hapus Data Jurusan</h4>
							      		</div>
							      		<div class="modal-body">
									        <form action="<?php echo site_url('setting/hapus_level');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
								            	<input type="hidden" class="form-control" name="id_level" value="<?php echo $baris->id_level; ?>">
								                   	<p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $baris->level; ?></code> ?</p>
									        	<div class="modal-footer">
									                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
									                <button type="submit" class="btn btn-danger">Hapus</button>
									         	</div>
								        	</form>
							    		</div>
							    	</div>
								</div>
							</div>
							<!-- modal -->

						<?php $nomer++; } ?>
						</tbody>
					</table>


							<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
								<div class="modal-dialog">
							    	<div class="modal-content">
							    		<div class="modal-header modal-header-primary">
									        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
							      		</div>
							      		<div class="modal-body">
									        <form action="<?php echo site_url('setting/tambah_level');?>" enctype="multipart/form-data" method="post">
								            	<div class="form-group">
													<h6 for="nama">Level:</h6>
													<input type="text" class="form-control input-sm" name="level" placeholder="Level">
												</div>
								            	<div class="form-group">
													<h6 for="nama">Keterangan:</h6>
													<textarea type="textarea" class="form-control input-sm" name="keterangan" ></textarea>
												</div>

									        	<div class="modal-footer">
									                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
									                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
									         	</div>
								        	</form>
							    		</div>
							    	</div>
								</div>
							</div>
				</div>
			</div>
		</div>
