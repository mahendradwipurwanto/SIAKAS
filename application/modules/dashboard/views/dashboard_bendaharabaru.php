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
            <span class="text-muted">Selamat datang di <strong>SIAKAS - Sistem Informasi Administrasi Sekolah | <?php echo $nama_sekolah;?></strong></span>
            <h6 class="text-muted pull-right">Malang, <?php echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ?>, IP anda : <?php echo $ip;?></h6>
            <br>
            <span class="text-muted"><i class="fa fa-map-marker"></i> Alamat: <?php echo $alamat_sekolah;?>  Telpon: <?php echo $telp;?></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <div class="well well-small box-quick-link">
                    <a style="text-decoration: none;" href="<?php echo site_url('dashboard/master'); ?>">
                        <div class="header">
                            <div class="fa fa-archive fa-4x"></div>
                        </div>
                        <div class="content">Data Master</div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="well well-small box-quick-link">
                    <a style="text-decoration: none;" href="<?php echo site_url('dashboard/keuangan'); ?>">
                        <div class="header">
                            <div class="fa fa-money fa-4x"></div>
                        </div>
                        <div class="content">Keuangan</div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="well well-small box-quick-link">
                    <a style="text-decoration: none;" href="<?php echo site_url('dashboard/transaksi'); ?>">
                        <div class="header">
                            <div class="fa fa-credit-card fa-4x"></div>
                        </div>
                        <div class="content">Transaksi</div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="well well-small box-quick-link">
                    <a style="text-decoration: none;" href="<?php echo base_url(); ?>laporan">
                        <div class="header">
                            <div class="fa fa-file-pdf-o fa-4x"></div>
                        </div>
                        <div class="content">Laporan</div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="well well-small box-quick-link">
                    <a style="text-decoration: none;" href="<?php echo base_url(); ?>setting">
                        <div class="header">
                            <div class="fa fa-gears fa-4x"></div>
                        </div>
                        <div class="content">Setting</div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="well well-small box-quick-link">
                    <a style="text-decoration: none;" href="<?php echo base_url(); ?>dashboard/tentang">
                        <div class="header">
                            <div class="fa fa-info-circle fa-4x"></div>
                        </div>
                        <div class="content">About</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-6">
                <div class="well well-small well-box">
                    <b><i class="fa fa-sign-out"></i> Pembayaran Hari Ini</b>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pos Pembayaran</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data_pembayaran as $row3) {?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row3->nama_pos;?></td>
                                <td><?php echo 'Rp '.number_format($row3->jumlah_pembayaran).',-';?></td>
                            </tr>
                            <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="well well-small well-box">
                    <b><i class="fa fa-sign-out"></i> Pengeluaran Hari Ini</b>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pos Pengeluaran</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data_pengeluaran as $row4) {?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row4->nama_pos;?></td>
                                <td><?php echo 'Rp '.number_format($row4->jumlah_pengeluaran).',-';?></td>
                            </tr>
                            <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>