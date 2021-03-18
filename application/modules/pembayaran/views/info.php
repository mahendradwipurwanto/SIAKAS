<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <li><a href="<?php echo base_url()?>dashboard"><strong><i class="fa fa-arrow-left"></i> Beranda</strong></a></li>
            <li class="active">Info Administrasi</li>
        </ol>
    </div>
</div>

<div class="row">
    <?php foreach ($data_pembayar as $row) { ;?>
    <div class="col-md-4">
        <div class="well well-small well-box">
            <b><i class="fa fa-user"></i> Data Siswa</b>
            <hr>
            <table class="table table-striped table-condensed" width="100%">
            	<tr>
            		<td width="20%">NIS</td>
            		<td>: <b><?php echo $row->nis; ?></b> </td>
            	</tr>
            	<tr>
            		<td>Nama</td>
            		<td>: <b><?php echo $row->nama; ?></b> </td>
            	</tr>
            	<tr>
            		<td>Kelas</td>
            		<td>: <b><?php echo $row->nama_kelas; ?></b> </td>
            	</tr>
            	<tr>
            		<td>JK</td>
            		<td>: <b><?php echo $row->jk; ?></b> </td>
            	</tr>
            </table>
        </div>
    </div>
    <?php }?>
<?php foreach ($data_pembayar as $row) { ;?>
    <div class="col-md-8">
        <div class="well well-small well-box">
            <b><i class="fa fa-list-alt"></i> Riwayat Transaksi</b>
            <hr>
            <table id="table-scroll-2" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($data_riwayat as $data)  { ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data->tanggal_pembayaran;?></td>
                        <td><?php echo $data->nama_pembayaran;?></td>
                        <td><?php echo $data->jumlah_pembayaran;?></td>
                        <td><a href="<?php echo base_url()?>laporan/detail_laporan/<?php echo $data->kode_transaksi;?>" class="btn btn-default btn-xs"><i class="fa fa-search-plus"></i></a></td>
                    </tr>
                <?php $no++; }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-6">
        <div class="well well-small well-box">
            <b><i class="fa fa-file"></i> Daftar Beban Bulanan</b>
            <hr>
            <table id="table-scroll-minimaze2" class="table table-striped" cellspacing="0" width="100%">
            	<thead>
            		<tr>
            			<th width="80%">Pembayaran</th>
            			<th>Detail</th>
            		</tr>
            	</thead>
            	<tbody>
                <?php foreach ($data_bulanan as $data) { ;?>
            		<tr>
            			<td><?php echo $data->nama_pembayaran; ?></td>
                        <td><a href="<?php echo base_url()?>pembayaran/detail_bulan/<?php echo $data->id_tarif;?>" class="btn btn-default btn-xs"><i class="fa fa-search-plus"></i></a></td>
            		</tr>
                <?php }?>
            	</tbody>
            </table>
        </div>
	</div>
	<div class="col-md-6">
        <div class="well well-small well-box">
            <b><i class="fa fa-calendar"></i> Daftar Beban Bebas</b>
            <hr>
            <table id="table-scroll-minimaze" class="table table-striped" cellspacing="0" width="100%">
            	<thead>
            		<tr>
	            		<th width="80%">Pembayaran</th>
                        <th>Detail</th>
            		</tr>
            	</thead>
            	<tbody>
                <?php foreach ($data_bebas as $data) { ?>
                    <tr>
                        <td><?php echo $data->nama_pembayaran; ?></td>
                        <td><a href="<?php echo base_url()?>pembayaran/detail_bebas/<?php echo $data->id_tarif;?>" class="btn btn-default btn-xs"><i class="fa fa-search-plus"></i></a></td>
                    </tr>
                <?php }?>
            	</tbody>
            </table>
        </div>
	</div>
</div>
<?php }?>