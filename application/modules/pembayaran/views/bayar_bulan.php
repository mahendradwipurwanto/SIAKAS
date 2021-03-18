<div class="well well-small well-box">
	<h4 class="text text-danger">Proses Transaksi Atas Nama</h4>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<?php foreach ($data_pembayaran as $rows) { ;?>
					<table width="100%">
	            	<tr>
	            		<td width="30%">NIS</td>
	            		<td>: <b><?php echo $rows->nis; ?></b> </td>
	            	</tr>
	            	<tr>
	            		<td>Nama</td>
	            		<td>: <b><?php echo $rows->nama; ?></b> </td>
	            	</tr>
	            	<tr>
	            		<td>Kelas</td>
	            		<td>: <b><?php echo $rows->nama_kelas; ?></b> </td>
	            	</tr>
	            	<tr>
	            		<td>Jenis Kelamin</td>
	            		<td>: <b><?php echo $rows->jk; ?></b> </td>
	            	</tr>
	            </table>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="row">
		<form action="<?php echo site_url('pembayaran/tambah_transaksi') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<input type="hidden" name="jenis" value="bulanan">
				<?php foreach ($data_pembayaran as $rows) { ;?>
					<input type="hidden" name="nis" value="<?php echo $rows->nis; ?>">
				<?php }?>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Pilih Transaksi</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-md-12">
								<h5>Metode Pembayaran</h5>
								<select name="cara_pembayaran" class="form-control">
				                    <option value="">--- Pilih ---</option>
				                    <option value="Tunai">Tunai</option>
				                    <option value="Transfer">Transfer</option>
				                </select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<h5>Pilih Pembayaran</h5>
								<select name="id_tarif" id="id_tarif" class="form-control">
				                    <option value="">--- Pilih ---</option>
				                    <?php foreach ($data_pilih as $data) { ?>
				                    <option value="<?php echo $data->id_tarif;?>"><?php echo $data->nama_pembayaran;?></option>
				                    <?php }?>
				                </select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-success">
					<div class="panel-heading">Jumlah Tarif Iuran <span class="text text-primary">Rp.250.000/bulan</span></div>
					<div class="panel-body">
						<div id="bayar">
							
						</div>
					</div>

					<div class="modal-footer">

					<table style="float:right;">
						<tr>
							<td><button type="submit" class="btn btn-success btn-sm">Bayar</button></td>
					</form>
							<?php foreach ($data_pembayaran as $baris) { ;?>
							<td width="5%"></td>
							<td>
								<form action="<?php echo site_url('pembayaran/tampil')?>" method="post">
									<input type="hidden" name="nis" value="<?php echo $baris->nis; ?>">
							<?php }?>
									<button type="submit" class="btn btn-danger btn-sm">Batal</button>
								</form>
							</td>
						</tr>
					</table>
					</div>
				</div>
			</div>
		</div>
</div>
		<script type="text/javascript"> 
	        $("#id_tarif").change(function(){
	                var id_tarif = {id_tarif:$("#id_tarif").val()};
	                   $.ajax({
	               type: "POST",
	               url : "<?php echo site_url(); ?>pembayaran/turun",
	               data: id_tarif,
	               success: function(msg){
	               $('#bayar').html(msg);
	               }
	            });
	              });
       </script>