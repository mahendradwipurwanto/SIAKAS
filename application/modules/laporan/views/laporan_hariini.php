<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <li><a href="#" onclick="history.back(-1)"><strong><i class="fa fa-arrow-left"></i> Dashboard</strong></a></li>
            <li class="active">Laporan Hari Ini</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php 
            $this->load->view('menu/menu_laporan');
        ?>
    </div>
</div>
<br>

<?php 
        $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );

?>

<div class="row">
	<div class="col-md-12">
        <div class="well well-small well-box">
            <b><i class="fa fa-refresh"></i> Laporan Hari Ini | <span class="text text-info">Malang, <?php echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ?></span></b>
            <hr>
            <table id="table" class="table table-striped" cellspacing="0" width="100%">
            	<thead>
            		<tr>
	            		<th>No</th>
	            		<th>Tanggal</th>
	            		<th>No Transaksi</th>
	            		<th>Metode Pembayaran</th>
	            		<th>Total</th>
                        <th>Detail</th>
            		</tr>
            	</thead>
            	<tbody>
                <?php $no=1; foreach ($data_transaksi as $data)  { ?>
            		<tr>
            			<td><?php echo $no;?></td>
            			<td><?php echo $data->tanggal_pembayaran;?></td>
            			<td><?php echo $data->kode_transaksi;?></td>
            			<td><?php echo $data->cara_pembayaran;?></td>
            			<td><?php echo $data->jumlah_pembayaran;?></td>
                        <td><a href="<?php echo base_url()?>laporan/detail_laporan/<?php echo $data->kode_transaksi?>" class="btn btn-warning btn-sm btn-block"><i class="fa fa-search"></i> Detail</a></td>
            		</tr>
                <?php $no++; }?>
            	</tbody>
            </table>
        </div>
	</div>
</div>