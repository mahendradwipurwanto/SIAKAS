<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Data Kelas</strong></h3>
			</div>
			<div class="panel-body">
				<div class="col-md-8">
					<table width="100%" class="table table-striped table-bordered">
						<tr>
							<th width="30%" style="background-color: #BDE7FC;">Media</th>
							<td width="70%"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#import">Import</button> 
								<a href="<?php echo site_url('printer/cetak_guru');?>" target="_blank" class="btn btn-warning btn-sm">Print Data</a></td>
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
							<span class="pull-left"><i class="fa fa-id-badge fa-3x"></i></span>
							<div class="huge-2x text-right"><?php echo $hitung_kelas; ?> Kelas</div>
							<span class="pull-left"> Detail</span><span class="pull-right"> Data Jurusan</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal -->

						<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
							<div class="modal-dialog">
						    	<div class="modal-content">
						    		<div class="modal-header modal-header-primary">
								        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
						      		</div>
						      		<div class="modal-body">
								        <form action="<?php echo site_url('data_kelas/tambah_data');?>" enctype="multipart/form-data" method="post">
							            	
							            	<div class="form-group">
												<h6>Nama Kelas:</h6>
												<input type="text" class="form-control input-sm" name="nama_kelas" placeholder="Nama Kelas">
											</div>
											<div class="form-group">
												<h6>Jurusan:</h6>
												<select name="id_jurusan" class="form-control input-xs">
														<option value="0">Pilih Jurusan</option>
						                        	<?php foreach ($data_jurusan as $baris2) { ?>
			                                    		<option value="<?php echo $baris2->id_jurusan;?>"><?php echo $baris2->nama_jurusan;?></option>
			                                    	<?php }?>
							                    </select>

											</div>
												<div class="form-group">
													<h6>Tingkat Kelas</h6>
													<select name="id_ta" class="form-control input-xs" required="required">
														<?php foreach ($data_tingkat as $baris6) { ?>
				                                    		<option value="<?php echo $baris6->id_tingkat;?>"><?php echo $baris6->nama_tingkat;?></option>
				                                    	<?php }?>
													</select>
												</div>
												<div class="form-group">
													<h6>Tahun Ajaran</h6>
													<select name="id_ta" class="form-control input-xs" required="required">
														<?php foreach ($data_tahunajaran as $baris7) { ?>
				                                    		<option value="<?php echo $baris7->id_ta;?>"><?php echo $baris7->nama_ta;?></option>
				                                    	<?php }?>
													</select>
												</div>
											<div class="form-group">
												<h6>Keterangan:</h6>
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

						<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
							<div class="modal-dialog">
						    	<div class="modal-content">
						    		<div class="modal-header modal-header-success">
								        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								        <h4 class="modal-title" id="myModalLabel">Import Data</h4>
						      		</div>
						      		<div class="modal-body">
								        <form action="<?php echo site_url('data_kelas/import_data');?>" enctype="multipart/form-data" method="post">
								            	<div class="form-group">
												<h6 for="nama">Pilih File Excel: <span  id="images" style="display:none;"><img src="<?php echo base_url();?>ajax-loader.gif"> harap tunggu...</span></h6>
													<input type="file" class="form-control input-sm" name="file" autofocus="autofocus" required="required">
												</div>

												<div class="form-group">
													<h6>Jurusan:</h6>
													<select name="id_jurusan" class="form-control input-xs" required="required">
															<option value="0">Pilih Jurusan</option>
							                        	<?php foreach ($data_jurusan as $baris3) { ?>
				                                    		<option value="<?php echo $baris3->id_jurusan;?>"><?php echo $baris3->nama_jurusan;?></option>
				                                    	<?php }?>
								                    </select>
												</div>
												<div class="form-group">
													<h6>Tingkat Kelas</h6>
													<select name="id_tingkat" class="form-control input-xs" required="required">
														<?php foreach ($data_tingkat as $baris4) { ?>
				                                    		<option value="<?php echo $baris4->id_tingkat;?>"><?php echo $baris4->nama_tingkat;?></option>
				                                    	<?php }?>
													</select>
												</div>
												<div class="form-group">
													<h6>Tahun Ajaran</h6>
													<select name="id_ta" class="form-control input-xs" required="required">
														<?php foreach ($data_tahunajaran as $baris5) { ?>
				                                    		<option value="<?php echo $baris5->id_ta;?>"><?php echo $baris5->nama_ta;?></option>
				                                    	<?php }?>
													</select>
												</div>
								        	<div class="modal-footer">
								        		<p class="pull-left">Contoh Format File Excel <a href="<?php echo base_url();?>/assets/backend/excel/contoh-format-kelas.xlsx"><code class="text-success">Format Import Excel</code></a></p>
								                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								                <button type="submit" name="import" class="btn btn-success">Import Data</button>
								         	</div>
							        	</form>
						    		</div>
						    	</div>
							</div>
						</div>


						<!-- modal -->


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
		  <div class="panel-heading"></div>
		  <div class="panel-body">
					<form action="<?php echo site_url('data_kelas/hapus_data_all'); ?>" method="post" enctype="multipart/form-data" >
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
								<th>Nama Kelas</th>
								<th>Nama Jurusan</th>
								<th>Tingkatan</th>
								<th>Keterangan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php $nomer=1; foreach ($data_kelas as $baris) { ;?>
							<tr>
								<td><input type="checkbox" name="msg[]" value="<?php echo $baris->id_kelas; ?>"></td>
								<td><?php echo $nomer ;?></td>
								<td><?php echo $baris->nama_kelas ;?></td>
								<td><?php echo $baris->nama_jurusan ;?></td>
								<td><?php echo $baris->nama_tingkat ;?></td>
								<td><?php echo $baris->keterangan ;?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $nomer; ?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapus<?php echo $nomer; ?>"><i class="fa fa-eraser"></i></a></td>
							</tr>	
					</form>
							<div class="modal fade" id="edit<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
								<div class="modal-dialog">
							    	<div class="modal-content">
							    		<div class="modal-header modal-header-primary">
									        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									        <h4 class="modal-title" id="myModalLabel">Edit data dari <code class="text-success"><?php echo $baris->nama_kelas; ?></code></h4>
							      		</div>
							      		<div class="modal-body">
									        <form action="<?php echo site_url('data_kelas/edit_data');?>" enctype="multipart/form-data" method="post">
								            	<input type="hidden" class="form-control" name="id_kelas" value="<?php echo $baris->id_kelas; ?>">
												<div class="form-group">
													<h6>Nama kelas:</h6>
													<input type="text" class="form-control input-sm" name="nama_kelas" value="<?php echo $baris->nama_kelas ;?>">
												</div>
												<div class="form-group">
													<h6>Jurusan:</h6>
													<select name="id_jurusan" class="form-control input-xs">
															<option value="<?php echo $baris->id_jurusan;?>"><?php echo $baris->nama_jurusan;?></option>
							                        	<?php foreach ($data_jurusan as $baris2) { ?>
				                                    		<option value="<?php echo $baris2->id_jurusan;?>"><?php echo $baris2->nama_jurusan;?></option>
				                                    	<?php }?>
								                    </select>
												</div>
													<div class="form-group">
														<h6>Tingkat Kelas</h6>
														<select name="id_ta" class="form-control input-xs" required="required">
																<option value="<?php echo $baris->id_tingkat;?>"><?php echo $baris->nama_tingkat;?></option>
															<?php foreach ($data_tingkat as $baris6) { ?>
					                                    		<option value="<?php echo $baris6->id_tingkat;?>"><?php echo $baris6->nama_tingkat;?></option>
					                                    	<?php }?>
														</select>
													</div>
													<div class="form-group">
														<h6>Tahun Ajaran</h6>
														<select name="id_ta" class="form-control input-xs" required="required">
																<option value="<?php echo $baris->id_ta;?>"><?php echo $baris->nama_ta;?></option>
															<?php foreach ($data_tahunajaran as $baris7) { ?>
					                                    		<option value="<?php echo $baris7->id_ta;?>"><?php echo $baris7->nama_ta;?></option>
					                                    	<?php }?>
														</select>
													</div>
												<div class="form-group">
													<h6>Keterangan:</h6>
													<textarea type="text" class="form-control input-sm" name="keterangan"><?php echo $baris->keterangan ;?></textarea>
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
									        <form action="<?php echo site_url('data_kelas/hapus_data');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
								            	<input type="hidden" class="form-control" name="id_kelas" value="<?php echo $baris->id_kelas; ?>">
								                   	<p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $baris->nama_kelas; ?></code> ?</p>
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

	<script type="text/javascript">
	$(document).ready(function(){

	     $("button[name='import']").click(function(){
	         $('#images').show();
	         if(valid)
	            return true;
	         else
	            {
	              $(this).removeAttr('disabled');
	              $('#images').hide();     
	              return false;
	            }
	     });
		 
	});
		 
	</script>