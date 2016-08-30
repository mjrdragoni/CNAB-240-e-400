<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        function FindNext () {
            var str = document.getElementById ("findInput").value;
            if (str == "") {
                alert ("Please enter some text to search!");
                return;
            }
            
            if (window.find) {        // Firefox, Google Chrome, Safari
                var found = window.find (str);
                if (!found) {
                    alert ("The following text was not found:\n" + str);
                }
            }
            else {
                alert ("Your browser does not support this example!");
            }
        }
    </script>
</head>
<body>
    
    <br />
<div id="retorno_itau">
    <input type="text" id="findInput" value="lala" size="20" />
    <button onclick="FindNext (); ">Find Next</button>
 
  
 
<?php

  require_once("includes/connection.php");

  $fp = fopen($file, "r");

  $content = fread( $fp, filesize($file) );

  $ident_regh = substr($content, 0, 1  ); 
  
  echo "<center><h1>Arquivo de Retorno do Itaú</h1></center><br><br>";

  echo "<h2>Header</h2> <br><br> <b>IDENTIFICAÇÃO DO REGISTRO HEADER: </b>" . $ident_regh . "<br>";

  $ident_arq_ret = substr($content, 1, 1);
  echo "IDENTIFICAÇÃO DO ARQUIVO RETORNO: ". $ident_arq_ret . "<br>"; 

  $lit_ret = substr($content, 2 ,7);
  echo "LITERAL DE RETORNO: " . $lit_ret . "<br>"; 

  $cod_serv = substr($content, 9, 2 );
  echo "CÓDIGO DO SERVIÇO: " . $cod_serv . "<br>"; 

  $lit_serv = substr($content, 11, 15);
  echo "LITERAL DE SERVIÇO: " . $lit_serv . "<br>";

  $ag = substr($content, 26, 4);
  echo "AGÊNCIA: " . $ag .  "<br>";

  $zeros  = substr($content, 30, 2 );
  echo "ZEROS: " . $zeros .  "<br>";

  $conta = substr($content, 34, 5);
  echo "CONTA: " . $conta . "<br>";

  $dac = substr($content, 37, 1 );
  echo "DAC: " . $dac . "<br>";

  $nome_emp = substr($content, 46, 30);
  echo "NOME DA EMPRESA: " .$nome_emp . "<br>";

  $cod_banco = substr($content, 76, 3);
  echo "CÓDIGO DO BANCO: " . $cod_banco . "<br>";

  $nome_banco = substr($content, 79, 15);
  echo "NOME DO BANCO: " . $nome_banco . "<br>";

  $data_gera = substr($content, 94, 6);
  echo "DATA DE GERAÇÃO: " . substr($data_gera, 0,2)."/".substr($data_gera, 2,2)."/". substr($data_gera, 4,2) ."<br>"; 

  $densidade = substr($content, 100, 5);
  echo "DENSIDADE: " . $densidade . "BPI<br>";

  $unid_dens = substr($content, 105, 3);
  echo "UNIDADE DE DENSID.: " . $unid_dens. "<br>";

  $num_seq_arq_ret = substr($content, 108, 5);
  echo "Nº SEQ. ARQUIVO RET.: " . $num_seq_arq_ret . "<br>";

  $data_cred = substr($content, 113, 6);  
  echo "DATA DE CRÉDITO: " . substr($data_cred, 0,2)."/".substr($data_cred, 2,2)."/". substr($data_cred, 4,2) ."<br>"; 

  $num_seq = substr($content, 394, 6);
  echo "NÚMERO SEQÜENCIAL: " . $num_seq . "<br>";

  $arquivo = file($file);
    echo "<br><h2>Transações</h2> <br><br>";

    for ($i = 1; $i < (count($arquivo)-1); $i++) {

      $tipo_reg = substr($arquivo[$i], 0,1);
      echo "<b>TIPO DE REGISTRO: </b> " . $tipo_reg  . "<br>";

      $cod_insc = substr($arquivo[$i], 1, 2);

       $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                  operacoes ON operacoes.id = detalhes_op.id_op
                  WHERE detalhes_op.codigo = '$cod_insc' AND operacoes.id = '3' ";

          $r = @mysqli_query($conexao, $sql);

          while ($result = mysqli_fetch_array($r)) {
              $tipo_inscr = $result['descricao'] ;
          }

      echo "CÓDIGO DE INSCRIÇÃO: " . $cod_insc . " - " . utf8_decode($tipo_inscr) ."<br>";

      $num_inscr = substr($arquivo[$i], 3, 14);
      echo "NÚMERO DE INSCRIÇÃO: " . $num_inscr . "<br>";

      $agencia = substr($arquivo[$i], 17, 4);
      echo "AGÊNCIA: " .$agencia . "<br>";

      $zeros = substr($arquivo[$i], 21, 2);
      echo "ZEROS: " . $zeros  . "<br>";

      $conta = substr($arquivo[$i], 23, 5);
      echo "CONTA: " . $conta . "<br>";

      $dac = substr($arquivo[$i], 28,1);
      echo "DAC: " . $dac . "<br>";

      $uso_empresa = substr($arquivo[$i], 37, 25);
      echo "USO DA EMPRESA: " . $uso_empresa . "<br>";

      $nosso_numero = substr($arquivo[$i], 62, 8);
      echo "NOSSO NÚMERO: " . $nosso_numero . "<br>";

      $num_carteira = substr($arquivo[$i], 82, 3);
      echo "NUMERO DA CARTEIRA: " .$num_carteira . "<br>";

      $nosso_numero = substr($arquivo[$i], 85, 8);
      echo "NOSSO NÚMERO: " . $nosso_numero . "<br>";

      $dac_nosso_num =  substr($arquivo[$i], 93, 1); 
      echo "DAC NOSSO NÚMERO: " . $dac_nosso_num . "<br>";

      $num_carteira = substr($arquivo[$i], 107, 1);
      echo "CÓDIGO DA CARTEIRA: " .$num_carteira . "<br>";

      $cod_ocorrencia = substr($arquivo[$i], 108, 2);

        $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$cod_ocorrencia' AND operacoes.id = '4' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $id_oc = $result['descricao'] ;
            }

      echo "CÓD. DE OCORRÊNCIA: " . $cod_ocorrencia . " - " . utf8_encode($id_oc). "<br>";

      $data_ocorr = substr($arquivo[$i], 110, 6);
      echo "DATA DE OCORRÊNCIA: " . substr($data_ocorr, 0,2)."/".substr($data_ocorr, 2,2)."/". substr($data_ocorr, 4,2) ."<br>"; 

      $num_doc =  substr($arquivo[$i], 116, 10);
      echo "Nº DO DOCUMENTO: " .$num_doc . "<br>";

      $nosso_numero = substr($arquivo[$i], 126, 8);
      echo "NOSSO NÚMERO: " . $nosso_numero . "<br>";

      $vencimento = substr($arquivo[$i], 146, 6);
      echo "VENCIMENTO: " .substr($vencimento, 0,2)."/".substr($vencimento, 2,2)."/". substr($vencimento, 4,2) ."<br>"; 

      $val_titulo = substr($arquivo[$i], 152, 13);
      $val_titulo = substr($val_titulo, 0,11) .".".substr($val_titulo, 11,2);
      $val_titulo = number_format($val_titulo,2,",",".");    
      echo "VALOR DO TÍTULO: R$ " . $val_titulo . "<br>";

      $cod_banco = substr($arquivo[$i], 165, 3);
      echo "CÓDIGO DO BANCO: " . $cod_banco . "<br>";

      $ag_cobradora = substr($arquivo[$i], 168, 4);
      echo "AGÊNCIA COBRADORA: " . $ag_cobradora . "<br>";

      $dac_ag_cobradora = substr($arquivo[$i], 172, 1);
      echo "DAC AG. COBRADORA: " . $dac_ag_cobradora . "<br>";

      $especie = substr($arquivo[$i], 173, 2);

         $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$especie' AND operacoes.id = '5' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $espec = $result['descricao'] ;
            }

      echo "ESPÉCIE: " . $especie . " - ".utf8_encode($espec) ."<br>";

      $tarifa_cobr = substr($arquivo[$i], 175, 13);
      $tarifa_cobr = substr($tarifa_cobr, 0,11) .".".substr($tarifa_cobr, 11,2);
      $tarifa_cobr = number_format($tarifa_cobr,2,",",".");    
      echo "TARIFA DE COBRANÇA: R$ " . $tarifa_cobr .  "<br>";

      $valor_iof = substr($arquivo[$i], 214, 13);
      $valor_iof = substr($valor_iof, 0,11) .".".substr($valor_iof, 11,2);
      $valor_iof = number_format($valor_iof,2,",",".");    
      echo "VALOR DO IOF: R$ " . $valor_iof .  "<br>";

      $val_abatimento =  substr($arquivo[$i], 227, 13);
      $val_abatimento = substr($val_abatimento, 0,11) .".".substr($val_abatimento, 11,2);
      $val_abatimento = number_format($val_abatimento,2,",",".");    
      echo "VALOR ABATIMENTO: R$ " . $val_abatimento .  "<br>";

      $desc = substr($arquivo[$i], 240, 13);
      $desc = substr($desc, 0,11) .".".substr($desc, 11,2);
      $desc = number_format($desc,2,",",".");   
      echo "DESCONTOS: R$ " . $desc . "<br>";

      $val_princ = substr($arquivo[$i], 253, 13);
      $val_princ = substr($val_princ, 0,11) .".".substr($val_princ, 11,2);
      $val_princ = number_format($val_princ,2,",","."); 
      echo "VALOR PRINCIPAL: R$ " . $val_princ .  "<br>";

      $jur_mora_multa = substr($arquivo[$i], 266, 13);
      $jur_mora_multa = substr($jur_mora_multa, 0,11) .".".substr($jur_mora_multa, 11,2);
      $jur_mora_multa = number_format($jur_mora_multa,2,",","."); 
      echo "JUROS DE MORA/MULTA: R$ " .$jur_mora_multa . "<br>";

      $outros_cred = substr($arquivo[$i], 279, 13);
      $outros_cred = substr($outros_cred, 0,11) .".".substr($outros_cred, 11,2);
      $outros_cred = number_format($outros_cred,2,",","."); 
      echo "OUTROS CRÉDITOS: R$ " . $outros_cred . "<br>";

      $boleto_dda = substr($arquivo[$i], 292, 1);
      echo "BOLETO DDA: " . $boleto_dda . "<br>";

      $data_credito = substr($arquivo[$i], 295, 6);
      echo "DATA CRÉDITO: " . substr($data_credito, 0,2)."/".substr($data_credito, 2,2)."/". substr($data_credito, 4,2) ."<br>"; 

      $instr_canc = substr($arquivo[$i], 301, 4);

         $sql = "SELECT motivos.descricao FROM motivos  INNER JOIN
                    detalhes_op ON detalhes_op.id = motivos.id_dt
                    WHERE motivos.codigo = '$instr_canc' AND detalhes_op.descricao = '$id_oc' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $instru_cance = $result['descricao'] ;
            }
      echo "INSTR.CANCELADA: " . $instr_canc . " - ".$instru_cance. "<br>";

      $zeros = substr($arquivo[$i], 311, 13);
      echo "ZEROS: " . $zeros  . "<br>";

      $nome_sacado = substr($arquivo[$i], 324, 30);
      echo "NOME DO SACADO: " . $nome_sacado . "<br>";

      $erros_msg_inf = substr($arquivo[$i], 377, 8); 

        $sql = "SELECT motivos.descricao FROM motivos  INNER JOIN
                    detalhes_op ON detalhes_op.id = motivos.id_dt
                    WHERE motivos.codigo = '$erros_msg_inf' AND detalhes_op.descricao = '$id_oc' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $msg_erro = $result['descricao'] ;
            }

      echo "ERROS / MENSAGEM INFORMATIVA: " . $erros_msg_inf ." - ".$msg_erro. "<br>";

      $cod_liq = substr($arquivo[$i], 392, 2);

        $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$cod_liq' AND operacoes.id = '6' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $liq = $result['descricao'] ;
            }        

      echo "CÓD. DE LIQUIDAÇÃO: " . $cod_liq . " - " .utf8_encode($liq). "<br>";

      $num_sequencial = substr($arquivo[$i], 394, 6);
      echo "NÚMERO SEQÜENCIAL: " . $num_sequencial . "<br>";

      echo "<br><br>" ;      
    }

  echo "<br><h2>Trailler</h2> <br><br>";
    
  $trailler = end($arquivo);

  $ident_reg_tra = substr($trailler, 0, 1);
  echo "<b>Identificação do Registro: </b>" .$ident_reg_tra . "<br>";

  $cod_retorno = substr($trailler, 1,1);
  echo "CÓDIGO DE RETORNO : " .$cod_retorno . "<br>";

  $cod_serviço = substr($trailler, 2,2);
  echo "CÓDIGO DE SERVIÇO: " . $cod_serviço . "<br>";

  $cod_banc = substr($trailler, 4,3);
  echo "CÓDIGO DO BANCO: " . $cod_banc . "<br>";

  $qtde_titulos = substr($trailler, 17, 8);
  echo "QTDE. DE TÍTULOS EM COBR. SIMPLES: " . $qtde_titulos . "<br>";

  $val_total = substr($trailler, 25, 14);
  $val_total = substr($val_total, 0,12) .".".substr($val_total, 12,2);
  $val_total = number_format($val_total,2,",",".");  
  echo "VR TOTAL DOS TÍTULOS EM COBRANÇA SIMPLES: R$ " . $val_total . "<br>";

  $aviso_banc = substr($trailler, 39 , 8);
  echo "REFERÊNCIA DO AVISO BANCÁRIO: " . $aviso_banc . "<br>";

  $qtde_titu = substr($trailler, 57, 8);
  echo "QTDE DE TÍTULOS EM COBRANÇA/VINCULADA: " . $qtde_titu . "<br>";

  
  $val_tot = substr($trailler, 65, 14); 
  $val_tot = substr($val_tot, 0,12) .".".substr($val_tot, 12,2);
  $val_tot = number_format($val_tot,2,",","."); 
  echo "VR TOTAL DOS TÍTULOS EM COBRANÇA/VINCULADA: R$ " . $val_tot . "<br>";

  $aviso_bancario = substr($trailler, 79, 8);
  echo "REFERÊNCIA DO AVISO BANCÁRIO: " . $aviso_bancario . "<br>";

  $qtde_tit_cobr_dir = substr($trailler, 177, 8);
  echo "QTDE. DE TÍTULOS EM COBR. DIRETA./ESCRITURAL: " . $qtde_tit_cobr_dir  . "<br>";

  $vr_tot_tit_cobr_dir = substr($trailler, 185, 14);
  $vr_tot_tit_cobr_dir = substr($vr_tot_tit_cobr_dir, 0,12) .".".substr($vr_tot_tit_cobr_dir, 12,2);
  $vr_tot_tit_cobr_dir = number_format($vr_tot_tit_cobr_dir,2,",","."); 
  echo "VR TOTAL DOS TÍTULOS EM COBR. DIRETA/ESCRIT. : R$ " . $vr_tot_tit_cobr_dir . "<br>";

  $av_banc = substr($trailler, 199, 8);
  echo "AVISO BANCÁRIO: " . $av_banc . "<br>";

  $contr_arq = substr($trailler, 207, 5);
  echo "CONTROLE DO ARQUIVO: " .$contr_arq . "<br>";

  $qtde_detalhes = substr($trailler, 212, 8);
  echo "QTDE DE DETALHES: " . $qtde_detalhes . "<br>";

  $val_tot_inf = substr($trailler, 220, 14);
  $val_tot_inf = substr($val_tot_inf, 0,12) .".".substr($val_tot_inf, 12,2);
  $val_tot_inf = number_format($val_tot_inf,2,",",".");    
  echo "VLR TOTAL INFORMADO: R$ " . $val_tot_inf . "<br>";

  $num_sequencial_trail = substr($trailler, 394, 6);
  echo "NÚMERO SEQÜENCIAL: " .$num_sequencial_trail . "<br>";   
?> 
</div>   

</body>
    </html>

