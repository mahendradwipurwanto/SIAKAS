					<div class="form-group">
						<label class="control-label col-sm-4">Pilih Kelas</label>
						<div class="col-sm-8">
							<select class="form-control input-md" name="nis">
								<option>Pilih Siswa</option>
								<?php foreach ($data_siswa as $row3) { ?>
                                      <option value="<?php echo $row3->nis;?>"><?php echo $row3->nama;?></option>
                                <?php }?>
							</select>
						</div>
					</div>