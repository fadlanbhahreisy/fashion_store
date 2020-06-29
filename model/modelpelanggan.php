<?php
require "connect.php";
class modelpelanggan extends connect{
    private $datapelanggan;
    private $kode=0;
    private $idbaru;
    function select(){
        $sqltext = "SELECT * FROM PELANGGAN";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<(int)substr($row['ID_PELANGGAN'], 3, 3)){
                $this->kode=(int)substr($row['ID_PELANGGAN'], 3, 3);
            }
        }
        return $this->databarang=$data;
        oci_free_statement($statement);
    }
    function insert($idpel,$nmpel,$pass){
        $sqltext = "INSERT INTO PELANGGAN VALUES('$idpel','$nmpel','$pass')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function getdata(){
        return $this->databarang;
    }

    function delete($idpel){
        $sqltext = "DELETE FROM PELANGGAN WHERE ID_PELANGGAN='$idpel'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function update($idpel,$nmpel,$no){
        $sqltext = "UPDATE PELANGGAN SET NAMA_PELANGGAN='$nmpel',NO_TELP='$no' WHERE ID_PELANGGAN='$idpel'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function setidbaru(){
        return $this->idbaru="pel".sprintf($this->kode+1);
    }
    function getidbaru(){
        return $this->idbaru;
    }
}

?>