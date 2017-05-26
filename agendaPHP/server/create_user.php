<?php
require ('conectorBD.php');

$con = new ConectorBD('localhost', 'nextu', 'Un1ver$1ty');
if ($con -> initConexion('BDAgendaNextU') == 'OK') {
	for ($i = 1; $i <= 3; $i++) {
		$datos['nombre'] = "Nombre de usuario " . $i;
		$datos['email'] = "user" . $i . "@dbnextu.com";
		$datos['pass'] = password_hash("Cl@veUser" . $i, PASSWORD_DEFAULT);
		$datos['nacimiento'] = date('Y-m-d');
		if ($con -> insertData('Usuarios', $datos))
			echo "Se insertaron los datos correctamente del usuario " . $i . "<br/>";
		else
			echo "Se ha producido un error en la inserción " . $i . "<br/>";
	}
	$con -> cerrarConexion();
} else
	echo "Se presentó un error en la conexión";
?>
