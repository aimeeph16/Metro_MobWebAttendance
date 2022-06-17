<?php
session_start();
$pickedOffice = $_GET['selectedOffice'];
// echo $pickedOffice;
$_SESSION['pickedOffice'] = $pickedOffice;
// echo $pickedOffice;
?>