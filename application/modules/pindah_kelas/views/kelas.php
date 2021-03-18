<select class="form-control" name="kelas_tujuan">
        <option value="">Pilih Kelas</option>
    	<?php foreach ($data_kelas2 as $baris) { ?>
        	<option value="<?php echo $baris->id_kelas;?>"><?php echo $baris->nama_kelas;?></option>
    	<?php }?>
</select>