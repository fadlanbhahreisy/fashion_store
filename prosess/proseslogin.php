<?php
session_start();
require "../model/modellogin.php";

class proseslogin{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objlogin = new modellogin();
        if($this->action=="loginadmin"){
            $useradmin=$_POST['usernameadmin'];
            $passadmin=$_POST['passwordadmin'];
            if($useradmin=="alan"&&$passadmin=="pass"){
                header("location:../views/viewadmin/managebarang.php");
            }
        }
        elseif($this->action=="loginsales"){
            $namasales=$_POST["usernamesales"];
            $passsales=$_POST["passwordsales"];
            $objlogin->ceksales($namasales,$passsales);
            if($objlogin->getceksales()==1){
                $objlogin->akunsales($namasales,$passsales);
                $akunsales = $objlogin->getakunsales();
                $_SESSION["sales"]=$akunsales;
                echo "<script>alert('sukses');</script>";
                echo "<script>location='../views/viewsales/pemesanan.php'</script>";
            }else{
                echo "<script>alert('nama tidak ada lapor ke admin');</script>";
                echo "<script>location='../index.php'</script>";
            }
        }
        elseif($this->action=="loginkasir"){
            $namakasir=$_POST["usernamekasir"];
            $passkasir=$_POST["passwordkasir"];
            $objlogin->cekkasir($namakasir,$passkasir);
            if($objlogin->getcekkasir()==1){
                $objlogin->akunkasir($namakasir,$passkasir);
                $akunkasir = $objlogin->getakunkasir();
                $_SESSION["kasir"]=$akunkasir;
                //echo '<pre>';
                //print_r($_SESSION["kasir"]);
                //echo '</pre>';
                echo "<script>alert('sukses');</script>";
                echo "<script>location='../views/viewkasir/transaksi.php'</script>";
            }else{
                echo "<script>alert('nama tidak ada lapor ke admin');</script>";
                echo "<script>location='../index.php'</script>";
            }
        }
    }
}
$objproseslogin = new proseslogin($_GET['aksi']);
$objproseslogin->proses();
?>