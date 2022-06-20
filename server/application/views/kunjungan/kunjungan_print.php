<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>

    </head>
    <body>
        <div class="content-header">
            <h2 style="margin-top:0px; text-align:center">Daftar Pengunjung <?php echo date("j F Y", strtotime($_GET['tanggal1'])) ." - ". date("j F Y", strtotime($_GET['tanggal2']))?></h2>
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div>
        <!-- <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kunjungan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kunjungan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kunjungan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div> -->
        <table id="example" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="width:0%">No</th>
		<th>Nama Tamu</th>
		<th>Jenis Tamu</th>
		<th>Waktu</th>
		<th>Foto</th>
		<th>Penerima Tamu</th>
		<th>Tujuan Kunjungan</th>
		<th>No Hp Tamu</th>
		<th>Alamat Tamu</th>
		<th>Created At</th>
		<th>Created By</th>
		<th>Ket Tambahan</th>
		<!-- <th>Action</th> -->
            </tr><?php
            foreach ($kunjungan_data as $kunjungan)
            {
                ?>
                <tr id='<?php echo $kunjungan->id?>'>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kunjungan->tamu ?></td>
			<td><?php echo $kunjungan->jenis_tm ?></td>
			<td><?php echo date('d-m-Y H:i:s', strtotime($kunjungan->waktu));?></td>
			<td><img src="<?=site_url()?>assets/foto_tamu/<?php echo $kunjungan->foto?>" class="img-fluid" width="200px" ></td>
			<td><?php echo $kunjungan->nama ?></td>
			<td><?php echo $kunjungan->tujuan_kunjungan ?></td>
			<td><?php echo $kunjungan->no_hp_tamu ?></td>
			<td><?php echo $kunjungan->alamat_tamu ?></td>
			<td><?php echo date('d-m-Y H:i:s', strtotime($kunjungan->created_at));?></td>
			<td><?php echo $kunjungan->created_by ?></td>
			<td><?php echo $kunjungan->ket_tambahan ?></td>
			<!--<td style="text-align:center" width="50px">-->
				<?php 
				 //echo anchor(site_url('kunjungan/read/'.$kunjungan->id),'Read'); 
				 //echo ' | '; 
				//echo anchor(site_url('kunjungan/update/'.$kunjungan->id),'Update'); 
				//echo ' | '; 
				//echo anchor(site_url('kunjungan/delete/'.$kunjungan->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
                <!-- <a href="<?php echo site_url('kunjungan/read/'.$kunjungan->id) ?>" class="btn btn-info"><i class="far fa-file-alt"></i> Detail</a><br>
                <a href="<?php echo site_url('kunjungan/update/'.$kunjungan->id) ?>" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a><br>
                <a href="#" class="remove btn btn-danger" ><i class="far fa-trash-alt"></i> Hapus</a> -->
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <!-- <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div> -->
        </div>
        
        
        <script>
            window.addEventListener("load", window.print());
        </script>
    </body>
</html>