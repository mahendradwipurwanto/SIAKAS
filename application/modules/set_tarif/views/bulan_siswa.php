<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info" role="alert">
			Menambahkan data pembayar berdasarkan <strong>Siswa.</strong> pada jenis pembayaran 
			<?php foreach ($data_jenispembayaran as $rows2) { ;?>
				<strong><?php echo $rows2->nama_pembayaran; ?></strong> | <strong><?php echo $rows2->jenis; ?></strong>
			<?php }?>
		</div>
	</div>
</div>
<div class="row">
	<form action="<?php echo site_url('set_tarif/tambah_data') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="jenis" value="<?php echo $jenis; ?>">
		<input type="hidden" name="id_bayar" value="<?php echo $id_bayar; ?>">
		<input type="hidden" name="dasar" value="siswa">
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
					<div id="kelas">
						<div class="form-group">
							<div class="col-md-12">
								<select class="form-control" readonly>
				                    <option value="0">Pilih Kelas</option>
				                </select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="nama">
				
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-success">
				<div class="panel-heading">Jumlah Tarif Iuran</div>
				<div class="panel-body">
					<table width="100%" class="table">
						<tr>
							<td width="15%">Januari</td>
							<td width="35%"><input type="number" name="bulan_1" class="form-control" placeholder="Tarif"></td>
							<td width="15%">Juli</td>
							<td width="35%"><input type="number" name="bulan_7" class="form-control" placeholder="Tarif"></td>
						</tr>
						<tr>
							<td width="15%">Februari</td>
							<td width="35%"><input type="number" name="bulan_2" class="form-control" placeholder="Tarif"></td>
							<td width="15%">Agustus</td>
							<td width="35%"><input type="number" name="bulan_8" class="form-control" placeholder="Tarif"></td>
						</tr>
						<tr>
							<td width="15%">Maret</td>
							<td width="35%"><input type="number" name="bulan_3" class="form-control" placeholder="Tarif"></td>
							<td width="15%">September</td>
							<td width="35%"><input type="number" name="bulan_9" class="form-control" placeholder="Tarif"></td>
						</tr>
						<tr>
							<td width="15%">April</td>
							<td width="35%"><input type="number" name="bulan_4" class="form-control" placeholder="Tarif"></td>
							<td width="15%">Oktober</td>
							<td width="35%"><input type="number" name="bulan_10" class="form-control" placeholder="Tarif"></td>
						</tr>
						<tr>
							<td width="15%">Mei</td>
							<td width="35%"><input type="number" name="bulan_5" class="form-control" placeholder="Tarif"></td>
							<td width="15%">November</td>
							<td width="35%"><input type="number" name="bulan_11" class="form-control" placeholder="Tarif"></td>
						</tr>
						<tr>
							<td width="15%">Juni</td>
							<td width="35%"><input type="number" name="bulan_6" class="form-control" placeholder="Tarif"></td>
							<td width="15%">Desember</td>
							<td width="35%"><input type="number" name="bulan_12" class="form-control" placeholder="Tarif"></td>
						</tr>
					</table>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2">Keterangan</label>
						<div class="col-sm-10">
							<textarea type="text" class="form-control" name="keterangan"></textarea>
						</div>
					</div>
				</div>

				<div class="modal-footer">

				<table style="float:right;">
					<tr>
						<td><button type="submit" class="btn btn-primary btn-sm">Simpan</button></td>
				</form>
						<?php foreach ($data_jenispembayaran as $baris) { ;?>
						<td width="5%"></td>
						<td>
							<form action="<?php echo site_url('set_tarif/tarif')?>" method="post">
								<input type="hidden" name="id_bayar" value="<?php echo $baris->id_pembayaran; ?>">
								<input type="hidden" name="jenis" value="<?php echo $baris->jenis; ?>">
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
	        $("#id_jurusan").change(function(){
	                var id_jurusan = {id_jurusan:$("#id_jurusan").val()};
	                   $.ajax({
	               type: "POST",
	               url : "<?php echo site_url(); ?>set_tarif/kelas",
	               data: id_jurusan,
	               success: function(msg){
	               $('#kelas').html(msg);
	               }
	            });
	              });
       </script>