<?php

$_tipo=$_POST["tipo"];
if($_tipo=="actualizar"){
	$_paciente=$_POST["editar"];
echo $_paciente;
}

include_once("modelo\AccesoDatos.php");
				
				$oAD = new AccesoDatos();
				if ($oAD->conectar()){
					$pacientes = $oAD->ejecutarConsulta("Select * from paciente");
					$oAD->desconectar();
					if ($pacientes != null){
						echo "<table style='border: 1px solid red;'>";
						if($_tipo=="actualizar"){
						echo "<th></th>";
					}
						echo "<th>Nombre</th>";
						echo "<th>Apellido Paterno</th>";
						echo "<th>Apellido Materno</th>";
						echo "<th>Fecha Nacimiento</th>";
						echo "<th>Sexo</th>";
						echo "<th>Alergias</th>";
						
						if($_tipo=="actualizar"){
							
					 echo "<form action='actualizar.php' method='POST'>";
					 echo "<input type=hidden name='proceso' value='actualizar'>";
					 echo "<tr>";
					 echo "<td><input type='hidden' name='id' value=".$_paciente."></td>";
					 echo "<td><input type='text' name='nombre' value=".$pacientes[($_paciente-1)][1]."></td>";
					 echo "<td><input type='text' name='App' value=".$pacientes[($_paciente-1)][2]."></td>";
					 echo "<td><input type='text' name='Apm' value=".$pacientes[($_paciente-1)][3]."></td>";
					 echo "<td><input type='text' name='FechaNac' value=".$pacientes[($_paciente-1)][4]."></td>";
					 echo "<td><input type='text' name='Sexo' value=".$pacientes[($_paciente-1)][5]."></td>";
					 echo "<td><input type='text' name='Alergias' value=".$pacientes[($_paciente-1)][6]."></td>";

					echo "</tr>";
					}else if($_tipo=="agregar"){
						echo "<form action='actualizar.php' method='POST'>";
						echo "<input type=hidden name='proceso' value='agregar'>";
						echo "<tr>";
                         
                         echo "<td><input type='text' name='nombre'></td>";
                         echo "<td><input type='text' name='App' ></td>";
                         echo "<td><input type='text' name='Apm' ></td>";
                         echo "<td><input type='text' name='FechaNac'></td>";
                         echo "<td><input type='text' name='Sexo' ></td>";
                         echo "<td><input type='text' name='Alergias' ></td>";

						echo "</tr>";
					}
						
					 
                             
						
                     }
                     
					 echo "</table>";
					 if($_tipo=="actualizar"){
					 echo "<input type=submit value='Actualizar'>";
					 }else if($_tipo=="agregar"){
						 echo "<input type=submit value='Agregar'>";
					 }
                     echo "</form>";	
					}else{
						echo "Error";
					}
				

				
				
?>