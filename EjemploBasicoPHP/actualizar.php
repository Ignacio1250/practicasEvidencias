<?php
$_proceso=$_POST["proceso"];
if($_proceso=="actualizar"){

$_Idpaciente=$_POST["id"];
}
$_nombre=$_POST["nombre"];
$_App=$_POST["App"];
$_Apm=$_POST["Apm"];
$_FechaNac=$_POST["FechaNac"];
$_Sexo=$_POST["Sexo"];
$_Alergias=$_POST["Alergias"];



include_once("modelo\AccesoDatos.php");
               
				$oAD = new AccesoDatos();
				if ($oAD->conectar()){
                                        if($_proceso=="actualizar"){
                    $_consulta= "Update paciente set sNombre='".$_nombre."' ,sApePat='".$_App."' ,sApeMat='".$_Apm."' ,dFecNacim='".$_FechaNac."' ,sSexo='".$_Sexo."' ,sAlergias='".$_Alergias."' where nIdPac=".$_Idpaciente;
                                        }else if($_proceso=="agregar"){
                                                $_consulta="Insert into paciente (sNombre,sApePat,sApeMat,dFecNacim,sSexo,sAlergias) values('".$_nombre."','".$_App."','".$_Apm."','".$_FechaNac."','".$_Sexo."','".$_Alergias."')";
                                        }
            echo $_consulta;
                    $pacientes = $oAD->ejecutarConsulta($_consulta);
                    $oAD->desconectar();
               header("Location:tabpacientes.php");
					
				}else{
                echo "error";
                }

				
				

?>