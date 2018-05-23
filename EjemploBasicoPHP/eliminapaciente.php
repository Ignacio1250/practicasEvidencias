<?php
$_paciente=$_POST["eliminar"];

include_once("modelo\AccesoDatos.php");
               
				$oAD = new AccesoDatos();
				if ($oAD->conectar()){
					$pacientes = $oAD->ejecutarConsulta("Delete from paciente where nIdPac=".$_paciente);
                    $oAD->desconectar();
                   
					header("Location:tabpacientes.php");
				}else{
                echo "error";
                }

				
				

?>