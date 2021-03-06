<?php 
session_start();
$konek = oci_connect("fadlan_bhahreisy","fadlan","localhost/XE");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Sales</title>
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
    if(!isset($_SESSION["sales"])){
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
        Keranjang
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales</h3>
            </div>
            <div class="box-footer">
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                  <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor=1;
                    $total_keseluruhan=0;
                    require "../../model/modelpemesanan.php";
                    $objpesan=new modelpemesanan();
                    $objpesan->select();
                    $objpesan->setidbaru();
                    ?>
                    <?php foreach ($_SESSION["cart"] as $id_barang => $jumlah) {?>
                    <?php 
                        $objpesan->selectid($id_barang);
                        $objpesan->setsubtotal($objpesan->viewhargabarang(),$jumlah);
                        
                    ?>
                        <tr>
                            <th scope="row"><?php echo $nomor ?></th>
                            <td><?php echo $objpesan->viewnamabarang() ?></td>
                            <td>Rp. <?php echo $objpesan->viewhargabarang() ?></td>
                            <td><?php echo $jumlah ?></td>
                            <td>Rp. <?php echo $objpesan->getsubtotal() ?></td>
                        </tr>
                    <?php 
                    $nomor++;
                    $total_keseluruhan+=$objpesan->getsubtotal();
                    ?>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total keseluruhan</th>
                            <th>Rp. <?php echo $total_keseluruhan ?></th>
                        </tr>
                    </tfoot>
                </table>
                <form method="post" action="../../prosess/prosespemesanan.php?aksi=act">
                  <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                            <LABEL>Id Pesan</LABEL>
                            <input type="text" name="idpesanan" readonly value="<?php echo $objpesan->getidbaru() ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <LABEL>nama</LABEL>
                          <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["NAMA_PELANGGAN"]?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <LABEL>no telp</LABEL>
                          <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["NO_TELP"]?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <LABEL>tanggal</LABEL>
                          <input type="text" name="tanggalpesan" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <LABEL>sales</LABEL>
                            <input type="text" readonly value="<?php echo $_SESSION["sales"]["NAMA_SALES"]?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <LABEL>total belanja</LABEL>
                            <input type="text" readonly name="totalbelanja" value="<?php echo $total_keseluruhan?>" class="form-control">
                          </div>
                      </div>
                  </div>
                      <button href="" class="btn btn-primary">cetak</button>
                </form>
                </br></br></br>
                
                
            
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
