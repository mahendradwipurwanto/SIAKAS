
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
                <?php 
                    $this->load->view('menu/menu_pencarian');
                ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="well well-small well-box">
                    <b><i class="fa fa-search"></i> Cari Siswa | KELAS</b>
                    <hr>
                    <form action="<?php echo site_url('pembayaran/tampil');?>" enctype="multipart/form-data"  method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Tahun Ajaran</label>
                            <div class="col-sm-8">
                                <select class="form-control input-md" id="id_ta" name="id_ta">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    <?php foreach ($data_tahunajaran as $baris) { ?>
                                    <option value="<?php echo $baris->id_ta;?>"><?php echo $baris->nama_ta;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div id="kelas">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Pilih Kelas</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-md" disabled="disabled">
                                        <option>Pilih Kelas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="nama">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Pilih Siswa</label>
                                <div class="col-sm-8">
                                    <select class="form-control input-md" disabled="disabled">
                                        <option>Pilih Siswa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php foreach ($data_pembayar as $row) { ;?>
            <div class="col-md-6">
                <div class="well well-small well-box">
                    <b><i class="fa fa-user"></i> Data Siswa</b>
                    <hr>
                    <table class="table table-striped table-condensed" width="100%">
                        <tr>
                            <td width="30%">NIS</td>
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
                            <td>Jenis Kelamin</td>
                            <td>: <b><?php echo $row->jk; ?></b> </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php }?>
        </div>
        <?php foreach ($data_pembayar as $row) { ;?>
        <div class="row">
            <div class="col-md-12">
                <div class="well well-small well-box">
                    <b><i class="fa fa-file"></i> Daftar Beban Bulanan</b>
                        <form action="<?php echo site_url('pembayaran/bulanan')?>" method="POST">
                            <input type="hidden" name="nis" value="<?php echo $row->nis?>">
                            <button type="submit" class="btn btn-info btn-sm pull-right" style="margin-top: -20px"><i class="fa fa-credit-card-alt"></i> Mulai Pembayaran</button>
                        </form>
                    <hr>
                    <table id="table-scroll-minimaze" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2">Pembayaran</th>
                                <th colspan="12" style="text-align: center;">BULAN</th>
                            </tr>
                            <tr>
                                <th>JUL</th>
                                <th>AGU</th>
                                <th>SEP</th>
                                <th>OKT</th>
                                <th>NOV</th>
                                <th>DES</th>
                                <th>JAN</th>
                                <th>FEB</th>
                                <th>MAR</th>
                                <th>APR</th>
                                <th>MEI</th>
                                <th>JUN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data_bulanan as $data) { ;?>
                            <tr>
                                <td><?php echo $data->nama_pembayaran; ?></td>
                                <?php
                                $status     = $data->bulan7;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_7); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan8;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_8); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan9;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_9); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan10;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_10); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan11;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_11); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan12;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_12); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan1;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_1); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan2;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_2); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan3;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_3); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan4;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_4); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan5;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_5); ?></td>
                                <?php } ?>
                                <?php
                                $status     = $data->bulan6;;
                                if($status=='LUNAS'){ ?>
                                <td style="background-color: #dff0d8;">LUNAS</td>
                                <?php  }else{ ?>
                                <td style="background-color: #f2dede;"><?php echo 'Rp.'.number_format($data->bulan_6); ?></td>
                                <?php } ?>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                                
        <div class="row">
            <div class="col-md-12">
                <div class="well well-small well-box">
                    <b><i class="fa fa-calendar"></i> Daftar Beban Bebas</b>
                        <form action="<?php echo site_url('pembayaran/bebas')?>" method="POST">
                            <input type="hidden" name="nis" value="<?php echo $row->nis?>">
                            <button type="submit" class="btn btn-info btn-sm pull-right" style="margin-top: -20px"><i class="fa fa-credit-card-alt"></i> Mulai Pembayaran</button>
                        </form>
                    <hr>
                    <table id="table-scroll-minimaze2" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Pembayaran</th>
                                <th>Tarif</th>
                                <th>Telah Dibayar</th>
                                <th>Sisa Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data_bebas as $data) { 
                            $telah_dibayar    = $data->telah_dibayar;
                            $tarif_pembayaran = $data->tarif_pembayaran;
                            $sisa = $tarif_pembayaran-$telah_dibayar;

                            if ($telah_dibayar == '') { ?>
                            <tr>
                                <td><?php echo $data->nama_pembayaran; ?></td>
                                <td><?php echo 'Rp '.number_format($data->tarif_pembayaran); ?></td>
                                <td>Rp.0</td>
                                <td><?php echo 'Rp '.number_format($sisa); ?></td>
                            </tr>
                            <?php }else{ ?>
                            <tr>
                                <td><?php echo $data->nama_pembayaran; ?></td>
                                <td><?php echo 'Rp '.number_format($data->tarif_pembayaran); ?></td>
                                <td><?php echo 'Rp '.number_format($data->telah_dibayar); ?></td>
                                <td><?php
                                    if ($sisa <= 0) {
                                        echo 'LUNAS';
                                    }else{
                                        echo 'Rp '.number_format($sisa);
                                    } ?></td>
                            </tr>
                            <?php } ?>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well well-small well-box">
                    <b><i class="fa fa-list-alt"></i> Riwayat Transaksi</b>
                    <hr>
                    <table id="table" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kode Transaksi</th>
                                <th>Pembayaran</th>
                                <th>Metode Pembayaran</th>
                                <th>Total</th>
                                <th>Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($data_riwayat as $data)  { ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data->tanggal_pembayaran;?></td>
                                <td><?php echo $data->kode_transaksi;?></td>
                                <td><?php echo $data->nama_pembayaran;?></td>
                                <td><?php echo $data->cara_pembayaran;?></td>
                                <td><?php echo $data->jumlah_pembayaran;?></td>
                                <td><a href="<?php echo base_url()?>printer/cetak_transaksi/<?php echo $data->kode_transaksi?>" target="_blank" class="btn btn-warning btn-sm btn-block"><i class="fa fa-print"></i> Cetak</a></td>
                            </tr>
                        <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }?>
                <script type="text/javascript"> 
                    $("#id_ta").change(function(){
                            var id_ta = {id_ta:$("#id_ta").val()};
                               $.ajax({
                           type: "POST",
                           url : "<?php echo site_url(); ?>pembayaran/tahun",
                           data: id_ta,
                           success: function(msg){
                           $('#kelas').html(msg);
                           }
                        });
                          });
               </script>
    </div>
</div>