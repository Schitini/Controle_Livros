<?php

	session_start();

	require_once('db.class.php');

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = " SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);


	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){

			$_SESSION['id'] = $dados_usuario['id'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('location: home.php');
		}
		else{
			header('location: index.php?erro=1');
		}
	}
	else{
		echo "Erro na execução da consulta, favor entrar em contato com o admin do site!";
	}

?>