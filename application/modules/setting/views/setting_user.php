<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb alert alert-white" role="alert">
			<li><a href="#" onclick="history.back(-1)"><strong><i class="fa fa-arrow-left"></i> Pengaturan</strong></a></li>
			<li class="active">Setting Credentials</li>
		</ol>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="well well-small well-box">
            <b><i class="fa fa-user"></i> Data User</b>
            <hr>
            	<form action="<?php echo site_url('setting/update_datauser')?>" method="POST" class="form-horizontal">
					<?php foreach ($data_user as $data) { ;?>
						<?php if($edit_username == '1'){ ?>
						<div class="form-group">
							<span class="control-label col-sm-4">Username <span class="text text-danger">*</span></span>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="username" value="<?php echo $data->username?>">
							</div>
						</div>
						<hr>
						<?php }else{} ?>
						<div class="form-group">
							<span class="control-label col-sm-4">Password <span class="text text-danger">*</span></span>
							<div class="col-sm-6">
								<input type="text" class="form-control" minlength="8" name="password" placeholder="" required="required">
								<span class="text text-danger">minimal panjang karakter 8 digit</span>
							</div>
						</div>
						<hr>
						<button type="submit" class="btn btn-primary pull-right">Update Data Diri</button>
						<br>
						<br>
					<?php }?>
				</form>
        </div>
    </div>
</div>