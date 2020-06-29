<?php
require "connect.php";
class modellogin extends connect{
    private $ceksales;
    private $akunsales;
    private $cekkasir;
    private $akunkasir;
    function ceksales($nama,$pass){
        $sqltext = "SELECT COUNT(*) FROM SALES WHERE NAMA_SALES='$nama' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->ceksales = $key["COUNT(*)"];
        oci_free_statement($statement);
    }
    function getceksales(){
        return $this->ceksales;
    }
    function akunsales($nama,$pass){
        $sqltext = "SELECT * FROM SALES WHERE NAMA_SALES='$nama' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->akunsales=$key;
    }
    function getakunsales(){
        return $this->akunsales;
    }
    function cekkasir($nama,$pass){
        $sqltext = "SELECT COUNT(*) FROM KASIR WHERE NAMA_KASIR='$nama' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->cekkasir = $key["COUNT(*)"];
        oci_free_statement($statement);
    }
    function getcekkasir(){
        return $this->cekkasir;
    }
    function akunkasir($nama,$pass){
        $sqltext = "SELECT * FROM KASIR WHERE NAMA_KASIR='$nama' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->akunkasir=$key;
    }
    function getakunkasir(){
        return $this->akunkasir;
    }

}

?>