<?php
require "../model/modelpelanggan.php";

class prosespelanggan{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelpel=new modelpelanggan();
        
        if ($this->action=="tambah"){
            $idpel=$_POST['inputidpelanggan'];
            $namapel=$_POST['inputnamapelanggan'];
            $notelp=$_POST['inputnotelp'];
            $objmodelpel->insert($idpel,$namapel,$notelp);
            header("location:../views/viewadmin/managepelanggan.php"); 
        }elseif($this->action=="hapus"){
            $idpel=$_GET['idpelanggan'];
            $objmodelpel->delete($idpel);
            header("location:../views/viewadmin/managepelanggan.php"); 
        }elseif($this->action=="edit"){
            $idpel=$_POST['updateidpelanggan'];
            $namapel=$_POST['updatenamapelanggan'];
            $no_telp=$_POST['updatenotelp'];
            $objmodelpel->update($idpel,$namapel,$no_telp);
            header("location:../views/viewadmin/managepelanggan.php"); 
        }
    }
}
$objprosespel = new prosespelanggan($_GET['aksi']);
$objprosespel->proses();
?>