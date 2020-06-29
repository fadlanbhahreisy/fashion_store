<?php
session_start();
//require "../../model/modelkeranjang.php";
class proseskeranjang{
  function cekid(){
      $id_barang = $_GET['id'];
      if(isset($_SESSION['cart'][$id_barang])){
        $_SESSION['cart'][$id_barang]+=1;
      }else{
        $_SESSION['cart'][$id_barang]=1;
      }
  }
}
$obj = new proseskeranjang();
$obj->cekid();
echo "<script>location='keranjang.php';</script>";
?>
                