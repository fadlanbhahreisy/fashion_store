<?php
session_start();
require "../model/modeltransaksi.php";

class prosesbarang{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objtran = new modeltransaksi();
        if($this->action="bayar"){
            $idtransaksi=$_POST["idtransaksi"];
            $bayar=$_POST["bayar"];
            $kembali=$_POST["kembali"];
            $idpesan=$_POST["idpesan"];
            $idkasir=$_SESSION["kasir"]["ID_KASIR"];
            $objtran->inserttransaksi($idtransaksi,$bayar,$kembali,$idpesan,$idkasir);
            header("location:../views/viewkasir/datatransaksi.php");
        }
    }
}
$objprosesbarang = new prosesbarang($_GET['aksi']);
$objprosesbarang->proses();

?>