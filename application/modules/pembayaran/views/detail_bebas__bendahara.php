<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            <li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url()?>dashboard/transaksi"><strong>Transaksi</strong></a></li>
            <li class="active">Pembayaran</li>
        </ol>
    </div>
</div>

<div class="row">
	<div class="col-md-3">
		<?php 
            $this->load->view('menu/menu_transaksi');
        ?>
	</div>
	<div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-small well-box">
                    <?php foreach ($data_bebas as $data) { ;?>
                        <b><i class="fa fa-file"></i> Daftar Beban Bebas</b> <a href="<?php echo site_url('pembayaran/info_administrasi')?>" class="btn btn-default btn-sm pull-right">Back</a>
                        <hr>
                        <h4><b>Pembayaran : <?php echo $data->nama_pembayaran?></b></h4>
                        <table id="table-scroll-minimaze" class="table table-striped" cellspacing="0" width="100%">
                            <tr>
                                <td colspan="2" style="text-align: center;">Info Pembayaran</td>
                            </tr>
                            <?php }
                                $telah_dibayar    = $data->telah_dibayar;
                                $tarif_pembayaran = $data->tarif_pembayaran;
                                $sisa = $tarif_pembayaran-$telah_dibayar;

                            if ($telah_dibayar == '') { ?>
                            <tr>
                                <td>Tarif</td>
                                <td><?php echo 'Rp '.number_format($data->tarif_pembayaran); ?></td>
                            </tr>
                            <tr>
                                <td>Sisa Pembayaran</td>
                                <td>Rp.0</td>
                            </tr>
                            <tr>
                                <td>Total Pembayaran</td>
                                <td><?php echo 'Rp '.number_format($sisa); ?></td>
                            </tr>
                            <?php }else{ ?>
                            <tr>
                                <td>Tarif</td>
                                <td><?php echo 'Rp '.number_format($data->tarif_pembayaran); ?></td>
                            </tr>
                            <tr>
                                <td>Sisa Pembayaran</td>
                                <td>Rp.0</td>
                            </tr>
                            <tr>
                                <td>Total Pembayaran</td>
                                <?php
                                    if ($sisa <= 0) { ?>
                                        <td style="background-color: #dff0d8"><?php echo 'LUNAS';?></td>
                                    <?php }else{ ?>
                                        <td style="background-color: #f2dede"><?php echo 'Rp '.number_format($sisa);?></td>
                                    <?php } ?>
                            </tr>
                        </table>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>