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
                    <?php foreach ($data_bulanan as $data) { ;?>
                        <b><i class="fa fa-file"></i> Daftar Beban Bulanan</b> <a href="<?php echo site_url('pembayaran/info_administrasi')?>" class="btn btn-default btn-sm pull-right">Back</a>
                        <hr>
                        <h4><b>Pembayaran : <?php echo $data->nama_pembayaran?></b></h4>
                        <table id="table-scroll-minimaze" class="table table-striped" cellspacing="0" width="100%">
                            <tr>
                                <td colspan="2" style="text-align: center;">BULAN</td>
                            </tr>
                            <tr>
                                <td>Januari</td>
                                <?php
                                $status     = $data->bulan1;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_1); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Februari</td>
                                <?php
                                $status     = $data->bulan2;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_2); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Maret</td>
                                <?php
                                $status     = $data->bulan3;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_3); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>April</td>
                                <?php
                                $status     = $data->bulan4;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_4); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Mei</td>
                                <?php
                                $status     = $data->bulan5;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_5); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Juni</td>
                                <?php
                                $status     = $data->bulan6;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_6); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Juli</td>
                                <?php
                                $status     = $data->bulan7;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_7); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Agustus</td>
                                <?php
                                $status     = $data->bulan8;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_8); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>September</td>
                                <?php
                                $status     = $data->bulan9;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_9); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Oktober</td>
                                <?php
                                $status     = $data->bulan10;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_10); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>November</td>
                                <?php
                                $status     = $data->bulan11;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_11); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Desember</td>
                                <?php
                                $status     = $data->bulan12;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_12); ?></td>
                                <?php } ?>
                            </tr>
                        </table>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>