<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Data Pembayar | </strong>
				<?php foreach ($data_jenispembayaran as $rows2) { ;?>
					<b class="text text-danger"><?php echo $rows2->nama_pembayaran; ?></b> | <strong class="label label-primary">BULANAN</strong>
				</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-8">
					<table width="100%" class="table table-striped table-bordered">
						<tr>
							<th width="30%" style="background-color: #BDE7FC;">Refresh</th>
							<td width="70%"> <button type="button" class="btn btn-info btn-sm" onClick="window.location.reload()">Refresh</button></td>
						</tr>
						<tr>
							<th width="30%" style="background-color: #BDE7FC;">Aksi</th>
							<td width="70%"> <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">Tambah Data</button>
											 <a href="<?php echo site_url('jenis_pembayaran/');?>" type="button" class="btn btn-warning btn-sm">Back</a>
							<button type="button" data-toggle="modal" data-target="#semua" class="btn btn-danger btn-sm">Hapus Data Terpilih</button> 
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-body bg-info">
							<span class="pull-left"><i class="fa fa-id-badge fa-3x"></i></span>
							<span class="pull-right"><div class="huge-2x text-right"><?php echo $jumlah_pembayar_bulan; ?></div> Jumlah Pembayar</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<!-- MODAL BEGIN -->

			<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				<div class="modal-dialog">
			    	<div class="modal-content">
			    		<div class="modal-header modal-header-info">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Pengaturan Pembayaran</h4>
			      		</div>
			      		<div class="modal-body">
							<form action="<?php echo base_url()?>set_tarif/atur/<?php echo $id_bayar ?>" method="post" class="form-horizontal">
								<input type="hidden" name="jenis" value="<?php echo $rows2->jenis; ?>">
								<input type="submit" name="dasar" value="Berdasarkan Siswa" class="btn btn-success btn-sm btn-block"></input>
							</form>
			    		</div>
			    	</div>
				</div>
			</div>
		<!-- MODAL END -->

				<?php };?>
		<div class="well well-small well-box">
			<div class="row">
				<form action="<?php echo site_url('set_tarif/tarif2/0');?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
						<input type="hidden" name="id_bayar" value="<?php echo $id_bayar; ?>">
						<input type="hidden" name="jenis" value="<?php echo $jenis; ?>">
						<div class="col-md-4">
							<div class="panel panel-primary">
								<div class="panel-heading">Data Kelas</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="col-md-12">
											<select name="id_jurusan" id="id_jurusan" class="form-control">
							                    <option value="0">Pilih Jurusan</option>
							                    <?php foreach ($data_jurusan as $baris) { ?>
							                    <option value="<?php echo $baris->id_jurusan;?>"><?php echo $baris->nama_jurusan;?></option>
							                    <?php }?>
							                </select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div id="kelas">
												<select class="form-control" readonly>
									                <option value="0">Pilih Kelas</option>
									            </select>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-success btn-block">Tampilkan</button>
								</div>
							</div>
								
						</div>
				</form>
		  			<form action="<?php echo site_url('set_tarif/hapus_data_all'); ?>" method="post" enctype="multipart/form-data" >
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

			<div class="col-md-8">
				<div class="panel panel-success">
					<?php foreach ($kelas as $rows) { ;?>
					<div class="panel-heading">Data Pembayar Terdaftar Di <code class="label label-danger"><strong><?php echo $rows->nama_kelas ?></strong></code> - 
					<code class="label label-success"><strong><?php echo $jumlah_pembayar_kelas ?> Siswa </strong></code></div>
					<?php };?>
					<div class="panel-body">
						<table id="table-scroll" class="table table-striped table-bordered" width="100%" cellpadding="0">
							<thead>
								<tr>
									<th><input type="checkbox" id="checkAll" name="checkAll"></th>
									<th>No</th>
									<th>NIS</th>
									<th>Nama</th>
									<th>Tarif</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
							<?php $nomer=1; foreach ($data_pembayar as $baris) { ;?>
								<tr>
									<td><input type="checkbox" name="msg[]" value="<?php echo $baris->nis; ?>"></td>
										<input type="hidden" name="id_bayar" value="<?php echo $baris->id_pembayaran; ?>">
								</form>
									<td><?php echo $nomer; ?></td>
									<td><?php echo $baris->nis; ?></td>
									<td><?php echo $baris->nama; ?></td>
									<td>
									<form action="<?php echo site_url('set_tarif/lihat')?>" method="post">
										<input type="hidden" name="id_bayar" value="<?php echo $baris->id_pembayaran; ?>">
										<input type="hidden" name="jenis" value="<?php echo $baris->jenis; ?>">
										<input type="hidden" name="nis" value="<?php echo $baris->nis; ?>">
										<button type="submit" class="btn btn-info btn-xs">Lihat Tarif</button>
									</form>
									</td>
									<td>
										<form action="<?php echo site_url('set_tarif/edit')?>" method="post">
											<input type="hidden" name="id_bayar" value="<?php echo $baris->id_pembayaran; ?>">
											<input type="hidden" name="jenis" value="<?php echo $baris->jenis; ?>">
											<input type="hidden" name="nis" value="<?php echo $baris->nis; ?>">
											<button type="submit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
											<a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapus<?php echo $nomer; ?>"><i class="fa fa-eraser"></i></a>
										</form>
									</td>
								</tr>
							<!-- modal -->

									<div class="modal fade" id="hapus<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
										<div class="modal-dialog">
									    	<div class="modal-content">
									    		<div class="modal-header modal-header-danger">
											        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
									      		</div>
									      		<div class="modal-body">
											        <form action="<?php echo site_url('set_tarif/hapus_data');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
										            	<input type="hidden" class="form-control" name="nis" value="<?php echo $baris->nis; ?>">
														<input type="hidden" name="id_bayar" value="<?php echo $baris->id_pembayaran; ?>">
										                   	<p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $baris->nama; ?></code> ?</p>
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
	</div>
<!-- END FILE -->


		<script type="text/javascript"> 
	        $("#id_jurusan").change(function(){
	                var id_jurusan = {id_jurusan:$("#id_jurusan").val()};
	                   $.ajax({
	               type: "POST",
	               url : "<?php echo site_url(); ?>set_tarif/turun",
	               data: id_jurusan,
	               success: function(msg){
	               $('#kelas').html(msg);
	               }
	            });
	              });
       </script>
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