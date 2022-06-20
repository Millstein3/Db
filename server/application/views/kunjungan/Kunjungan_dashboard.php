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

          <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/summernote/summernote-bs4.min.css">
  
    </head>
    <body>
  
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <center><h1 style="margin-top:0px">Dashboard<h1></center><br><br>
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-address-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Kunjungan</span>
                <span class="info-box-number">
                <?php echo $total_rows ?>
                  <small>Kunjungan</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-desktop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kunjungan TIK</span>
                <span class="info-box-number">
                <?php $this->db->where('jenis_tamu =', 1);
                $query = $this->db->get('kunjungan');
                echo $query->num_rows(); ?>
                <small>Kunjungan</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kunjungan Pemkab Lain</span>
                <span class="info-box-number">
                <?php $this->db->where('jenis_tamu =', 2);
                $query = $this->db->get('kunjungan');
                echo $query->num_rows(); ?>
                <small>Kunjungan</small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kunjungan Vendor</span>
                <span class="info-box-number">
                <?php $this->db->where('jenis_tamu =', 3);
                $query = $this->db->get('kunjungan');
                echo $query->num_rows(); ?>
                <small>Kunjungan</small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <?php 
    //$dataKunjunganChart = $this->db->get("kunjungan")->result();
    //print_r($dataKunjunganChart);die();
    ?>

<!-- <!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Grafik Laporan Pengunjung Server"
	},
	axisX: {
		minimum: new Date(2015, 01, 25),
		maximum: new Date(2017, 02, 15),
		valueFormatString: "MMM YY"
	},
	axisY: {
		title: "Number of Sales",
		titleFontColor: "#4F81BC",
		includeZero: true,
		suffix: "mn"
	},
	data: [{
		indexLabelFontColor: "darkSlateGray",
		name: "views",
		type: "area",
		yValueFormatString: "#,##0.0mn",
		dataPoints: [
			{ x: new Date(2015, 02, 1), y: 74.4, label: "Q1-2015" },
			{ x: new Date(2015, 05, 1), y: 61.1, label: "Q2-2015" },
			{ x: new Date(2015, 08, 1), y: 47.0, label: "Q3-2015" },
			{ x: new Date(2015, 11, 1), y: 48.0, label: "Q4-2015" },
			{ x: new Date(2016, 02, 1), y: 74.8, label: "Q1-2016" },
			{ x: new Date(2016, 05, 1), y: 51.1, label: "Q2-2016" },
			{ x: new Date(2016, 08, 1), y: 40.4, label: "Q3-2016" },
			{ x: new Date(2016, 11, 1), y: 45.5, label: "Q4-2016" },
			{ x: new Date(2017, 02, 1), y: 78.3, label: "Q1-2017", indexLabel: "Highest", markerColor: "red" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<br>
        <br> -->

        

       <!--  <center><h2 style="margin-top:0px">Daftar Pengunjung<h2></center> -->
        <!-- <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kunjungan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div> -->
            <!-- <div class="col-md-1 text-right">
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

       <!-- <section class="col-lg-7 connectedSortable">
        <div class="col-lg-10">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">-->
                <center><h2 style="margin-top:0px">Pengunjung Terbaru<h2></center>
                  </div>
                 <!-- </div> -->
                  

        <table id="example" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="width:0%">No</th>
		<th>Nama Tamu</th>
		<th>Jenis Tamu</th>
		<th>Waktu</th>
		<!-- <th>Foto</th> -->
		<th>Penerima Tamu</th>
		<th>Tujuan Kunjungan</th>
		<!-- <th>No Hp Tamu</th> -->
		<!--  <th>Alamat Tamu</th> -->
		<th>Created At</th>
		<!-- <th>Created By</th>
		<!-- <th>Ket Tambahan</th> -->
		<!--<th>Action</th> -->
            </tr>
                            </thead>
                            <tbody><?php
            foreach ($kunjungan_data as $kunjungan )
            {
                ?>
                <tr id='<?php echo $kunjungan->id?>'>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kunjungan->tamu ?></td>
			<td><?php echo $kunjungan->jenis_tm ?></td>
			<td><?php echo date('d-m-Y H:i:s', strtotime($kunjungan->waktu));?></td></td>
			<!-- <td><img src="<?=site_url()?>assets/foto_tamu/<?php echo $kunjungan->foto?>" class="img-fluid" width="500px" ></td> -->
			<td><?php echo $kunjungan->nama ?></td>
			<td><?php echo $kunjungan->tujuan_kunjungan ?></td>
			<!-- <td><?php echo $kunjungan->no_hp_tamu ?></td> -->
			<!-- <td><?php echo $kunjungan->alamat_tamu ?></td> -->
			<td><?php echo date('d-m-Y H:i:s', strtotime($kunjungan->created_at));?></td>
			<!-- <td><?php echo $kunjungan->created_by ?></td> -->
			<!-- <td><?php echo $kunjungan->ket_tambahan ?></td> -->
			<!-- <td style="text-align:center" width="200px">
				<?php 
				 //echo anchor(site_url('kunjungan/read/'.$kunjungan->id),'Read'); 
				 //echo ' | '; 
				//echo anchor(site_url('kunjungan/update/'.$kunjungan->id),'Update'); 
				//echo ' | '; 
				//echo anchor(site_url('kunjungan/delete/'.$kunjungan->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
                <a href="<?php echo site_url('kunjungan/read/'.$kunjungan->id) ?>" class="btn btn-info"><i class="far fa-file-alt"></i> </a>
                <a href="<?php echo site_url('kunjungan/update/'.$kunjungan->id) ?>" class="btn btn-warning"><i class="far fa-edit"></i> </a>
                <a "#" class="remove btn btn-danger" ><i class="far fa-trash-alt"></i></a>
			</td> -->
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
       <!-- <div class="row">
            <div class="col-md-6">
                <a "#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php //echo $pagination ?>
            </div>
        </div> -->
        </div>

        <div class="row" style="text-align:center">
            <div class="col">
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Waktu</h3>
                </div>
                <div class="card-body">
                <a href="https://time.is/Manggung,_Indonesia" id="time_is_link" rel="nofollow" style="font-size:29px">Waktu di Temanggung:</a>
                <span id="Manggung__Indonesia_z41c" style="font-size:29px"></span>
                <script src="//widget.time.is/id.js"></script>
                <script>
                time_is_widget.init({Manggung__Indonesia_z41c:{template:"TIME<br>DATE", date_format:"dayname, monthname dnum, year"}});
                </script>
              </div>
            </div>
          </div>
            <div class="col">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cetak Laporan Tamu</h3>
              </div>
              <div class="card-body">
              <form action="print" method="get" target="_blank">
                <div class="form-group">
                  <label>Pilih Rentang Tanggal:</label><br>
                  <input type="date" class="" name="tanggal1" id="tanggal1" placeholder="tanggal1" style="width: max-content;" value=""> - 
                  <input type="date" class="" name="tanggal2" id="tanggal2" placeholder="tanggal2" style="width: max-content;" value="">
                  <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
                </form>
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
            url: '<?=base_url("kunjungan/delete/")?>'+id,
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

              <!-- </div>
              </div>
        </div><!-- /.card-header -->
    </section>
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <!-- <section class="col-lg-5 connectedSortable">

                <!-- Calendar -->
              <!--   <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <!-- <div class="card-tools">
                  <!-- button with a dropdown -->
                <!--   <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
             <!--  </div>
              <!-- /.card-header -->
              <!-- <div class="card-body pt-0">
                <!--The calendar -->
               <!--  <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            <!-- </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        <!-- </div>
        <!-- /.container-fluid -->
   <!--  </section> -->
    <!-- /.content -->

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

    <!-- jQuery -->
<script href="<?=base_url()?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script href="<?=base_url()?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script href="<?=base_url()?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script href="<?=base_url()?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script href="<?=base_url()?>assets/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script href="<?=base_url()?>assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script href="<?=base_url()?>assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script href="<?=base_url()?>assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script href="<?=base_url()?>assets/adminlte/plugins/moment/moment.min.js"></script>
<script href="<?=base_url()?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script href="<?=base_url()?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script href="<?=base_url()?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script href="<?=base_url()?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script href="<?=base_url()?>assets/adminlte/dist/js/adminlte.js"></script>

    <script>
  $(function () {
    $("#example").DataTable({
     "paging" : false, "searching": false, "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": false, "info" : false
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
});
    </script>
    </body>
</html>
