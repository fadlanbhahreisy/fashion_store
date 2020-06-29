<?php
session_start();
require "../model/modelpemesanan.php";

class prosesbarang{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelpesan = new modelpemesanan();
        if($this->action=="act"){
            $idpesan = $_POST["idpesanan"];
            $idpelanggan = $_SESSION["pelanggan"]["ID_PELANGGAN"];
            $idsales = $_SESSION["sales"]["ID_SALES"];
            $tanggal = $_POST["tanggalpesan"];
            $totalbelanja = $_POST["totalbelanja"];
            $objmodelpesan->insert($idpesan,$idpelanggan,$idsales,$tanggal,$totalbelanja);
            foreach ($_SESSION["cart"] as $id_barang => $jumlah) {
                $sqltext = "SELECT * FROM BARANG WHERE ID_BARANG = '$id_barang'";
                    $statement = oci_parse(oci_connect("fadlan_bhahreisy","fadlan","localhost/XE"),$sqltext);
                    oci_execute($statement);
                    $key=oci_fetch_array($statement,OCI_BOTH);
                    $subtotal = $key['HARGA_BARANG']*$jumlah;
                    $objmodelpesan->insertdetail($jumlah,$subtotal,$idpesan,$id_barang);
            }    
            unset($_SESSION["pelanggan"]);
            unset($_SESSION["cart"]);
            header("location:../views/viewsales/datapemesanan.php");
        }
    }
}
$objprosesbarang = new prosesbarang($_GET['aksi']);
$objprosesbarang->proses();

?>