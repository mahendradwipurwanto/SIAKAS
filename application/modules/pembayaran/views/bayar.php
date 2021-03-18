				<?php foreach ($data_bayar as $bayar) {?>

					<input type="hidden" name="id_tarif" value="<?php echo $bayar->id_tarif;?>">
					<input type="hidden" name="id_bayar" value="<?php echo $bayar->id_jenispembayaran;?>">

					<input type="hidden" name="nilai_1"  value="<?php echo $bayar->bulan_1;?>">
					<input type="hidden" name="nilai_2"  value="<?php echo $bayar->bulan_2;?>">
					<input type="hidden" name="nilai_3"  value="<?php echo $bayar->bulan_3;?>">
					<input type="hidden" name="nilai_4"  value="<?php echo $bayar->bulan_4;?>">
					<input type="hidden" name="nilai_5"  value="<?php echo $bayar->bulan_5;?>">
					<input type="hidden" name="nilai_6"  value="<?php echo $bayar->bulan_6;?>">
					<input type="hidden" name="nilai_7"  value="<?php echo $bayar->bulan_7;?>">
					<input type="hidden" name="nilai_8"  value="<?php echo $bayar->bulan_8;?>">
					<input type="hidden" name="nilai_9"  value="<?php echo $bayar->bulan_9;?>">
					<input type="hidden" name="nilai_10" value="<?php echo $bayar->bulan_10;?>">
					<input type="hidden" name="nilai_11" value="<?php echo $bayar->bulan_11;?>">
					<input type="hidden" name="nilai_12" value="<?php echo $bayar->bulan_12;?>">

					<table width="100%" class="table">
						<tr>
							<td width="15%">Januari</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan1;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan1" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan1" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
							<td width="15%">Juli</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan7;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan7" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan7" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
						</tr>
						<tr>
							<td width="15%">Februari</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan2;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan2" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan2" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
							<td width="15%">Agustus</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan8;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan8" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan8" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
						</tr>
						<tr>
							<td width="15%">Maret</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan3;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan3" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan3" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
							<td width="15%">September</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan9;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan9" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan9" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
						</tr>
						<tr>
							<td width="15%">April</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan4;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan4" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan4" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
							<td width="15%">Oktober</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan10;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan10" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan10" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
						</tr>
						<tr>
							<td width="15%">Mei</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan5;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan5" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan5" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
							<td width="15%">November</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan11;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan11" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan11" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
						</tr>
						<tr>
							<td width="15%">Juni</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan6;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan6" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan6" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
							<td width="15%">Desember</td>
							<td width="35%">
								<?php
		                        $status     = $bayar->bulan12;;
		                        if($status=='LUNAS'){ ?>
		                        <input type="text" name="bulan12" value="LUNAS" class="form-control" style="background-color:#dff0d8;" readonly="readonly">
		                        <?php  }else{ ?>
								<select name="bulan12" class="form-control" style="background-color:#f2dede;" >
									<option value="0">Belum Lunas</option>
									<option value="1">Bayar</option>
								</select>
		                        <?php } ?>
							</td>
						</tr>
					</table>
				<?php }?>