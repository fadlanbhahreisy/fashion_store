<?php
require "connect.php";
class modelbarang extends connect{
    private $databarang;
    private $kode=0;
    private $idbaru;
    function select(){
        $sqltext = "SELECT * FROM BARANG";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<(int)substr($row['ID_BARANG'], 3, 3)){
                $this->kode=(int)substr($row['ID_BARANG'], 3, 3);
            }
        }
        return $this->databarang=$data;
        oci_free_statement($statement);
    }
    function getdata(){
        return $this->databarang;
    }
    
    function viewdata(){
        
        foreach ($this->databarang as $key){
            echo $key['ID_BARANG'];
            echo " = ";
            echo $key["NAMA_BARANG"];
            echo " = ";
            echo $key["HARGA_BARANG"];
            echo "<br>";
        }
    }
    function insert($idbrg,$nmbrg,$hrgbrg,$gambar){
        $sqltext = "INSERT INTO BARANG VALUES('$idbrg','$nmbrg','$hrgbrg','$gambar')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function delete($idbrg){
        $sqltext = "DELETE FROM BARANG WHERE ID_BARANG='$idbrg'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function update($idbrg,$nmbrg,$hrgbrg){
        $sqltext = "UPDATE BARANG SET NAMA_BARANG='$nmbrg',HARGA_BARANG='$hrgbrg' WHERE ID_BARANG='$idbrg'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function setidbaru(){
        return $this->idbaru="bar".sprintf($this->kode+1);
    }
    function getidbaru(){
        return $this->idbaru;
    }
}
//$objmodelbarang = new modelbarang();
//$objmodelbarang->insert('3','kipas','5000');
//$objmodelbarang->delete('3');
//$objmodelbarang->update('2','tv','6000');
//$objmodelbarang->select();
//$objmodelbarang->viewdata();
?>