<?php
require "../model/modelbarang.php";

class prosesbarang{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelbrg=new modelbarang();
        
        if ($this->action=="tambah"){
            $idbrg=$_POST['inputidbarang'];
            $namabrg=$_POST['inputnamabarang'];
            $hargabrg=$_POST['inputhargabarang'];
            $nama = $_FILES['gambar']['name'];
            $lokasi = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($lokasi, "../views/image".$nama);
            $objmodelbrg->insert($idbrg,$namabrg,$hargabrg);
            header("location:../views/viewadmin/managebarang.php"); 
        }elseif($this->action=="hapus"){
            $idbarang=$_GET['idbarang'];
            $objmodelbrg->delete($idbarang);
            header("location:../views/viewadmin/managebarang.php"); 
        }elseif($this->action=="edit"){
            $idBarang=$_POST['updateidbarang'];
            $namaBarang=$_POST['updatenamabarang'];
            $hargaBarang=$_POST['updatehargabarang'];
            $objmodelbrg->update($idBarang,$namaBarang,$hargaBarang,$nama);
            header("location:../views/viewadmin/managebarang.php"); 
        }
    }
}
$objprosesbarang = new prosesbarang($_GET['aksi']);
$objprosesbarang->proses();
?>