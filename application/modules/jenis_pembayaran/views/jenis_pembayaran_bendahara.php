<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            <li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url()?>dashboard/keuangan"><strong>Keuangan</strong></a></li>
            <li class="active">Jenis Pembayaran</li>
        </ol>
    </div>
</div>

<div class="row">
	<div class="col-md-3">
		<?php 
            $this->load->view('menu/menu_keuangan');
        ?>
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Data Jenis Pembayaran</strong></h3>
					</div>
					<div class="panel-body">
						<div class="col-md-8">
							<table width="100%" class="table table-striped table-bordered">
								<tr>
									<th width="30%" style="background-color: #BDE7FC;">Media</th>
									<td width="70%">
									<a href="<?php echo site_url('printer/cetak_jenis_pembayaran');?>" target="_blank" class="btn btn-warning btn-sm">Print Data</a></td>
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
									<span class="pull-left"><i class="fa fa-archive fa-3x"></i></span>
									<span class="pull-right"><div class="huge-2x text-right"><?php echo $hitung_pembayar; ?></div> Data Jenis Pembayaran</span>
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
											        <h4 class="modal-title" id="myModalLabel">Tambah Data Jenis Pembayaran</code></h4>
									      		</div>
									      		<div class="modal-body">
											        <form action="<?php echo site_url('jenis_pembayaran/tambah_data');?>" enctype="multipart/form-data" method="post">
										            	
														<div class="form-group">
															<h6>Nama POS</h6>
															<select name="nama_pos" class="form-control input-xs" required="required">
																<?php foreach ($pos_keuangan as $baris2) { ?>
										                            <option value="<?php echo $baris2->id_pos;?>"><?php echo $baris2->nama_pos;?></option>
										                        <?php }?>
															</select>
														</div>
										            	<div class="form-group">
															<h6 for="nama">Nama Jenis Pembayaran:</h6>
															<input type="text" class="form-control input-sm" name="nama_pembayaran" placeholder="Nama Jenis Pembayaran">
														</div>
														<div class="form-group">
															<h6>Jenis</h6>
															<select name="jenis" class="form-control input-xs" required="required">
																	<option value="bulanan">Bulanan</option>
																	<option value="bebas">Bebas</option>
															</select>
														</div>
														<div class="form-group">
															<h6>Tahun Ajaran</h6>
															<select name="tahun_ajaran" class="form-control input-xs" required="required">
																<?php foreach ($data_tahunajaran as $baris3) { ?>
										                            <option value="<?php echo $baris3->id_ta;?>"><?php echo $baris3->nama_ta;?></option>
										                        <?php }?>
															</select>
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
				  <div class="panel-heading"></div>
				  <div class="panel-body">
				  			<form action="<?php echo site_url('jenis_pembayaran/hapus_data_all'); ?>" method="post" enctype="multipart/form-data" >
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
				   			<table id="table-scroll" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
										<th width="8%"><input type="checkbox" id="checkAll" name="checkAll"></th>
										<th width="8%">No</th>
										<th width="15%">Nama Pos</th>
										<th width="20%">Nama Pembayaran</th>
										<th width="10%">Jenis</th>
										<th width="10%">Tahun Ajaran</th>
										<th width="20%">Pembayaran</th>
										<th width="9%">Opsi</th>
									</tr>
								</thead>
								<tbody>
								<?php $nomer=1; foreach ($jenis_pembayaran as $baris) { ;?>
									<tr>
										<td width="8%"><input type="checkbox" name="msg[]" value="<?php echo $baris->id_pembayaran; ?>"></td>	
							</form>
										<td width="8%"><?php echo $nomer ;?></td>
										<td width="15%"><?php echo $baris->nama_pos ;?></td>
										<td width="20%"><?php echo $baris->nama_pembayaran ;?></td>
										<td width="10%"><?php echo $baris->jenis ;?></td>
										<td width="10%"><?php echo $baris->nama_ta ;?></td>
										<td width="20%">
										<form action="<?php echo site_url('set_tarif/tarif')?>" method="post">
											<input type="hidden" name="id_ta" value="<?php echo $baris->id_ta; ?>">
											<input type="hidden" name="id_bayar" value="<?php echo $baris->id_pembayaran; ?>">
											<input type="hidden" name="jenis" value="<?php echo $baris->jenis; ?>">
											<button type="submit" class="btn btn-success btn-xs">Set Tarif Pembayaran</button>
										</form>
										</td>
										<td width="9%"><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $nomer; ?>"><i class="fa fa-pencil" ></i></a> 
										<a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapus<?php echo $nomer; ?>"><i class="fa fa-eraser"></i></a></td>
									</tr>
								<!-- MODAL BEGIN  -->
									<div class="modal fade" id="edit<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
										<div class="modal-dialog">
									    	<div class="modal-content">
									    		<div class="modal-header modal-header-primary">
											        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											        <h4 class="modal-title" id="myModalLabel">Edit data dari <code class="text-success"><?php echo $baris->nama_pembayaran; ?></code></h4>
									      		</div>
									      		<div class="modal-body">
											        <form action="<?php echo site_url('jenis_pembayaran/edit_data');?>" enctype="multipart/form-data" method="post">
										            	<input type="hidden" class="form-control" name="id_pembayaran" value="<?php echo $baris->id_pembayaran; ?>">
										            	
														<div class="form-group">
															<h6>Nama POS</h6>
															<select name="nama_pos" class="form-control input-xs" required="required">
										                            <option value="<?php echo $baris->id_pos;?>"><?php echo $baris->nama_pos;?></option>
																<?php foreach ($pos_keuangan as $baris2) { ?>
										                            <option value="<?php echo $baris2->id_pos;?>"><?php echo $baris2->nama_pos;?></option>
										                        <?php }?>
															</select>
														</div>
										            	<div class="form-group">
															<h6 for="nama">Nama Jenis Pembayaran:</h6>
															<input type="text" class="form-control input-sm" name="nama_pembayaran" value="<?php echo $baris->nama_pembayaran;?>">
														</div>
														<div class="form-group">
															<h6>Jenis</h6>
															<select name="jenis" class="form-control input-xs" required="required">
																<optgroup>
										                        	<option value="<?php echo $baris->jenis;?>"><?php echo $baris->jenis;?></option>
																</optgroup>
																<optgroup>
																	<option value="bulanan">Bulanan</option>
																	<option value="bebas">Bebas</option>
																</optgroup>
															</select>
														</div>
														<div class="form-group">
															<h6>Tahun Ajaran</h6>
															<select name="tahun_ajaran" class="form-control input-xs" required="required">
										                            <option value="<?php echo $baris->id_ta;?>"><?php echo $baris->nama_ta;?></option>
																<?php foreach ($data_tahunajaran as $baris3) { ?>
										                            <option value="<?php echo $baris3->id_ta;?>"><?php echo $baris3->nama_ta;?></option>
										                        <?php }?>
															</select>
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
											        <form action="<?php echo site_url('jenis_pembayaran/hapus_data');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
										            	<input type="hidden" class="form-control" name="id_pembayaran" value="<?php echo $baris->id_pembayaran; ?>">
										                   	<p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $baris->nama_pembayaran; ?></code> ?</p>
											        	<div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
											                <button type="submit" class="btn btn-danger">Hapus</button>
											         	</div>
										        	</form>
									    		</div>
									    	</div>
										</div>
									</div>

									<!-- MODAL END -->

								<?php $nomer++; } ?>
								</tbody>
							</table>
				  </div>	
				</div>
			</div>
		</div>


		<!-- END FILE -->

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
	</div>
</div>