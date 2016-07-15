<?php

  require_once("includes/connection.php");

  $fp = fopen($file, "r");

  $content = fread( $fp, filesize($file) );

  $ident_regh = substr($content, 0, 1  ); 
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
  echo "DATA DE GERAÇÃO: " . $data_gera . "<br>";

  $densidade = substr($content, 100, 5);
  echo "DENSIDADE: " . $densidade . "<br>";

  $unid_dens = substr($content, 105, 3);
  echo "UNIDADE DE DENSID.: " . $unid_dens. "<br>";

  $num_seq_arq_ret = substr($content, 108, 5);
  echo "Nº SEQ. ARQUIVO RET.: " . $num_seq_arq_ret . "<br>";

  $data_cred = substr($content, 113, 6);  
  echo "DATA DE CRÉDITO: " .$data_cred . "<br>";

  $num_seq = substr($content, 394, 6);
  echo "NÚMERO SEQÜENCIAL: " . $num_seq . "<br>";

  $arquivo = file($file);
    echo "<br><h2>Transações</h2> <br><br>";

    for ($i = 1; $i < (count($arquivo)-1); $i++) {

      $tipo_reg = substr($arquivo[$i], 0,1);
      echo "<b>TIPO DE REGISTRO: </b> " . $tipo_reg  . "<br>";

      $cod_insc = substr($arquivo[$i], 1, 2);
      echo "CÓDIGO DE INSCRIÇÃO: " . $cod_insc . "<br>";

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
      echo "CÓD. DE OCORRÊNCIA: " . $cod_ocorrencia . "<br>";

      $data_ocorr = substr($arquivo[$i], 110, 6);
      echo "DATA DE OCORRÊNCIA: " . $data_ocorr . "<br>";

      $num_doc =  substr($arquivo[$i], 116, 10);
      echo "Nº DO DOCUMENTO: " .$num_doc . "<br>";

      $nosso_numero = substr($arquivo[$i], 126, 8);
      echo "NOSSO NÚMERO: " . $nosso_numero . "<br>";

      $vencimento = substr($arquivo[$i], 146, 6);
      echo "VENCIMENTO: " . $vencimento . "<br>";

      $val_titulo = substr($arquivo[$i], 152, 12);
      echo "VALOR DO TÍTULO: " . $val_titulo . "<br>";

      $cod_banco = substr($arquivo[$i], 165, 3);
      echo "CÓDIGO DO BANCO: " . $cod_banco . "<br>";

      $ag_cobradora = substr($arquivo[$i], 168, 4);
      echo "AGÊNCIA COBRADORA: " . $ag_cobradora . "<br>";

      $dac_ag_cobradora = substr($arquivo[$i], 172, 1);
      echo "DAC AG. COBRADORA: " . $dac_ag_cobradora . "<br>";

      $especie = substr($arquivo[$i], 173, 20);
      echo "ESPÉCIE: " . $especie . "<br>";

      $tarifa_cobr = substr($arquivo[$i], 175, 12);
      echo "TARIFA DE COBRANÇA: " . $tarifa_cobr .  "<br>";

      $valor_iof = substr($arquivo[$i], 214, 12);
      echo "VALOR DO IOF: " . $valor_iof .  "<br>";

      $val_abatimento =  substr($arquivo[$i], 227, 12);
      echo "VALOR ABATIMENTO: " . $val_abatimento .  "<br>";

      $desc = substr($arquivo[$i], 240, 12);
      echo "DESCONTOS: " . $desc . "<br>";

      $val_princ = substr($arquivo[$i], 253, 12);
      echo "VALOR PRINCIPAL: " . $val_princ .  "<br>";

      $jur_mora_multa = substr($arquivo[$i], 266, 12);
      echo "JUROS DE MORA/MULTA: " .$jur_mora_multa . "<br>";

      $outros_cred = substr($arquivo[$i], 279, 12);
      echo "OUTROS CRÉDITOS: " . $outros_cred . "<br>";

      $boleto_dda = substr($arquivo[$i], 292, 1);
      echo "BOLETO DDA: " . $boleto_dda . "<br>";

      $data_credito = substr($arquivo[$i], 295, 6);
      echo "DATA CRÉDITO: " . $data_credito . "<br>";

      $instr_canc = substr($arquivo[$i], 301, 4);
      echo "INSTR.CANCELADA: " . $instr_canc . "<br>";

      $zeros = substr($arquivo[$i], 311, 13);
      echo "ZEROS: " . $zeros  . "<br>";

      $nome_sacado = substr($arquivo[$i], 324, 30);
      echo "NOME DO SACADO: " . $nome_sacado . "<br>";

      $erros_msg_inf = substr($arquivo[$i], 377, 8); 
      echo "ERROS / MENSAGEM INFORMATIVA: " . $erros_msg_inf . "<br>";

      $cod_liq = substr($arquivo[$i], 392, 2);
      echo "CÓD. DE LIQUIDAÇÃO: " . $cod_liq . "<br>";

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

  $val_total = substr($trailler, 25, 13);
  echo "VR TOTAL DOS TÍTULOS EM COBRANÇA SIMPLES: " . $val_total . "<br>";

  $aviso_banc = substr($trailler, 39 , 8);
  echo "REFERÊNCIA DO AVISO BANCÁRIO: " . $aviso_banc . "<br>";

  $qtde_titu = substr($trailler, 57, 8);
  echo "QTDE DE TÍTULOS EM COBRANÇA/VINCULADA: " . $qtde_titu . "<br>";

  
  $val_tot = substr($trailler, 65, 13); 
  echo "VR TOTAL DOS TÍTULOS EM COBRANÇA/VINCULADA: " . $val_tot . "<br>";

  $aviso_bancario = substr($trailler, 79, 8);
  echo "REFERÊNCIA DO AVISO BANCÁRIO: " . $aviso_bancario . "<br>";

  $qtde_tit_cobr_dir = substr($trailler, 177, 8);
  echo "QTDE. DE TÍTULOS EM COBR. DIRETA./ESCRITURAL: " . $qtde_tit_cobr_dir  . "<br>";

  $vr_tot_tit_cobr_dir = substr($trailler, 187, 13);
  echo "VR TOTAL DOS TÍTULOS EM COBR. DIRETA/ESCRIT. : " . $vr_tot_tit_cobr_dir . "<br>";

  $av_banc = substr($trailler, 199, 8);
  echo "AVISO BANCÁRIO: " . $av_banc . "<br>";

  $contr_arq = substr($trailler, 207, 5);
  echo "CONTROLE DO ARQUIVO: " .$contr_arq . "<br>";

  $qtde_detalhes = substr($trailler, 212, 8);
  echo "QTDE DE DETALHES: " . $qtde_detalhes . "<br>";

  $val_tot_inf = substr($trailler, 220, 13);
  echo "VLR TOTAL INFORMADO: " . $val_tot_inf . "<br>";

  $num_sequencial_trail = substr($trailler, 394, 6);
  echo "NÚMERO SEQÜENCIAL: " .$num_sequencial_trail . "<br>";   
?>    



