<?php
session_start();
unset($_SESSION["sales"]);
header("location:../../index.php"); 
?>