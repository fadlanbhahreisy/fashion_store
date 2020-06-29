<?php
class connect{
    protected $koneksi;
    private $uname="fadlan_bhahreisy";
    private $pass="fadlan";
    private $host="localhost/XE";

    function __construct()
    {
        $konek = oci_connect($this->uname,$this->pass,$this->host);
        if ($konek)
        {
            echo "";
            $this->koneksi=$konek;
        }else
        {
            echo "gagal";
        }
    }
}
$objkonek =new connect();
?>