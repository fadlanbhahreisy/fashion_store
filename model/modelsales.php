<?php
require "connect.php";
class modelsales extends connect{
    public $datasales;
    private $kode=0;
    private $idbaru;

    function select(){
        $sqltext = "SELECT * FROM SALES";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<(int)substr($row['ID_SALES'], 3, 3)){
                $this->kode=(int)substr($row['ID_SALES'], 3, 3);
            }
        }
        return $this->datasales=$data;
        oci_free_statement($statement);
    }

    function viewdata(){
        foreach ($this->datasales as $key) {
            echo $key['ID_SALES'];
            echo $key['NAMA_SALES'];
            echo $key['PASSWORD'];
            echo '<br>';
        }
    }
    function getdata(){
        return $this->datasales;
    }
    function insert($idsales,$namasales,$password){
        $sqltext = "INSERT INTO SALES VALUES('$idsales','$namasales','$password')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function update($idsales,$namasales,$password){
        $sqltext = "UPDATE SALES SET NAMA_SALES='$namasales',PASSWORD='$password' WHERE ID_SALES='$idsales'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function delete($idsales){
        $sqltext = "DELETE FROM SALES WHERE ID_SALES='$idsales'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function setidbaru(){
        return $this->idbaru="sal".sprintf($this->kode+1);
    }
    function getidbaru(){
        return $this->idbaru;
    }
}
//$sal = new modelsales();
?>
