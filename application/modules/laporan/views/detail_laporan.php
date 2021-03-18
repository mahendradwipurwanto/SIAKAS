<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <li><a href="#" onclick="history.back(-1)"><strong><i class="fa fa-arrow-left"></i> Laporan</strong></a></li>
            <li class="active">Detail Laporan <b><?php echo $kode_transaksi?></b></li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
        <div class="well well-small well-box">
				<?php foreach ($data_transaksi as $rows) { ;?>
        	<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="35%"><img src="<?php echo base_url()?>assets/backend/images/kopsurat/eksternal.png" width="280px" height="50px"></td>
                    <td width="35%"><strong style="font-size:18px;">Bukti Setoran</strong></td>
                    <td width="30%" align="right"><span style="font-size:40px;">BNI</span></td>
                </tr>
            </table>
            <hr>
            <br>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="35%"></td>
                    <td width="30%"></td>
                    <td colspan="2" width="35%"><strong><u>Penyetor ( Wajib Diisi ) :</u></strong></td>
                </tr>
                <tr>
                    <td width="35%">Malang, Tgl <?php echo $rows->tanggal_pembayaran?></td>
                    <td width="30%"></td>
                    <td width="10%">Nama</td>
                    <td width="25%">: Mahendra Dwi Purwanto</td>
                </tr>
                <tr>
                    <td colspan="2" width="65%"></td>
                    <td width="10%">NIS</td>
                    <td width="25%">: <?php echo $rows->nis?></td>
                </tr>
                <tr>
                    <td colspan="2" width="65%"></td>
                    <td width="10%">Kelas</td>
                    <td width="25%">: XII RPL C</td>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                <tr>
                    <td width="42%"></td>
                    <td width="13%"><strong>1 SPP</strong></td>
                    <td width="8%"><strong>Rekening</strong></td>
                    <td width="10%"><strong>340099910</strong></td>
                    <td width="12%"><strong>bulan <?php echo $rows->bulan?></strong></td>
                    <td width="15%"><strong>Rp <?php echo $rows->jumlah_pembayaran?></strong></td>
                </tr>
                <tr>
                    <td width="42%"></td>
                    <td width="13%"><strong>2 Kesiswaan</strong></td>
                    <td width="8%"><strong>Rekening</strong></td>
                    <td width="10%"><strong>339650716</strong></td>
                    <td width="12%"><strong>bulan .....</strong></td>
                    <td width="15%"><strong>Rp ....................</strong></td>
                </tr>                
                <tr>
                    <td width="42%"></td>
                    <td width="13%"><strong>3 ...........</strong></td>
                    <td width="8%"><strong>Rekening</strong></td>
                    <td width="10%"><strong>..................</strong></td>
                    <td width="12%"><strong>bulan .....</strong></td>
                    <td width="15%"><strong>Rp ....................</strong></td>
                </tr>               
                <tr>
                    <td width="42%"></td>
                    <td width="13%"></td>
                    <td width="8%"></td>
                    <td width="10%"></td>
                    <td width="12%"></td>
                    <td width="15%"><hr></td>
                </tr>              
                <tr>
                    <td width="42%"></td>
                    <td width="13%">Jumlah total</td>
                    <td width="8%"></td>
                    <td width="10%"></td>
                    <td width="12%"></td>
                    <td width="15%">Rp <?php echo $rows->jumlah_pembayaran?>,00,-</td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="41%">
                        <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
                            <tr>
                                <td width="4%"></td>
                                <td width="40%">_________________</td>
                                <td width="8%"></td>
                                <td width="40%">_________________</td>
                                <td width="3%"></td>
                            </tr>
                            <tr>
                                <td width="4%"></td>
                                <td align="center" width="40%">Teller</td>
                                <td width="8%"></td>
                                <td align="center" width="40%">Penyetor</td>
                                <td width="8%"></td>
                            </tr>
                        </table>
                    </td>
                    <td width="59%">
                        <table align="left" width="100%" class="table table-bordered" style="border: 2px solid #000; font-size: 12px;">
                            <tr>
                                <td height="60px"> Terbilang: </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="80%">
                        <table width="100%">
                            <tr>
                                <td><p style="font-size:8px;">Bank telah melaksanakan transaksi sesuai dengan permintaan Penyetor. Sehubungan dengan hal tersebut, Penyetor dengan ini membebaskan bank dari segala tuntutan hukum berkenaan dengan transaksi di atas, Bukti Setoran ini merupakan alat bukti yang sah</p></td>
                            </tr>
                        </table>
                    </td>
                    <td width="20%" style="font-size:8px:">
                        Lembar 1   untuk Bank<br>
                        Lembar 2   untuk Sekolah<br>
                        Lembar 3   untuk Penyetor
                    </td>
                </tr>
            </table>
            <?php }?>
		</div>
	</div>
</div>