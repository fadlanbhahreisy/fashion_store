<?php
require "connect.php";
class modelkasir extends connect{
    private $datakasir;
    private $kode=0;
    private $idbaru;
    function select(){
        $sqltext = "SELECT * FROM KASIR";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<(int)substr($row['ID_KASIR'], 3, 3)){
                $this->kode=(int)substr($row['ID_KASIR'], 3, 3);
            }
        }
        return $this->datakasir=$data;
        oci_free_statement($statement);
    }
    
    function getdata(){
        return $this->datakasir;
    }
    
    function viewdata(){
        
        foreach ($this->datakasir as $key){
            echo $key['ID_BARANG'];
            echo " = ";
            echo $key["NAMA_BARANG"];
            echo " = ";
            echo $key["HARGA_BARANG"];
            echo "<br>";
        }
    }
    function insert($idkasir,$namakasir,$passkasir){
        $sqltext = "INSERT INTO KASIR VALUES('$idkasir','$namakasir','$passkasir')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function delete($idkasir){
        $sqltext = "DELETE FROM KASIR WHERE ID_KASIR='$idkasir'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function update($idkasir,$namakasir,$passkasir){
        $sqltext = "UPDATE KASIR SET NAMA_KASIR='$namakasir', PASSWORD='$passkasir' WHERE ID_KASIR='$idkasir'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function setidbaru(){
        return $this->idbaru="kas".sprintf($this->kode+1);
    }
    function getidbaru(){
        return $this->idbaru;
    }
}

?>