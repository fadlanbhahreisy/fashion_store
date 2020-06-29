<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manage Barang</title>
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
        Manage Barang
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Barang</h3>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add barang</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Barang</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
            require "../../model/modelbarang.php";
            $objbrg=new modelbarang();
            $objbrg->select();
            $objbrg->setidbaru();
            $databarang = $objbrg->getdata();           
              foreach ($databarang as $key) {
                ?>
                <tr>
                  <td><?php echo $key['ID_BARANG'] ?></td>
                  <td><?php echo $key['NAMA_BARANG'] ?></td>
                  <td><?php echo $key['HARGA_BARANG'] ?></td>
                  <td><img src="../image/<?php echo $key["GAMBAR"]?>" width="50" height="50"></td>
                  <td>
                    <a title="edit" class="btn btn-social-icon" data-toggle="modal" href="#updatebarang<?php echo $key['ID_BARANG'] ?>"><i class="fa fa-edit"></i></a>
                    <a title="hapus" class="btn btn-social-icon" href= "../../prosess/prosesbarang.php?aksi=hapus&idbarang=<?php echo $key['ID_BARANG']; ?>"><i class="fa fa-bitbucket"></i></a>
                  </td>
                </tr>
                <div class="modal fade" id="updatebarang<?php echo $key['ID_BARANG'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Barang</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-info">
                            <form class="form-horizontal" action="../../prosess/prosesbarang.php?aksi=edit" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input" class="control-label">Id Barang</label>
                                    <input type="text" class="form-control" id="updateidbarang" name="updateidbarang" value="<?php echo $key['ID_BARANG']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input" class="control-label">Nama Barang</label>
                                        <input type="text" class="form-control" id="updatenamabarang" name="updatenamabarang" value="<?php echo $key['NAMA_BARANG']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="input" class="control-label">Harga Barang</label>
                                        <input type="text" class="form-control" id="updatehargabarang" name="updatehargabarang" value="<?php echo $key['HARGA_BARANG']; ?>">
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <?php }?> 
                </tbody>
                
              </table>
            </div>
                <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Barang</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-info">
                            <form class="form-horizontal" action="../../prosess/prosesbarang.php?aksi=tambah" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label">Id Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputidbarang" name="inputidbarang" value="<?php echo $objbrg->getidbaru();?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputnamabarang" name="inputnamabarang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label">Harga Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputhargabarang" name="inputhargabarang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
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
