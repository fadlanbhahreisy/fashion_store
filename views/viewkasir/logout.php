<?php
session_start();
unset($_SESSION["kasir"]);
header("location:../../index.php"); 
?>