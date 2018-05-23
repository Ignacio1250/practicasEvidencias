<?php
require_once 'Preguntas.php';
session_start();

$num=$_SESSION['NumPregunta'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="revision.php" method="POST">
    
    <?php
   
        echo "<label>pregunta ".($num+1)."<br>".$preguntas[$num]."</label>";
        echo "<br>";
        echo '<input type="text" name="pregunta" ></input>';
        echo "<input type='hidden' name='NumPregunta' value=".$num."></input>";
    
    echo '<input type="submit" name="Verificar" value="Verificar"></input>';
    
    ?>
    </form>
    <?php
    echo '<form action="Sig.php" method="POST">';
    if($num!=4){

    echo '<input type="submit" name="Siguiente" value="Siguiente"></input>';
}
    echo '</form>';
    ?>
</body>
</html>