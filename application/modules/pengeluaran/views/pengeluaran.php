<div class="well well-small well-box">
	<h4><strong>Data Pengeluaran</strong> </h4>
	<hr>
	<form action="<?php echo site_url('pengeluaran/setpilih');?>" method="POST" class="form-inline" enctype="multipart/form-data">
		<div class="form-group">
			<label>Filter : </label>
		</div>
		<div class="form-group">
			<input type="date" name="date1" class="form-control" value="<?php echo $date1;?>">
		</div>
		-
		<div class="form-group">
			<input type="date" name="date2" class="form-control" value="<?php echo $date2;?>">
		</div>
		<button type="submit" class="btn btn-info">Tampilkan</button>
		<a href="#" type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-credit-card"></i> Tambah Transaksi</a>
	</form>

		<!-- MODAL BEGIN -->

			<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				<div class="modal-dialog">
			    	<div class="modal-content">
			    		<div class="modal-header modal-header-info">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Tambah Transaksi</h4>
			      		</div>
			      		<div class="modal-body">
							<form action="<?php echo site_url('pengeluaran/tambah_data')?>" method="POST" enctype="multipart/form-data" >
								<div class="form-group">
									<h6>Pos Pengeluaran:</h6>
									<select name="pos" class="form-control">
										<option value="">Pilih POS Pengeluaran</option>
										<?php foreach ($data_pos as $data) { ?>
					                    	<option value="<?php echo $data->id_pos;?>"><?php echo $data->nama_pos;?></option>
					                    <?php }?>
									</select>
								</div>
								<div class="form-group">
									<h6>Metode Pembayaran:</h6>
									<select name="metode" class="form-control">
										<option value="">Pilih Metode</option>
					                    <option value="Tunai">Tunai</option>
					                    <option value="Transfer">Transfer</option>
									</select>
								</div>
								<div class="form-group">
									<h6>Keterangan:</h6>
									<textarea type="text" name="keterangan" class="form-control" name="Keterangan" placeholder=""></textarea>
								</div>
								<div class="form-group">
									<h6>Jumlah Pengeluaran:</h6>
									<input type="number" class="form-control" name="jumlah" placeholder="">
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Tambah</button>
								</div>
							</form>
			    		</div>
			    	</div>
				</div>
			</div>
		<!-- MODAL END -->
	<hr>
	<table id="table-scroll" class="table table-bordered table-stripped">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Transaksi</th>
				<th>Tanggal Transaksi</th>
				<th>Pos Pengeluaran</th>
				<th>Metode</th>
				<th>Keterangan</th>
				<th>Jumlah Pengeluaran</th>
				<th>Cetak</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomer=1; foreach ($data_pengeluaran as $data) { ;?>
			<tr>
				<td><?php echo $nomer ?></td>
				<td><?php echo $data->kode_transaksi ?></td>
				<td><?php echo $data->tanggal_transaksi ?></td>
				<td><?php echo $data->nama_pos ?></td>
				<td><?php echo $data->caraku ?></td>
				<td><?php echo $data->isi ?></td>
				<td><?php echo 'Rp '.number_format($data->jumlah_pengeluaran) ?></td>
				<td><a href="<?php echo base_url()?>printer/cetak_pengeluaran/<?php echo $data->kode_transaksi?>" target="_blank" class="btn btn-warning btn-sm btn-block"><i class="fa fa-print"></i> Cetak</a></td>
				<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit<?php echo $nomer;?>"><i class="fa fa-pencil"></i></button> <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $nomer;?>"><i class="fa fa-eraser"></i></button></td>
			</tr>

			<div class="modal fade" id="edit<?php echo $nomer;?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				<div class="modal-dialog">
			    	<div class="modal-content">
			    		<div class="modal-header modal-header-info">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Edit Transaksi <span class="label label-danger"><?php echo $data->kode_transaksi;?></span></h4>
			      		</div>
			      		<div class="modal-body">
							<form action="<?php echo site_url('pengeluaran/edit_data')?>" method="POST" enctype="multipart/form-data" >
								<input type="hidden" class="form-control" name="id_pengeluaran" value="<?php echo $data->id_pengeluaran; ?>">
								<div class="form-group">
									<h6>Pos Pengeluaran:</h6>
									<select name="pos" class="form-control">
											<option value="<?php echo $data->id_pos;?>"><?php echo $data->nama_pos;?></option>
											<hr>
										<?php foreach ($data_pos as $data2) { ?>
					                    	<option value="<?php echo $data2->id_pos;?>"><?php echo $data2->nama_pos;?></option>
					                    <?php }?>
									</select>
								</div>
								<div class="form-group">
									<h6>Metode Pembayaran:</h6>
									<select name="metode" class="form-control">
										<option value="<?php echo $data->caraku;?>"><?php echo $data->caraku;?></option>
										<hr>
										<option value="Tunai">Tunai</option>
					                    <option value="Transfer">Transfer</option>
									</select>
								</div>
								<div class="form-group">
									<h6>Keterangan:</h6>
									<textarea type="text" name="keterangan" class="form-control"><?php echo $data->isi ?></textarea>
								</div>
								<div class="form-group">
									<h6>Jumlah Pengeluaran:</h6>
									<input type="number" class="form-control" name="jumlah" value="<?php echo $data->jumlah_pengeluaran;?>">
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Edit</button>
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
									        <h4 class="modal-title" id="myModalLabel">Hapus Data Pengeluaran</h4>
							      		</div>
							      		<div class="modal-body">
									        <form action="<?php echo site_url('pengeluaran/hapus_data');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
								            	<input type="hidden" class="form-control" name="id_pengeluaran" value="<?php echo $data->id_pengeluaran; ?>">
								                   	<p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $data->kode_transaksi; ?></code> ?</p>
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