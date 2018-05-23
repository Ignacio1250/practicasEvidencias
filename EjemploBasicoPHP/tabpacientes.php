<?php
/*
Archivo:  tabpacientes.php
Objetivo: consulta general sobre pacientes y acceso a operaciones detalladas
Autor:    
*/
include_once("modelo\Usuario.php");
include_once("modelo\PersonalHospitalario.php");

session_start();
$sErr="";
$sNom="";
$oUsu = new Usuario();
	/*Verificar que exista sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getPersHosp()->getNombre();
		try{
			//Buscar lista de pacientes
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
		}
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == ""){
		include_once("cabecera.html");
		include_once("menu.php");
		include_once("aside.html");
	}
	else{
		header("Location: error.php?sError=".$sErr);
		exit();
	}
?>
		<section>
			<h3>Pacientes</h3>
			
				<?php 
				include_once("modelo\AccesoDatos.php");
				
				$oAD = new AccesoDatos();
				if ($oAD->conectar()){
					$pacientes = $oAD->ejecutarConsulta("Select * from paciente");
					$oAD->desconectar();
					if ($pacientes != null){
						
						echo "<table style='border: 1px solid red;'>";
						echo "<th>Numero Paciente</th>";
						echo "<th>Nombre</th>";
						echo "<th>Apellido Paterno</th>";
						echo "<th>Apellido Materno</th>";
						echo "<th>Fecha Nacimiento</th>";
						echo "<th>Sexo</th>";
						echo "<th>Alergias</th>";
						echo "<th>Borrar</th>";
						echo "<th>Editar</th>";
					 for($i=0;$i<(count($pacientes));$i++){
						 echo "<tr>";
						 for($g=0;$g<7;$g++){
						 echo "<td>".$pacientes[$i][$g]."</td>";
						 }
						
						 echo "<form action='eliminapaciente.php' method='POST'><td><input type =hidden name='eliminar' value=".$pacientes[$i][0]."><input type='submit' value='Borrar'></form></td>";
						 echo "<form action='Edicion.php' method='POST'><td><input type=hidden name='tipo' value='actualizar'><input type =hidden name='editar' value=".$pacientes[$i][0]."><input type='submit' value='Editar'></form></td>";
						 echo "</tr>";
					 }
					 echo "</table>";
					echo "<form action='Edicion.php' method='POST' > <input type=hidden name='tipo' value='agregar'><input type=submit value='Agregar'></form>";	
					}else{
						echo "Error";
					}
				}

				
				?>
			
		</section>
<?php
include_once("pie.html");
?>