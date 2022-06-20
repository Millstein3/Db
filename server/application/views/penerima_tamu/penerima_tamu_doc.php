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
        <h2>Penerima_tamu List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Nip</th>
		<th>No Hp</th>
		<th>Alamat</th>
		<th>Gender</th>
		
            </tr><?php
            foreach ($penerima_tamu_data as $penerima_tamu)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penerima_tamu->nama ?></td>
		      <td><?php echo $penerima_tamu->nip ?></td>
		      <td><?php echo $penerima_tamu->no_hp ?></td>
		      <td><?php echo $penerima_tamu->alamat ?></td>
		      <td><?php echo $penerima_tamu->gender ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>