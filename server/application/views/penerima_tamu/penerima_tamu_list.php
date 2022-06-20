<?php 
if (!$this->ion_auth->is_admin())
{
  $hidden = 'hidden';
}else{
    $hidden = '';
}
?>

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

        <!-- DataTables -->
        <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
        <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    </head>
    <body>
        <center><h2 style="margin-top:0px">Daftar Penerima Tamu</h2></center>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('penerima_tamu/tambah'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id_penerima="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('penerima_tamu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <!-- <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('penerima_tamu'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?> 
                           <button class="btn btn-primary" type="submit">Search</button>
                        </span> -->
                    </div>
                </form>
            </div>
        </div>
        <table id="example" class="table table-bordered table-striped">
            <thead><tr>
                <th style="width:0%">No </th>
		<th>Nama</th>
		<th>NIP</th>
		<th>No Hp</th>
		<th>Alamat</th>
		<th>Gender</th>
		<th>Action</th>
        </thead>
        <tbody>
            </tr><?php
            foreach ($penerima_tamu_data as $penerima_tamu)
            {
                ?>
                <tr id='<?php echo $penerima_tamu->id_penerima?>'>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $penerima_tamu->nama ?></td>
			<td><?php echo $penerima_tamu->nip ?></td>
			<td><?php echo $penerima_tamu->no_hp ?></td>
			<td><?php echo $penerima_tamu->alamat ?></td>
			<td><?php echo ($penerima_tamu->gender==1?"L":"P") ?></td>
			<td style="text-align:center" width="50px">
				<?php 
				//echo anchor(site_url('penerima_tamu/read/'.$penerima_tamu->id_penerima),'Read'); 
				 //echo ' | '; 
				//echo anchor(site_url('penerima_tamu/update/'.$penerima_tamu->id_penerima),'Update'); 
				//echo ' | '; 
				// echo anchor(site_url('penerima_tamu/delete/'.$penerima_tamu->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
                <a href="<?php echo site_url('penerima_tamu/read/'.$penerima_tamu->id_penerima) ?>" class="btn btn-info"><i class="far fa-file-alt"></i>Detail</a><br>
                <a <?php echo $hidden?> href="<?php echo site_url('penerima_tamu/update/'.$penerima_tamu->id_penerima) ?>" class="btn btn-warning"><i class="far fa-edit"></i>Edit</a><br>
                <a <?php echo $hidden?> href="#" class="remove btn btn-danger" ><i class="far fa-trash-alt"></i>Hapus</a>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>

	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <script type="text/javascript">

    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel it!!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
        $.ajax({
            url: '<?=base_url("penerima_tamu/delete/")?>'+id,
            type: 'GET',
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {
                $("#"+id).remove();
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            }
        });
        } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
    });
    </script>


    <!-- DataTables  & Plugins -->
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
  $(function () {
    $("#example").DataTable({
        "paging" : false, "searching": false, "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
});
    </script>
    </body>
</html>