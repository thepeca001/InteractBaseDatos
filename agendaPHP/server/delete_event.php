<?php
session_start();
if ($_SESSION['isLogin']) {
	require ('conectorBD.php');

	$con = new ConectorBD('localhost', 'nextu', 'Un1ver$1ty');
	$response['conexion'] = $con -> initConexion('BDAgendaNextU');
	if ($response['conexion'] == 'OK') {
		if ($con -> eliminarRegistro('Eventos', 'id = ' . $_POST['id']))
			$response['msg'] = 'OK';
		else
			$response['msg'] = 'Se ha producido un error al guardar el evento';
	} else
		$response['msg'] = 'Problemas con la conexión a la base de datos';
} else
	$response['msg'] = 'Debe iniciar sesión';

echo json_encode($response);
?>