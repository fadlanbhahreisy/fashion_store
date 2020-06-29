<?php
require "connect.php";
class modelpemesanan extends connect{
    private $listpemesanan;
    private $datapemesanan;
    private $kode=0;
    private $idbaru;
    private $barangpesanan;
    private $subtotal;
    private $namabarang;
    private $hargabarang;
    private $detail;
    function select(){
        $sqltext = "SELECT * FROM PESAN";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<(int)substr($row['ID_PESAN'], 3, 3)){
                $this->kode=(int)substr($row['ID_PESAN'], 3, 3);
            }
        }
        return $this->datapemesanan=$data;
        oci_free_statement($statement);

    }
    function selectlist(){
        $sqltext = "SELECT * FROM LIST_PEMESANAN";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);

        //variabel data barang diisi dari DB
        $temp;
        while($row=oci_fetch_array($statement,OCI_BOTH)){
            $temp[] = $row;
        }
        $this->listpemesanan=$temp;
    }
    function getDatalist(){
        return $this->listpemesanan;
    }
    function setidbaru(){
        return $this->idbaru="pes".sprintf($this->kode+1);
    }
    function getidbaru(){
        return $this->idbaru;
    }
    
    function update($id_pesan,$id_transaksi){
        $sqltext = "UPDATE PESAN SET ID_TRANSAKSI='$id_transaksi' WHERE ID_PESAN='$id_pesan'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function insert($idpesan,$idpelanggan,$id_sales,$tanggal,$total){
        $sqltext = "INSERT INTO PESAN (ID_PESAN,ID_PELANGGAN,ID_SALES,TANGGAL,TOTAL)
        VALUES ('$idpesan','$idpelanggan','$id_sales',TO_DATE('$tanggal','DD/MM/YYYY'),'$total')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function insertdetail($qty,$subtotal,$idpesan,$id_barang){
        $sqltext = "INSERT INTO DETAIL VALUES ('$qty','$subtotal','$idpesan','$id_barang')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    function selectid($id_barang){
            $sqltext = "SELECT * FROM BARANG WHERE ID_BARANG = '$id_barang'";
            $statement = oci_parse($this->koneksi,$sqltext);
            oci_execute($statement);
            $this->barangpesanan=$key=oci_fetch_array($statement,OCI_BOTH);
    }
    function viewnamabarang(){
        return $this->namabarang = $this->barangpesanan["NAMA_BARANG"];
    }
    function viewhargabarang(){
        return $this->hargabarang=$this->barangpesanan["HARGA_BARANG"];
    }
    function setsubtotal($harga,$jumlah){
        $this->subtotal=$harga*$jumlah;
    }
    function getsubtotal(){
        return $this->subtotal;
    }
    function selectdetail($id_pesan){
        $sqltext = "SELECT * FROM LIST_DETAIL WHERE ID_PESAN='$id_pesan'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $temp;
        while($row=oci_fetch_array($statement,OCI_BOTH)){
            $temp[] = $row;
        }
        $this->detail=$temp;
    }
    function getdetail(){
        return $this->detail;
    }
}
?>