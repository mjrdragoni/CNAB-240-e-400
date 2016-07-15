<?php

	header('Content-Type: text/html; charset=utf-8');

// vamos declarar os dados do nosso banco de dados
	// os dados são: host, username, pass, dbname

	$db_host = "127.0.0.1";
	$db_user = "root";
	$db_pass = "";
	$db_name = "retorno_bancos";

	$conexao = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);


	if (mysqli_connect_errno ($conexao)) {		
		echo  "A conexão com o banco de dados falhou, erro reportado: ".mysqli_connect_error();
	}
?>	