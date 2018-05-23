<?php
session_start();
if($_SESSION['NumPregunta']<4){
$_SESSION['NumPregunta']=$_SESSION['NumPregunta']+1;
}else{
    $_SESSION['NumPregunta']=0;
}


header("Location:quiz.php");
?>