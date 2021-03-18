<!DOCTYPE html>
<!-- @copyright Mahendra Dwi Purwanto 2017 -->
<?php $this->benchmark->mark('code_start'); {?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIA | KAS - Sistem Informasi Administrasi Keuangan Sekolah</title>
</head>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/backend/images/favicon.ico">

    <!-- Global-CSS -->
    <link href="<?php echo base_url(); ?>assets/backend/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/backend/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/backend/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/datatable/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/backend/js/plugin/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
    <!-- End-Global-CSS -->

    <!-- Java-Script -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugin/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugin/datatable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugin/datatable/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugin/ckeditor/style.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugin/daterangepicker/jquery.daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/bootstrap.js"></script>
    <!-- End-Java-Script -->

    <!-- JS PLUGIN -->

     <script>  
         $(document).ready(function(){  
              $('#table').DataTable();  
         });  
     </script>
     <script>
         $(document).ready(function() {
            $('#table-scroll').DataTable( {
                "scrollX": true,
            } );
        } );
     </script>
     <script>
         $(document).ready(function() {
            $('#table-scroll-minimaze').DataTable( {
                "scrollX": true,
                "paging": false,
                "searching": false
            } );
        } );
     </script>
     <script>
         $(document).ready(function() {
            $('#table-scroll-minimaze2').DataTable( {
                "scrollX": true,
                "paging": false,
                "searching": false
            } );
        } );
     </script>
     <script>
         $(document).ready(function() {
            $('#table-scroll-minimaze3').DataTable( {
                "scrollX": true,
                "paging": false,
                "searching": false
            } );
        } );
     </script>

     <script>
         $(document).ready(function() {
            $('#table-scroll-minimze').DataTable( {
                "scrollY": "200%",
                "scrollX": true,
                "paging": false,
                "searching": false,
            } );
        } );
     </script>

     <script>
         $(document).ready(function() {
            $('#table-scroll-2').DataTable( {
                "scrollY": "200%",
                "scrollX": true,
                "paging": false,
                "searching": true,
            } );
        } );
     </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#loader").hide();
            function tampilPengumuman(){                 
                $.ajax({
                    type:'POST',
                    url:'<?php echo site_url('template/tampil_pengumuman');?>',
                    success:function(rs){
                        $("#isi").html(rs);
                    }
                });
            }       
            setInterval(function(){
                tampilPengumuman();
                $('#isiw').empty(); 
            },1000);    
        });
        
    </script>

    <!-- JS END PLUGIN -->

<body> 
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <div class="collapse navbar-collapse">
                    <h4 class="navbar-text"> SIAKAS - Sistem Informasi Administrasi Sekolah</h4>
                </div>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-hed navbar-brand" href="#">SIAKAS</a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url('setting/list_pengumuman')?>"><b class="upper"><i class="fa fa-bullhorn fa-lg"></i> <span class="badge" id="isi">   </span></b></a></li>
                    <li><a href="<?php echo site_url('dashboard')?>"><b class="upper"><i class="fa fa-desktop fa-lg"></i></b></a></li>
                    <li><a href="#"><b class="upper"> <?php echo $username;?></b></a></li>
                    <li><a href="<?php echo site_url('setting')?>"><b class=""><i class="fa fa-wrench fa-lg"></i> Setting</b></a></li>
                    <li><a href="<?php echo site_url('logout')?>"><b class=""><i class="fa fa-power-off fa-lg"></i> Logout</b></a></li>
                </ul>
            </div>
        </div>
    </div>
    <b id="isiw"></b>

    <div class="wrapper">
        <div class="container">

            <?php $this->load->view($module.'/'.$fileview); ?>

        </div>
    </div>

    <div class="footer">
        <div class="container">
            <center>
                <b class="copyright"> Copyright ©2017 SMKN 8 Malang <p>by Mahendra Dwi Purwanto </p> <a href="">Creative Crew</a> </b> All rights reserved.<br>
                <a href="">Versi 1.0</a> | Page loaded in <?php echo $this->benchmark->elapsed_time('code_start', 'code_end'); ?> seconds.
            </center>
        </div>
    </div>
</body>
</html>
<?php } $this->benchmark->mark('code_end'); ?>