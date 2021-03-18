<div class="row">
    <div class="col-md-12">
        <?php foreach ($data_transaksi as $data) { ?>
    	<div class="panel panel-default">
    		<div class="panel-heading"></div>
    		<div class="panel-body">
    			<table class="table table-striped table-bordered" width="100%">
    				<tr>
    					<td width="30%">Opsi</td>
    					<td width="70%">
							<table>
    							<tr>
    								<td>
										<form action="<?php echo site_url('set_tarif/edit')?>" method="post">
											<input type="hidden" name="id_bayar" value="<?php echo $data->id_pembayaran; ?>">
											<input type="hidden" name="jenis" value="<?php echo $data->jenis; ?>">
											<input type="hidden" name="nis" value="<?php echo $data->nis; ?>">
											<button type="submit" class="btn btn-info btn-sm">Edit Tarif</button>
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
    					</td>
    				</tr>
    			</table>
    		</div>
    	</div>
        <div class="well well-small well-box">
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
	        <table class="table table-striped table-bordered" width="100%" fontsize="2px">
	        	<strong><h4>Tarif Pembayaran</h4></strong>
	        	<tr>
	        		<td width="10%" style="background-color:#25D131; color:#fff; font-weight: bold; ">Tarif</td>
	        		<td width="15%">Rp.<?php echo $data->tarif_pembayaran;?>,00</td>
	        	</tr>
	        </table>
	        <hr>
	        <table class="table table-striped table-bordered" width="100%">
	        	<strong><h4>Keterangan Pembayaran</h4></strong>
	        	<tr>
	        		<td colspan="4"><?php echo $data->ket;?></td>
	        	</tr>
	        </table>
	        <?php }?>
        </div>
    </div>
</div>