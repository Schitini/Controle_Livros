<?php
	
	session_start();

	if(!isset($_SESSION['email'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$id_usuario = $_SESSION['id'];
	$id_remover_lista = $_POST['id_remover_lista'];
	$id_lista_livro = $_SESSION['id_lista_livro'];

	if($id_usuario == '' && $id_remover_lista == ''){
		die();
	}

	$sql = " DELETE FROM lista_livro where id_usuario = $id_usuario AND id_livro = $id_remover_lista";


	mysqli_query($link, $sql);

?>