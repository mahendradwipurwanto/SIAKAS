					<div class="form-group">
						<label class="control-label col-sm-4">Pilih Kelas</label>
						<div class="col-sm-8">
							<select class="form-control input-md" name="id_kelas" id="id_kelas">
								<option>Pilih Kelas</option>
								<?php foreach ($data_kelas as $row2) { ?>
                                      <option value="<?php echo $row2->id_kelas;?>"><?php echo $row2->nama_kelas;?></option>
                                <?php }?>
							</select>
						</div>
					</div>

		<script type="text/javascript"> 
	        $("#id_kelas").change(function(){
	                var id_kelas = {id_kelas:$("#id_kelas").val()};
	                   $.ajax({
	               type: "POST",
	               url : "<?php echo site_url(); ?>pembayaran/kelas",
	               data: id_kelas,
	               success: function(msg){
	               $('#nama').html(msg);
	               }
	            });
	              });
       </script>