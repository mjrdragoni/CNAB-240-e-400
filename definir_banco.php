<?php 

  require_once("includes/connection.php");

	$file = $_FILES['arq_ret']['tmp_name'];
  $arquivo = file($file);
      
 //CAPTURA A EXTENSÃO DO ARQUIVO
  $_UP['extensoes'] = array('ret');    
  $extensao = @strtolower(@end(@explode('.', $_FILES['arq_ret']['name'])));

  //VERIFICA A EXTENSÃO DO ARQUIVO
  if (array_search($extensao, $_UP['extensoes']) === false ||  mime_content_type($file) != 'text/plain') {
      echo "Por favor, envie arquivos : .ret";
    exit;
  } 
  else{
    
    $id_banco = $_POST['bancos'];

    if ($id_banco == "BRADESCO" && substr($arquivo[0] , 76, 3) === '237'){
      
      require_once("retorno_".$id_banco.".php");      
    }

    else  if ($id_banco == "ITAU" && substr($arquivo[0] , 76, 3) === '341'){
      
      require_once("retorno_".$id_banco.".php");      
    }

    else if ($id_banco == "SANTANDER" && (substr($arquivo[0] , 0, 3) === '353' || substr($arquivo[0] , 0, 3) === '008' || substr($arquivo[0] , 0, 3) === '033')){
      
      require_once("retorno_".$id_banco.".php"); 
    }   

    else {      
      echo "Você escolheu o banco errado para efetuar a leitura do arquivo. <br> Por favor, tente novamente!" ;     
    } 
  } 

?>       
   