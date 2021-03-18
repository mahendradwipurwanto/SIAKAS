
						<div class="form-group">
							<div class="col-md-12">
								<select name="id_kelas" id="id_kelas" class="form-control">
				                    <option value="0">Pilih Kelas</option>
				                    <?php foreach ($data_kelas as $baris2) { ?>
				                    <option value="<?php echo $baris2->id_kelas;?>"><?php echo $baris2->nama_kelas;?></option>
				                    <?php }?>
				                </select>
							</div>
						</div>


		<script type="text/javascript"> 
	        $("#id_kelas").change(function(){
	                var id_kelas = {id_kelas:$("#id_kelas").val()};
	                   $.ajax({
	               type: "POST",
	               url : "<?php echo site_url(); ?>set_tarif/turun2",
	               data: id_kelas,
	               success: function(msg){
	               $('#nama').html(msg);
	               }
	            });
	              });
       </script>