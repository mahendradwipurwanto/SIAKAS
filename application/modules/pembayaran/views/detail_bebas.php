<div class="row">
	<div class="col-md-12">
        <div class="well well-small well-box">
            <?php foreach ($data_bebas as $data) { ;?>
                <b><i class="fa fa-file"></i> Daftar Beban Bebas</b> <a href="<?php echo site_url('pembayaran/info_administrasi')?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-arrow-left"></i> Back</a>
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