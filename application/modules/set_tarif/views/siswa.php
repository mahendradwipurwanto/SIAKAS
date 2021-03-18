			<div class="panel panel-default">
				<div class="panel-heading">Data Siswa</div>
				<div class="panel-body">
					<table id="table-minimze" width="100%" class="table table-striped table-bordered" cellpadding="0">
						<thead>
							<tr>
								<th><input type="checkbox" id="checkAll" name="checkAll"></th>
								<th>No</th>
								<th>Nama Siswa</th>
							</tr>
						</thead>
						<tbody>
							<?php $nomor=1; foreach ($data_siswa as $row22) { ;?>
							<tr>
								<td><input type="checkbox" name="nis[]" value="<?php echo $row22->nis; ?>"></td>
								<td><?php echo $nomor?></td>
								<td><?php echo $row22->nama?></td>
							</tr>
							<?php $nomor++;}?>
						</tbody>
					</table>
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