<?php
session_start();
unset($_SESSION["cart"]);
echo "<script>location='../views/viewsales/pemesanan.php';</script>";
?>