<?php
require_once 'Preguntas.php';
$Resp=$_POST['pregunta'];
$Pre=$_POST['NumPregunta'];
if($Resp==$respuestas[$Pre]){
    if($Pre!=4){
    echo "Muy Bien Contestado!!!<br>";
    echo "<a href='Sig.php' >Continuar con Siguiente Pregunta</a>";
}else{
    echo "Muy Bien Contestado!!!<br>";
    echo "<a href='Sig.php' >Desea Comezar de Nuevo?</a>";
}
}else{
    echo "Fallaste!!!";
    echo "<a href='quiz.php' >Volver a Intentarlo</a>";
    
}

?>