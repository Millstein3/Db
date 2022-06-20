<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Kunjungan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tamu</th>
		<th>Jenis Tamu</th>
		<th>Waktu</th>
		<th>Foto</th>
		<th>Penemu Tamu</th>
		<th>Tujuan Kunjungan</th>
		<th>No Hp Tamu</th>
		<th>Alamat Tamu</th>
		<th>Created At</th>
		<th>Created By</th>
		<th>Ket Tambahan</th>
		
            </tr><?php
            foreach ($kunjungan_data as $kunjungan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kunjungan->tamu ?></td>
		      <td><?php echo $kunjungan->jenis_tamu ?></td>
		      <td><?php echo $kunjungan->waktu ?></td>
		      <td><?php echo $kunjungan->foto ?></td>
		      <td><?php echo $kunjungan->penerima_tamu ?></td>
		      <td><?php echo $kunjungan->tujuan_kunjungan ?></td>
		      <td><?php echo $kunjungan->no_hp_tamu ?></td>
		      <td><?php echo $kunjungan->alamat_tamu ?></td>
		      <td><?php echo $kunjungan->created_at ?></td>
		      <td><?php echo $kunjungan->created_by ?></td>
		      <td><?php echo $kunjungan->ket_tambahan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>