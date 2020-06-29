<?php
require "../model/modelkasir.php";

class proseskasir{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelkasir=new modelkasir();
        
        if ($this->action=="tambah"){
            $idkasir=$_POST['inputidkasir'];
            $namakasir=$_POST['inputnamakasir'];
            $passkasir=$_POST['inputpasswordkasir'];
            $objmodelkasir->insert($idkasir,$namakasir,$passkasir);
            header("location:../views/viewadmin/managekasir.php"); 
        }elseif($this->action=="hapus"){
            $idkasir=$_GET['idkasir'];
            $objmodelkasir->delete($idkasir);
            header("location:../views/viewadmin/managekasir.php"); 
        }elseif($this->action=="edit"){
            $idKasir=$_POST['updateidkasir'];
            $namaKasir=$_POST['updatenamakasir'];
            $pass=$_POST['updatepasskasir'];
            $objmodelkasir->update($idKasir,$namaKasir,$pass);
            header("location:../views/viewadmin/managekasir.php"); 
        }
    }
}
$objproseskasir = new proseskasir($_GET['aksi']);
$objproseskasir->proses();
?>