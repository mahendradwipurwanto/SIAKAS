<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <span class="fa fa-arrow-left"></span>
            <li><a href="<?php echo site_url('setting')?>"><strong>Pengaturan</strong></a></li>
            <li class="active">Backup & Restore Database</li>
        </ol>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h4><b>Backup & Restore Database</b></h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="bs-callout bs-callout-info">
                    <h4><a data-toggle="collapse" data-target="#cara-backup">Cara backup</a></h4>
                    <div id="cara-backup" class="collapse">
                        <hr style="margin-top:0px;margin-bottom: 10px;">
                        <ol>
                            <li>
                                <b>Masuk ke halaman phpmyadmin</b>
                                <ul>
                                    <li>Jika aplikasi masih dilocal, phpmyadmin dapat diakses dengan cara menuju ke alamat http://localhost/phpmyadmin</li>
                                    <li>Jika sudah berada dihosting, silakan menuju ke cpanel kemudian pilih menu phpmyadmin</li>
                                </ul>
                            </li>
                            <li>
                                <b>Pilih database yang anda gunakan</b><br><br>
                                <img src="<?php echo base_url();?>assets/backend/images/backup/backup-pilih-database.png" class="img-responsive">
                            </li>
                            <li>
                                <b>Pilih menu export</b><br><br>
                                <img src="<?php echo base_url();?>assets/backend/images/backup/backup-pilih-export.png" class="img-responsive">
                            </li>
                            <li>
                                <b>Klik tombol go</b><br><br>
                                <img src="<?php echo base_url();?>assets/backend/images/backup/backup-pilih-go.png" class="img-responsive">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="bs-callout bs-callout-warning">
                    <h4>Cara restore</h4>
                    <hr style="margin-top:0px;margin-bottom: 10px;">
                    <b><a data-toggle="collapse" data-target="#cara-restore-1">- Kondisi aplikasi masih dilocalhost</a></b>
                    <div id="cara-restore-1" class="collapse">
                        <ol>
                            <li>
                                <b>Masuk ke halaman phpmyadmin dengan cara menuju ke alamat http://localhost/phpmyadmin</b>
                            </li>
                            <li>
                                <b>Buat database baru</b>
                                <ul style="list-style: none;">
                                    <li><img src="<?php echo base_url();?>assets/backend/images/backup/restore-local-buat-db.png" class="img-responsive"></li>
                                    <li><br><br><img src="<?php echo base_url();?>assets/backend/images/backup/restore-local-buat-db-2.png" class="img-responsive"></li>
                                </ul>
                            </li>
                            <li>
                                <b>Import file</b>
                                <ul style="list-style: none;">
                                    <li><img src="<?php echo base_url();?>assets/backend/images/backup/restore-local-import-file.png" class="img-responsive"></li>
                                    <li><br><br><img src="<?php echo base_url();?>assets/backend/images/backup/restore-local-import-file-2.png" class="img-responsive"></li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <br>

                    <b><a data-toggle="collapse" data-target="#cara-restore-3">- Sesuaikan konfigurasi database pada file application/config/database.php</a></b>
                    <div id="cara-restore-3" class="collapse">
                        <br>
                        <img src="<?php echo base_url();?>assets/backend/images/backup/restore-host-config.png" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>