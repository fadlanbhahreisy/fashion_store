<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Tugas Web</title>
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top id="mainNav">
        <div class="container">
        <a class="navbar-brand" href="#page-top">TOKO FASHION ALAN</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger" href="#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#adminmodal"href="#">Admin</button>
                  
                  <div class="dropdown-divider"></div>
                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#salesmodal"href="#">Sales</button>
                  <div class="dropdown-divider"></div>
                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#kasirmodal"href="#">Kasir</button>
                </div>
              </li>
          </ul>
        </div>
        </div> 
      </nav>

      <div class="modal fade" id="adminmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="prosess/proseslogin.php?aksi=loginadmin" method="post">
                <div class="from-group">
                  <label>Username</label>
                  <input type="text" name="usernameadmin" id="usernameadmin" class="form-control" placeholder="masukkan username anda"> 
                </div>
                <div class="from-group">
                  <label>Password</label>
                  <input type="password" name="passwordadmin" id="passwordadmin" class="form-control" placeholder="masukkan password anda"> 
                </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">reset</button>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
           </form>
          </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="salesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login Sales</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="prosess/proseslogin.php?aksi=loginsales" method="post">
              <div class="from-group">
                <label>Username</label>
                <input type="text" name="usernamesales" class="form-control" placeholder="masukkan username anda"> 
              </div>
              <div class="from-group">
                <label>Password</label>
                <input type="password" name="passwordsales" class="form-control" placeholder="masukkan password anda"> 
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="kasirmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login Kasir</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="prosess/proseslogin.php?aksi=loginkasir" method="post">
              <div class="from-group">
                <label>Username</label>
                <input type="text" name="usernamekasir" class="form-control" placeholder="masukkan username anda"> 
              </div>
              <div class="from-group">
                <label>Password</label>
                <input type="password" name="passwordkasir" class="form-control" placeholder="masukkan password anda"> 
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
      
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-4">SISTEM INFORMASI</h1>
        <hr class="my-4">
        <p>TOKO FASHION</p>
        
        </div>
        
      </div>

     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>