<?php
session_start();
$_SESSION['NumPregunta']= 0;
header("Location:quiz.php");
?>