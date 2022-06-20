<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style> -->
    </head>
    <body>
        <center><h2 style="margin-top:0px">Detail Kunjungan</h2></center>
        <table class="table">
	    <tr><td>Tamu</td><td><?php echo $tamu; ?></td></tr>
	    <tr><td>Jenis Tamu</td><td><?php echo $jenis_tamu; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td>Foto Pendaftar</td><td><img src="<?=site_url()?>assets/foto_tamu/<?php echo $foto?>" class="img-fluid" width="500px" ></td>
	    <tr><td>Penemu Tamu</td><td><?php echo $penerima_tamu; ?></td></tr>
	    <tr><td>Tujuan Kunjungan</td><td><?php echo $tujuan_kunjungan; ?></td></tr>
	    <tr><td>No Hp Tamu</td><td><?php echo $no_hp_tamu; ?></td></tr>
	    <tr><td>Alamat Tamu</td><td><?php echo $alamat_tamu; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Ket Tambahan</td><td><?php echo $ket_tambahan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kunjungan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>