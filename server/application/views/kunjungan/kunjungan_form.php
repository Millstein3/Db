<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <!--<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>-->
    </head>
    <body>
        <center><h2 style="margin-top:0px"><?php echo $button?> Kunjungan</h2></center>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Nama Tamu <?php echo form_error('tamu') ?></label>
            <input type="text" class="form-control" name="tamu" id="tamu" placeholder="Tamu" value="<?php echo $tamu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jenis Tamu <?php echo form_error('penerima_tamu') ?></label>
            <?=form_dropdown('jenis_tamu', get_combo('jenis_tamu', 'id_jenis_tamu', 'jenis_tm'),$penerima_tamu, array('class'=>"form-control", 'id'=>"penerima_tamu"))?>
        </div>
	    <div class="form-group">
            <label for="datetime">Waktu <?php echo form_error('waktu') ?></label>
            <input type="datetime-local" style="width: 180px;" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
        </div>
	    <div class="form-group" action="<?php echo base_url().'ControllerName/updateImageData/'.$id;?>" enctype="multipart/form-data">
            <label for="varchar">Foto</label>
            <div class="fp-navbar bg-faded card mb-0">
            <input type="hidden" class="form-control" name="foto_oldimage" id="foto_oldimage" value="<?php echo $foto; ?>" />
            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>">
            <div class="image-preview" id="imagePreview">
            <div class="fm-empty-container">
               <!-- <a href="<?php echo site_url('application/views/kunjungan/test')?> " class="btn btn-info" target="_blank">Capture Kamera</a> -->
        </div>
                <center><img src= '<?php echo base_url('assets/foto_tamu/').$foto?>' class="image-preview__image" style ="width:400px; padding:5px"></center>
                <span class="image-preview__default-text"></span>
            </div>
            <script>
                const foto = document.getElementById("foto");
                const previewContainer = document.getElementById("imagePreview");
                const previewImage = previewContainer.querySelector(".image-preview__image");
                const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

                foto.addEventListener("change", function() {
                    const file = this.files[0];

                    if (file){
                        const reader = new FileReader();

                        previewDefaultText.style.display = "none";
                        previewImage.style.display ="block";

                        reader.addEventListener("load", function(){
                            console.log(this);
                            previewImage.setAttribute("src", this.result);
                        });
                        reader.readAsDataURL(file);
                    } else {
                        previewDefaultText.style.display = "null";
                        previewImage.style.display ="null";
                    }
                });
            </script>
                        <script> /*
                const [preview, output, capture, result] = [
                    document.getElementById('preview'),
                    document.getElementById('output'),
                    document.getElementById('capture'),
                    document.getElementById('result')
                ]
                navigator.mediaDevices.getUserMedia({
                    audio:false,
                    video: {
                        width : 400,
                        height : 400
                    }
                })
                .then(stream => {
                    preview.srcObject = stream;
                    preview.play();
                })
                .catch(error => {
                    console.error(error);
                });

                capture.addEventListener('click', () => {
                    const context = output.getContext('2d');
                    output.width = 400;
                    output.height = 400;

                    context.drawImage(preview, 0, 0, output.width, output.height);
                    result.src = output.toDataURL();
                });
            */</script>
        </div>
	    <div class="form-group">
            <label for="int">Penerima Tamu <?php echo form_error('penerima_tamu') ?></label>
            <?=form_dropdown('penerima_tamu', get_combo('penerima_tamu', 'id_penerima', 'nama'),$penerima_tamu, array('class'=>"form-control", 'id'=>"penerima_tamu"))?>
        </div>
	    <div class="form-group">
            <label for="varchar">Tujuan Kunjungan <?php echo form_error('tujuan_kunjungan') ?></label>
            <input type="text" class="form-control" name="tujuan_kunjungan" id="tujuan_kunjungan" placeholder="Tujuan Kunjungan" value="<?php echo $tujuan_kunjungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp Tamu <?php echo form_error('no_hp_tamu') ?></label>
            <input type="number" class="form-control" name="no_hp_tamu" id="no_hp_tamu" minlength="10" maxlength="15" placeholder="No Hp Tamu" value="<?php echo $no_hp_tamu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Tamu <?php echo form_error('alamat_tamu') ?></label>
            <input type="text" class="form-control" name="alamat_tamu" id="alamat_tamu" placeholder="Alamat Tamu" value="<?php echo $alamat_tamu; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="datetime">Created At <?php echo form_error('created_at') ?></label>
            <input type="datetime-local" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div> -->
	    <!-- <div class="form-group">
            <label for="varchar">Created By <?php echo form_error('created_by') ?></label>
            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Ket Tambahan <?php echo form_error('ket_tambahan') ?></label>
            <input type="text" class="form-control" name="ket_tambahan" id="ket_tambahan" placeholder="Ket Tambahan" value="<?php echo $ket_tambahan; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kunjungan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>