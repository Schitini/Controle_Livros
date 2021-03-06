<?php

	session_start();

	if(!isset($_SESSION['email'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');	

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$id_usuario = $_SESSION['id'];

	
	$sql = " SELECT livro.*, date_format(data_pub,'%d %b %Y') AS data_inclusao_formatada FROM lista_livro LEFT JOIN livro ON livro.id_livro = lista_livro.id_livro WHERE id_usuario = $id_usuario";

	$resultado_id = mysqli_query($link, $sql);
	
	if($resultado_id){
		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			echo '<div class = "list-group-item col-md-6" align="center"';
				echo '<h4 class = "list-group-item-heading">'.'<small><img src="data:image/jpeg;base64,' . base64_encode($registro['img']).'" class="img-responsive" style="width:400px; height:400px;"  /></small>';
				echo '<label>Nome do Livro: '.$registro['nome'];
				echo '<br>';
				echo 'Autor: '.$registro['autor'];
				echo '<br>';
				echo 'Data de Publicação: '.$registro['data_inclusao_formatada'];
				echo '<br>';
				echo 'Quantidade de Páginas: '.$registro['qtde_pagina'];
				echo '<br><br></label>';
				echo '<button type="button" class="btn btn-danger btn_remover" data-id_livro="'.$registro['id_livro'].'">Remover do Carrinho</button>';
				echo '<br>';
			echo '</div>';	
		}
	}
	else{
		echo "Erro na consulta de tweets do banco de dados!";
	}

?>

