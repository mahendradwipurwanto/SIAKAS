  <div class="form-group">
		<div class="row">
			<div class="col-sm-12">
				<label>Jurusan</label>
        <select name="jurusan" class="form-control select-search" >
          <?php foreach ($tampil_jurusan as $baris) { ?>
            <option value="<?php echo $baris->id_jurusan;?>"><?php echo $baris->nama_jurusan;?></option>
          <?php }?>
        </select>
      </div>
		</div>
	</div>
                                 