<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Kasir</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<?php
    if(!isset($_SESSION["kasir"])){
      header("location:../../index.php"); 
    }
  ?>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>ST</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Fashion</b> Store</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include("sidebar.php")?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pembayaran
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Struk</h3>
            </div>
            <div class="box-footer">
             </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
            require "../../model/modeltransaksi.php";
            $id_pesan=$_GET["idpesan"];
            $idtransaksi=$_GET["idtransaksi"];
            $objek=new modeltransaksi();
            $objek->selectdetail($id_pesan);
            $objek->selecttransaksi($idtransaksi);
            $datatransaksi = $objek->getdetailtransaksi();
            $datadetail = $objek->getdetail(); 
            ?>
            <from>
                <div class="row">
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Id Transaksi</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["ID_TRANSAKSI"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Id Pesan</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["ID_PESAN"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["NAMA_PELANGGAN"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Total</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["TOTAL"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Bayar</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["BAYAR"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Kembali</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["KEMBALI"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Tanggal</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["TANGGAL"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Nama Kasir</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["NAMA_KASIR"]?>"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="from-group">
                                <label>Nama Sales</label>
                                <input type="text" name="idtransaksi" class="form-control" readonly value="<?php echo $datatransaksi["NAMA_SALES"]?>"> 
                            </div>
                        </div>
                </div>
            </form>
            </br>
            <table class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nama Barang</th>
                          <th>harga Barang</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                      </tr>
                  </thead>
                  <tbody>
              <?php
                    
              foreach ($datadetail as $key) {
                ?>
              <tr>
                  <td><?php echo $key['NAMA_BARANG'] ?></td>
                  <td>Rp. <?php echo $key['HARGA_BARANG'] ?></td>
                  <td><?php echo $key['QTY'] ?></td>
                  <td>Rp. <?php echo $key['SUBTOTAL'] ?></td>
              </tr>
              
              <?php }?>  
              
              </tbody>
                  <tfoot>
                      <tr>
                          <th colspan="3">Total</th>
                          <th>Rp. <?php echo $datatransaksi["TOTAL"]?></th>
                      </tr>
                  </tfoot>
            </table>
            <button onclick="window.print()">Print</button>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
