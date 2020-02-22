<?php
	
	session_start();

	if(!isset($_SESSION['email'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$id_usuario = $_SESSION['id'];
	$id_lista = $_POST['id_lista'];

	if($id_usuario == '' && $id_lista == ''){
		die();
	}

	
	$sql = " INSERT INTO lista_livro(id_usuario, id_livro) values ($id_usuario, $id_lista) ";


	mysqli_query($link, $sql);

?>