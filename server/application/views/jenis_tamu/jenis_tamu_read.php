<!doctype html>
<html>
    <head>
        <!-- <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style> -->
    </head>
    <body>
        <center><h2 style="margin-top:0px">Jenis_tamu Read</h2></center>
        <table class="table">
	    <tr><td>Id Jenis Tamu</td><td><?php echo $id_jenis_tamu; ?></td></tr>
	    <tr><td>Jenis Tm</td><td><?php echo $jenis_tm; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_tamu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>