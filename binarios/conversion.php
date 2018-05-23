<?php
if(isset($_POST)){
    $_tipo=$_POST['tipo'];


function Binarios(){
    $_cantidad=$_POST['cantidad'];
    
    $_temp=$_cantidad;
    $vector=[];
    
while($_temp!=-1){
    if($_temp==1){
         $vector[]=1;
        $_temp=-1;
    }else if ($_temp==0){
    echo count($vector);
    if((count($vector))%4 != 0){
    $vector[]=0;
    }
    $_temp=-1;
    }else{
     $vector[]=$_temp%2;
    $_temp=(int)($_temp/2);
}
}
$h=count($vector);
while( ($h%4)!=0){
$vector[]=0;
$h++;
}

return $vector;
}

function Hexadecimal(){
$vector2=Binarios();
$vector3=[1,2,4,8];
$count=0;
$hexa=0;
$resultado=[];
$h=count($vector2);
for($i=0;$i<$h;$i++){
   
if($count==3){
    $hexa=$hexa+($vector2[$i]*$vector3[$count]);
    if($hexa==10){
        $resultado[]='A';
    }else if($hexa==11){
        $resultado[]='B';
    }else if($hexa==12){
        $resultado[]='C';
    }else if($hexa==13){
        $resultado[]='D';
    }else if($hexa==14){
        $resultado[]='E';
    }else if($hexa==15){
        $resultado[]='F';
    }else{
        $resultado[]=$hexa;
    }

    $count=0;
    $hexa=null;
}else{
$hexa=$hexa+($vector2[$i]*$vector3[$count]);
$count++;
}

}
return $resultado;
}

if($_tipo=="Binarios"){
$vector=$_tipo();
    $h=count($vector)-1;
$count=0;
while($h!=-1){
    echo $vector[$h];
    if($count==3){
        echo " ";
        $count=0;
    }else{
    $count++;
    }
    $h--;
}
}else if($_tipo=="Hexadecimal"){
    $vector=$_tipo();

    $h=count($vector)-1;
    $count=0;
    while($h!=-1){
        echo $vector[$h];
        if($count==3){
            echo " ";
            $count=0;
        }else{
        $count++;
        }
        $h--;
    }

}
}else{
    echo "algo fallo";
}
?>