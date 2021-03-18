<div class="row">
    <div class="col-md-12">
        <div class="well well-small well-box">
        <?php foreach ($data_transaksi as $data) { ?>
	        <table class="table table-striped table-bordered" width="100%">
	        	<strong><h4>Data Pembayar</h4></strong>
	        	<tr>
	        		<td colspan="1" rowspan="5" width="20%" align="center"><img src="<?php echo base_url();?>assets/backend/images/profil/<?php echo $profil?>"></td>
	        		<td colspan="1" width="30%">NIS</td>
	        		<td colspan="1" width="50%"><strong><?php echo $data->nis;?></strong></td>
	        	</tr>
	        	<tr>
	        		<td colspan="1" width="30%">NAMA</td>
	        		<td colspan="1" width="50%"><strong><?php echo $data->nama;?></strong></td>
	        	</tr>
	        	<tr>
	        		<td colspan="1" width="30%">KELAS</td>
	        		<td colspan="1" width="50%"><strong><?php echo $data->nama_kelas;?></strong></td>
	        	</tr>
	        	<tr>
	        		<td colspan="1" width="30%">Pembayaran</td>
	        		<td colspan="1" width="50%"><strong><?php echo $data->nama_pembayaran;?></strong></td>
	        	</tr>
	        	<tr>
	        		<td colspan="1" width="30%">Jenis</td>
	        		<td colspan="1" width="50%"><strong><?php echo $data->jenis;?></strong></td>
	        	</tr>
	        </table>
	        <hr>
	        <form action="<?php echo site_url('set_tarif/edit_data')?>" method="POST">
	        	<input type="hidden" name="id_tarif" class="form-control input-sm" value="<?php echo $data->id_tarif;?>">
	        	<input type="hidden" name="id_bayar" class="form-control input-sm" value="<?php echo $data->id_pembayaran;?>">
	        	<input type="hidden" name="jenis" class="form-control input-sm" value="<?php echo $data->jenis;?>">
	        <table class="table table-striped table-bordered" width="100%" fontsize="2px">
	        	<strong><h4>Tarif Pembayaran</h4></strong>
	        	<tr>
	        		<td width="10%" style="background-color:#25D131; color:#fff; font-weight: bold; ">Tarif</td>
	        		<td width="15%"><input type="number" name="tarif_pembayaran" class="form-control input-sm" value="<?php echo $data->tarif_pembayaran;?>"></td>
	        	</tr>
	        </table>
	        <hr>
	        <table class="table table-striped table-bordered" width="100%">
	        	<strong><h4>Keterangan Pembayaran</h4></strong>
	        	<tr>
	        		<td colspan="4"><textarea rows="4" class="form-control input-sm" name="keterangan"><?php echo $data->ket;?></textarea></td>
	        	</tr>
	        </table>
			<div class="modal-footer">
				<table style="float: right;">
    							<tr>
    								<td>
										<button type="submit" class="btn btn-primary btn-sm">Edit Data</button>
	        </form>
    								</td>
    								<td width="5%"></td>
    								<td>
										<form action="<?php echo site_url('set_tarif/tarif2/0')?>" method="post">
											<?php foreach ($data_jenispembayaran as $baris) { ;?>
												<input type="hidden" name="id_kelas" value="<?php echo $data->id_kelas; ?>">
												<input type="hidden" name="id_bayar" value="<?php echo $baris->id_pembayaran; ?>">
												<input type="hidden" name="jenis" value="<?php echo $baris->jenis; ?>">
												<button type="submit" class="btn btn-warning btn-sm">Batal</button>
											<?php }?>
										</form>
									</td>
    							</tr>
    						</table>
	    	</div>
	        <?php }?>
        </div>
    </div>
</div>