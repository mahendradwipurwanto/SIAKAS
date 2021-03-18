<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <li><a href="#" onclick="history.back(-1)"><strong><i class="fa fa-arrow-left"></i> Dashboard</strong></a></li>
            <li class="active">Laporan Tanggal</li>
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
<div class="row">
	<div class="col-md-12">
        <div class="well well-small well-box">
            <b><i class="fa fa-list-alt"></i> Laporan Tanggal | <span class="text text-success"><?php echo $date1;?> - <?php echo $date2;?></span></b>
            <hr>
            <form action="<?php echo site_url('laporan/setpilih');?>" method="POST" class="form-inline" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Filter : </label>
                </div>
                <div class="form-group">
                    <input type="date" name="date1" class="form-control" value="<?php echo $date1;?>">
                </div>
                -
                <div class="form-group">
                    <input type="date" name="date2" class="form-control" value="<?php echo $date2;?>">
                </div>
                <button type="submit" class="btn btn-info">Tampilkan</button>
            </form>
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