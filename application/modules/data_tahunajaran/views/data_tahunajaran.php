<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Data Tahun Ajaran</strong></h3>
			</div>
			<div class="panel-body">
				<div class="col-md-8">
					<table width="100%" class="table table-striped table-bordered">
						<tr>
							<th width="30%" style="background-color: #BDE7FC;">Media</th>
							<td width="70%">
							<a href="<?php echo site_url('printer/cetak_tahunajaran');?>" target="_blank" class="btn btn-warning btn-sm">Print Data</a></td>
						</tr>
						<tr>
							<th width="30%" style="background-color: #BDE7FC;">Aksi</th>
							<td width="70%"> <button type="button" class="btn btn-info btn-sm" onClick="window.location.reload()">Refresh</button> <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">Tambah Data</button> 
							<button type="button" data-toggle="modal" data-target="#semua" class="btn btn-danger btn-sm">Hapus Data Terpilih</button> </td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-body bg-info">
							<span class="pull-left"><i class="fa fa-calendar fa-3x"></i></span>
							<span class="pull-right"><div class="huge-2x text-right"><?php echo $hitung; ?></div> Data Tahun Ajaran</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
						<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
							<div class="modal-dialog">
						    	<div class="modal-content">
						    		<div class="modal-header modal-header-primary">
								        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
						      		</div>
						      		<div class="modal-body">
								        <form action="<?php echo site_url('data_tahunajaran/tambah_data');?>" enctype="multipart/form-data" method="post">
							            	
							            	<div class="form-group">
												<h6 for="nama">Tahun Ajaran:</h6>
												<input type="text" class="form-control input-sm" name="nama_ta" placeholder="Nama Tahun Ajaran">
											</div>
											<div class="form-group">
												<h6 for="nama">Status Kelulusan:</h6>
												<select name="status_kelulusan" class="form-control">
													<option value="Lulus">Lulus</option>
													<option value="Aktif">Aktif</option>
												</select>
											</div>
											<div class="form-group">
												<h6 for="nama">Keterangan:</h6>
												<textarea type="text" class="form-control input-sm" name="keterangan"></textarea>
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

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
		  <div class="panel-heading"> </div>
		  <div class="panel-body">
		  			<form action="<?php echo site_url('data_tahunajaran/hapus_data_all'); ?>" method="post" enctype="multipart/form-data" >
		   				<div class="modal fade" id="semua" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
							<div class="modal-dialog">
						    	<div class="modal-content">
						    		<div class="modal-header modal-header-danger">
								        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								        <h4 class="modal-title" id="myModalLabel">Hapus Data Yang Dipilih</h4>
						      		</div>
						      		<div class="modal-body">
							                   	<p>Apakah anda yakin akan menghapus data yang terpilih ?</p>
								        	<div class="modal-footer">
								                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								                <button type="submit" class="btn btn-danger">Hapus</button>
								         	</div>
						    		</div>
						    	</div>
							</div>
						</div>
		   			<table id="table" class="table table-striped table-bordered">  
						<thead>
							<tr>
								<th><input type="checkbox" id="checkAll" name="checkAll"></th>
								<th>No</th>
								<th>Tahun Ajaran</th>
								<th>Status Kelulusan</th>
								<th>Keterangan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php $nomer=1; foreach ($data_tahunajaran as $baris) { ;?>
							<tr>
								<td><input type="checkbox" name="msg[]" value="<?php echo $baris->id_ta; ?>"></td>
								<td><?php echo $nomer ;?></td>
								<td><?php echo $baris->nama_ta ;?></td>
								<td><?php echo $baris->status_kelulusan ;?></td>
								<td><?php echo $baris->keterangan ;?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $nomer; ?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapus<?php echo $nomer; ?>"><i class="fa fa-eraser"></i></a></td>
							</tr>	
					</form>

							<div class="modal fade" id="edit<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
								<div class="modal-dialog">
							    	<div class="modal-content">
							    		<div class="modal-header modal-header-primary">
									        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									        <h4 class="modal-title" id="myModalLabel">Edit data dari <code class="text-success"><?php echo $baris->nama_ta; ?></code></h4>
							      		</div>
							      		<div class="modal-body">
									        <form action="<?php echo site_url('data_tahunajaran/edit_data');?>" enctype="multipart/form-data" method="post">
								            	<input type="hidden" class="form-control" name="id_ta" value="<?php echo $baris->id_ta; ?>">
												<div class="form-group">
													<h6 for="nama">Tahun Ajaran:</h6>
													<input type="text" class="form-control input-sm" name="nama_ta" value="<?php echo $baris->nama_ta;?>">
												</div>
												<div class="form-group">
													<h6 for="nama">Status Kelulusan:</h6>
													<select name="status_kelulusan" class="form-control">
														<option value="<?php echo $baris->status_kelulusan;?>"><?php echo $baris->status_kelulusan;?></option>
														<option value="Lulus">Lulus</option>
														<option value="Aktif">Aktif</option>
													</select>
												</div>
												<div class="form-group">
													<h6 for="nama">Keterangan:</h6>
													<textarea type="text" class="form-control input-sm" name="keterangan"><?php echo $baris->keterangan;?></textarea>
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
									        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
							      		</div>
							      		<div class="modal-body">
									        <form action="<?php echo site_url('data_tahunajaran/hapus_data');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
								            	<input type="hidden" class="form-control" name="id_ta" value="<?php echo $baris->id_ta; ?>">
								                   	<p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $baris->nama_ta; ?></code> ?</p>
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
		  </div>	
		</div>
	</div>
</div>


						<!-- modal -->

						

						<!-- modal -->

	<script type="text/javascript">
		$(document).ready(function() {
			$("input[name='checkAll']").click(function() {
				var checked = $(this).attr("checked");
				$("#table tr td input:checkbox").attr("checked", checked);
			});
		});
		$("#checkAll").click(function(){
		    $('input:checkbox').not(this).prop('checked', this.checked);
		});
	</script>