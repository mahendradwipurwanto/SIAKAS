							<select class="form-control" name="pilihan" style="width:25%">
								<?php foreach ($data_kelas as $row2) { 
								 	$sel2 = ($row2->id_kelas == $id_kelas)?'selected="selected"':'';?>
                                      <option value="<?php echo $row2->id_kelas;?>"<?php echo $sel2; ?>><?php echo $row2->nama_kelas;?></option>
                                <?php }?>
							</select>