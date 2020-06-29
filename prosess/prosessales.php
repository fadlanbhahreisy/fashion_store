<?php
require "../model/modelsales.php";

class prosessales{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelsal=new modelsales();
        
        if ($this->action=="tambah"){
            $idsales=$_POST['inputidsales'];
            $namasal=$_POST['inputnamasales'];
            $pass=$_POST['inputpasswordsales'];
            $objmodelsal->insert($idsales,$namasal,$pass);
            header("location:../views/viewadmin/managesales.php"); 
        }elseif($this->action=="hapus"){
            $idsales=$_GET['idsales'];
            $objmodelsal->delete($idsales);
            header("location:../views/viewadmin/managesales.php"); 
        }elseif($this->action=="edit"){
            $idSales=$_POST['updateidsales'];
            $namaSales=$_POST['updatenamasales'];
            $pass=$_POST['updatepasssales'];
            $objmodelsal->update($idSales,$namaSales,$pass);
            header("location:../views/viewadmin/managesales.php"); 
        }
    }
}
$objprosessales = new prosessales($_GET['aksi']);
$objprosessales->proses();
?>