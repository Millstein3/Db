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
        <h2 style="margin-top:0px">Jenis_tamu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Jenis Tamu <?php echo form_error('id_jenis_tamu') ?></label>
            <input type="text" class="form-control" name="id_jenis_tamu" id="id_jenis_tamu" placeholder="Id Jenis Tamu" value="<?php echo $id_jenis_tamu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Tm <?php echo form_error('jenis_tm') ?></label>
            <input type="text" class="form-control" name="jenis_tm" id="jenis_tm" placeholder="Jenis Tm" value="<?php echo $jenis_tm; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_tamu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>