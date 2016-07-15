<?php 

    require_once("includes/connection.php");

    $html = "";
    $sql = "SELECT nome FROM bancos
			ORDER BY nome";


	$query_bancos = mysqli_query($conexao, $sql);

	while($result = mysqli_fetch_array($query_bancos)) { 
	    $html .= '<option value="'.$result['nome'].'">'.$result['nome'].'</option>';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Leitura de Arquivos de Retorno de Bancos</title>
</head>
<body>

	<center><h1>Por favor escolha o Banco e o Documento os quais deseja fazer a Leitura do  <br><br> Arquivo de Retorno</h1></center><br><br>

	<center>

		<form method="post" action="definir_banco.php" enctype="multipart/form-data">
			
			<label for="bancos">Selecione o Banco</label>
			<select name="bancos" id="bancos" >
		        <option>Selecione...</option>
		                <?=$html?>
		    </select> <br><br>

	   
		    <label for="arq_ret">Selecione o Arquivo</label>
	        <input type="file" name="arq_ret" id="arq_ret" accept="*.ret" /><br><br>
	        <input type="submit" name="enviar" value="Ler Arquivo" /> 
        </form>
    </center>

</body>
</html>