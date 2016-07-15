<?php

	require_once("includes/connection.php");  

	$content = file($file) ;

	echo "<h2>HEADER DO ARQUIVO RETORNO</h2><br><br>";

	$cod_banco_comp = substr($content[0], 0, 3);
	echo "<b>Código do Banco na compensação: </b>" . $cod_banco_comp . "<br>";

	$lote_serv =  substr($content[0], 3, 4);
	echo "Lote de serviço: " . $lote_serv . "<br>";

	$tipo_regist = substr($content[0], 7, 1);
	echo "Tipo de registro: ". $tipo_regist . "<br>";

	$tipo_insc_emp = substr($content[0], 16, 1);
	echo "Tipo de inscrição da empresa: " . $tipo_insc_emp . "<br>";

	$num_insc_emp = substr($content[0], 17, 15);
	echo "Nº de inscrição da empresa: " . $num_insc_emp . "<br>";

	$ag_cedente = substr($content[0], 32, 4);
	echo "Agência do Cedente: " . $ag_cedente . "<br>";

	$dig_ag_ced = substr($content[0], 36, 1);
	echo "Dígito da Agência do Cedente: " . $dig_ag_ced . "<br>";

	$num_cc = substr($content[0], 37, 9);
	echo "Número da conta corrente: " . $num_cc . "<br>";

	$dig_verif_conta = substr($content[0], 46, 1);
	echo "Dígito verificador da conta: " . $dig_verif_conta . "<br>";

	$cod_cedente =  substr($content[0], 52, 9);
	echo "Código do Cedente: " . $cod_cedente . "<br>";

	$nome_emp = substr($content[0], 72, 30);
	echo "Nome da empresa: " . $nome_emp . "<br>";

	$nome_banco = substr($content[0], 102, 30);
	echo "Nome do Banco: " . $nome_banco . "<br>";

	$cod_remessa = substr($content[0], 142, 1);
	echo "Código remessa / retorno: " . $cod_remessa . "<br>";

	$data_gera_arq = substr($content[0], 143, 8);
	echo "Data de geração do arquivo: " . $data_gera_arq . "<br>";

	$num_seq_arq = substr($content[0], 157, 6);
	echo "Nº seqüencial do arquivo: " . $num_seq_arq . "<br>";

	$num_ver_layout_arq = substr($content[0], 165, 3);
	echo "Nº da versão do layout do arquivo: " . $num_ver_layout_arq . "<br><br>";

	echo "<h2>HEADER DO LOTE RETORNO</h2><br><br>";

	$cod_banco_comp = substr($content[1], 0, 3);
	echo "<b>Código do Banco na compensação: </b>" . $cod_banco_comp . "<br>";

	$num_lote_retorno = substr($content[1], 3, 4);
	echo "Numero do lote retorno: " . $num_lote_retorno . "<br>";

	$tipo_registro = substr($content[1], 7, 1);
	echo "Tipo de registro: " . $tipo_registro . "<br>";

	$tipo_op = substr($content[1], 8, 1);
	echo "Tipo de operação: " . $tipo_op . "<br>";

	$tipo_serv = substr($content[1], 9,2);
	echo "Tipo de serviço: " . $tipo_serv . "<br>";

	$num_ver_layout_lote = substr($content[1], 13, 3);
	echo "Nº da versão do layout do lote: " .$num_ver_layout_lote . "<br>";

	$reservado =  substr($content[1], 16, 1);
	echo "Reservado: " . $reservado . "<br>";

	$tipo_incric_emp = substr($content[1], 17, 1);
	echo "Tipo de inscrição da empresa: " .$tipo_incric_emp . "<br>";

	$num_inscr_emp = substr($content[1], 18, 15);
	echo "Nº de inscrição da empresa: ". $num_inscr_emp. "<br>";

	$cod_ced = substr($content[1], 33, 9); 
	echo "Código do Cedente: " . $cod_ced . "<br>";

	$ag_ced = substr($content[1], 53, 4);
	echo "Agência do Cedente: " . $ag_ced. "<br>";

	$dig_ag_cedente = substr($content[1], 57, 1);
	echo "Dígito da Agência do Cedente: " .$dig_ag_cedente . "<br>";

	$num_conta_cedente = substr($content[1], 58, 9);	
	echo "Número da conta do Cedente: " . $num_conta_cedente . "<br>";

	$dig_verific_conta = substr($content[1], 67, 1);
	echo "Dígito verificador da conta: " . $dig_verific_conta . "<br>";

	$nome_empresa = substr($content[1], 73, 30);
	echo "Nome da empresa: " . $nome_empresa . "<br>";

	$num_ret = substr($content[1], 183, 8);
	echo "Número do Retorno: " . $num_ret . "<br>";

	$data_grav_remessa = substr($content[1], 191, 8);
	echo "Data da gravação remessa/retorno: " .$data_grav_remessa . "<br>";

	$arquivo = file($file);

	echo "<br><h2>Transações Segmento T e U </h2><br><br>";

	$t = 2;
	$u = 3;

	while ( $t && $u < (count($arquivo)-2)) {

	  $cod_banco_comp_t = substr($arquivo[$t], 0, 3);
	  echo "<b>Código do Banco na compensação: </b>" . $cod_banco_comp_t . "<br>";

	  $cod_banco_comp_u = substr($arquivo[$u], 0, 3);
	  echo "<b>Código do Banco na compensação: </b>" . $cod_banco_comp_u . "<br>";

	  $num_lote_ret_t = substr($arquivo[$t], 3, 4);
	  echo "Numero do lote retorno: " . $num_lote_ret_t . "<br>";

	  $lote_serv_u = substr($arquivo[$u], 3, 4);
	  echo "Lote de serviço: " . $lote_serv_u . "<br>";

	  $tipo_reg_t = substr($arquivo[$t], 7, 1);
	  echo "Tipo de registro: " . $tipo_reg_t . "<br>";

	  $tipo_reg_u = substr($arquivo[$u], 7, 1);
	  echo "Tipo de registro: " . $tipo_reg_u . "<br>";

	  $num_seq_reg_lote_t = substr($arquivo[$t], 8, 5);
	  echo "Nº sequencial do registro no lote: " . $num_seq_reg_lote_t. "<br>";

	  $num_seq_reg_lote_u = substr($arquivo[$u], 8, 5);
	  echo "Nº sequencial do registro no lote: " . $num_seq_reg_lote_u. "<br>";

	  $cod_seg_reg_det_t = substr($arquivo[$t], 13, 1);
	  echo "Cód. segmento do registro detalhe: " . $cod_seg_reg_det_t . "<br>";

	  $cod_seg_reg_det_u = substr($arquivo[$u], 13, 1);
	  echo "Cód. segmento do registro detalhe: " . $cod_seg_reg_det_u . "<br>";

	  $cod_mov_t = substr($arquivo[$t], 15, 2);
	  echo "Código de movimento (ocorrência): " . $cod_mov_t. "<br>";

	  $cod_mov_u = substr($arquivo[$u], 15, 2);
	  echo "Código de movimento (ocorrência): " . $cod_mov_u. "<br>";

	  $ag_cedente_t = substr($arquivo[$t], 17, 4);
	  echo "Agência do Cedente: " . $ag_cedente_t . "<br>";

	  $jur_multa_u = substr($arquivo[$u], 17, 14);
	  echo "Juros / Multa / Encargos: " . $jur_multa_u . "<br>";

	  $dig_ag_cedente_t = substr($arquivo[$t], 21,1);
	  echo "Dígito da Agência do Cedente: " . $dig_ag_cedente_t. "<br>";

	  $val_desc_conc_u = substr($arquivo[$u], 32,14);
	  echo "Valor do desconto concedido: ". $val_desc_conc_u. "<br>";

	  $num_cc_t = substr($arquivo[$t], 22,9);
	  echo "Número da conta corrente: ". $num_cc_t . "<br>";

	  $val_abat_conced_canc_u = substr($arquivo[$u], 47,14);
	  echo "Valor do Abatimento Concedido/Cancelado: " . $val_abat_conced_canc_u . "<br>";

	  $dig_verific_conta_t = substr($arquivo[$t], 32,1);
	  echo "Dígito verificador da conta: " . $dig_verific_conta_t . "<br>";

	  $val_iof_rec_u =  substr($arquivo[$u], 62,14);
	  echo "Valor do IOF recolhido: " . $val_iof_rec_u . "<br>";

	  $ident_tit_banco_t = substr($arquivo[$t],40,13);
	  echo "Identificação do título no Banco: " . $ident_tit_banco_t .  "<br>";

	  $val_pago_sacado_u =  substr($arquivo[$u],77,14);
	  echo "Valor pago pelo sacado	: ". $val_pago_sacado_u . "<br>";

	  $cod_cart_t = substr($arquivo[$t],53,1);
	  echo "Código da carteira: " . $cod_cart_t. "<br>";

	  $val_liq_cred_u = substr($arquivo[$u],92,14);
	  echo "Valor liquido a ser creditado: " . $val_liq_cred_u. "<br>";

	  $num_doc_cobr_t = substr($arquivo[$t],54,15);
	  echo "Nº do documento de cobrança: " . $num_doc_cobr_t. "<br>";

	  $val_out_desp_u = substr($arquivo[$u],107,14);
	  echo "Valor de outras despesas: ". $val_out_desp_u. "<br>";

	  $data_venc_tit_t = substr($arquivo[$t],69,8);
	  echo "Data do vencimento do título: " . $data_venc_tit_t . "<br>";
	  











	   echo "<br><br>" ; 

	  $t++; 
	  $u++;
	 
	} 


?>