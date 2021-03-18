    <div class="row">
        <div class="col-md-4 col-md-offset-8" style="margin-top: 5%;">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Login SIAKAS</b>
                    </div>
                    <form action="<?php echo site_url('login/proses');?>" method="post" class="form">
                    <div class="panel-body">
                        <?php if (validation_errors() || $this->session->flashdata('result_login')) { ?> 
                        <!-- Menampilkan Pesan Error -->
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Login Gagal!</strong>
                                <?php echo validation_errors(); ?>
                                <?php echo $this->session->flashdata('result_login'); ?>
                            </div>
                        <!-- Menampilkan Pesan Error -->
                        <?php } ?>

                        <div class="form-group">
                            <input type="text" name="username" class="form-control input-md" placeholder="Username" autofocus="autofocus">
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control input-md" placeholder="Password">
                        </div>
                            <?php echo form_error('password'); ?>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Login</button>
                            <a href="<?php echo base_url();?>login/register">Lupa password?</a>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>