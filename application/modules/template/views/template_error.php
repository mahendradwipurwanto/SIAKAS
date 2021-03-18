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
    <link href="<?php echo base_url(); ?>assets/backend/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/datatable/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- End-Global-CSS -->

    <!-- Java-Script -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/datatable/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/datatable/datatable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/datatable/datatable/dataTables.fixedColumns.min.js"></script>
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
                "scrollX": true
            } );
        } );
     </script>
     <script>  
         $(document).ready(function() {
            $('#table-minimize').DataTable( {
                "scrollY": "300px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging": false,
                "searching": false
            } );
        } );
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
                    <li><a href="<?php echo site_url('login/register')?>"><b class="upper">Register</b></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">

            <?php $this->load->view($module.'/'.$fileview); ?>

        </div>
    </div>

    <div class="footer">
        <div class="container">
            <center>
                <b class="copyright"> Copyright ©2017 SMKN 8 Malang by Mahendra Dwi Purwanto - <a href="">Creative Crew</a> </b> All rights reserved.<br>
                <a href="">Versi 1.0</a> | Page loaded in <?php echo $this->benchmark->elapsed_time('code_start', 'code_end'); ?> seconds.
            </center>
        </div>
    </div>
</body>
</html>
<?php } $this->benchmark->mark('code_end'); ?>