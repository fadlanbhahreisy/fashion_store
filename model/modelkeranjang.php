<?php
session_start();
echo '<pre>';
echo print_r($_SESSION["cart"]);
echo '</pre>';
require "connect.php";
class modelkeranjang extends connect{
    private $keranjang;
    private $qty;
    function select(){
        foreach ($_SESSION["cart"] as $id_barang => $jumlah) {
            $sqltext = "SELECT * FROM BARANG WHERE ID_BARANG = '$id_barang'";
            $statement = oci_parse($this->koneksi,$sqltext);
            oci_execute($statement);
            $data[]=oci_fetch_array($statement,OCI_BOTH);
            $datajumlah[] = $jumlah;
        }
        return $this->keranjang=$data;
        return $this->qty=$datajumlah;
        oci_free_statement($statement);
    }
    
    function getdata(){
        return $this->keranjang;
    }
    function setqty($setqty){
        return $this->qty = $setqty;
    }
    function getqty(){
        return $this->qty;
    }
    function viewdata(){
        
        foreach ($_SESSION["cart"] as $id_barang => $jumlah){
            echo $key["ID_BARANG"];
            echo " = ";
            echo $key["NAMA_BARANG"];
            echo " = ";
            echo $key["HARGA_BARANG"];
            echo $jml;
            echo "<br>";
        }
    }
}
$obj = new modelkeranjang();
$obj->select();
$obj->viewdata();
echo '<pre>';
echo print_r($datajumlah);
echo '</pre>';
?>