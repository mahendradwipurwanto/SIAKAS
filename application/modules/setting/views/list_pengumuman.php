<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<li><a href="#" onclick="history.back(-1)"><strong><i class="fa fa-arrow-left"></i> Pengaturan</strong></a></li>
			<li class="active">Data Pengumuman</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="well well-small well-box">
			<p><h4><strong>List Pengumuman</strong> </h4> Tgl. <?php echo $date;?></p>
			<hr>
			<table id="table-scroll" class="table table-bordered table-condensed" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Tgl. Tampil</th>
						<th>Tgl. Tutup</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomer=1; foreach ($data_pengumuman as $data) { ;?>
					<tr>
						<td><?php echo $nomer ?></td>
						<td><?php echo $data->subjek ?></td>
						<td><?php echo $data->tanggal_pengumuman ?></td>
						<td><?php echo $data->tanggal_akhir ?></td>
						<td>
							<a href="<?php echo base_url()?>setting/detail_pengumuman_list/<?php echo $data->id_pengumuman?>" class="btn btn-default btn-xs"> <i class="fa fa-search-plus"></i></a>
						</td>
					</tr>

					<?php $nomer++;}?>
				</tbody>
			</table>
		</div>
	</div>
</div>