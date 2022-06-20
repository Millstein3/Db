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
        <center><h2 style="margin-top:0px"><?php echo $button ?> Penerima tamu </h2></center>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIP <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" minlength="10" maxlength="15" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for=Gender>Gender <?php echo form_error('Gender') ?></label>
            <select name="gender" id="gender" type="int" class="form-control" style="margin-bottom:10px" value="<?php echo $gender; ?>">
            <option value="1">L</option>
            <option value="2">P</option>
            <script>
            var options = document.getElementById("gender").options;
            for (var i = 0; i < options.length; i++) {
            if (options[i].value == <?php echo $gender; ?>) {
                options[i].selected = true;
                break;
            }
            }
        </script>
        <br><br>
        </div>
	    <input type="hidden" name="id_penerima" value="<?php echo $id_penerima; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penerima_tamu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>