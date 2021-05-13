<?php
include("con_bd.php");
session_start();
$_SESSION['valido'] = false;
header("Location:". $_SESSION['pagina']);

?>
