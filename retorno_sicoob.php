<?php

	require_once("includes/connection.php");

	header('Content-type: text/html; charset=utf8');  	

	$content = file($file) ;

	echo "<h1><center>Arquivo de Retorno do Sicoob</center></h1><br><br>";
	
	echo "<h2>HEADER DO ARQUIVO RETORNO</h2><br><br>";

	$ident_reg_h = substr($content[0], 0, 1);
	echo "<b>Identificação do Registro Header: </b>" . $ident_reg_h . "<br>";

	$tipo_op_h = substr($content[0],1,1);	
	echo "Tipo de Operação: " . $tipo_op_h . "<br>";

	$ident_tipo_op_h = substr($content[0],2,7);
	echo "Identificação Tipo de Operação: " .$ident_tipo_op_h."<br>";

	$ident_tipo_serv_h = substr($content[0],9,2);
	echo "Identificação do Tipo de Serviço: ".$ident_tipo_serv_h."<br>";

	$ident_exten_tipo_serv_h = utf8_encode(mb_substr($content[0],11,8));
	echo "Identificação por Extenso do Tipo de Serviço: ".$ident_exten_tipo_serv_h."<br>";

	$pref_coop_h = substr($content[0],26,4);
	echo "Prefixo da Cooperativa: " .$pref_coop_h."<br>";

	$dig_verif_pref_h = substr($content[0],30,1);
	echo "Dígito Verificador do Prefixo: ".$dig_verif_pref_h."<br>";

	$cod_cli_benif_h = substr($content[0],31,8);
	echo "Código do Cliente/Beneficiário: " . $cod_cli_benif_h."<br>";

	$dig_verif_cod_h = substr($content[0],39,1);
	echo "Dígito Verificador do Código: ". $dig_verif_cod_h."<br>";

	$num_conv_lider_h = substr($content[0],40,6);
	echo "Número do convênio líder: ".$num_conv_lider_h."<br>";

	$nome_benif_h = substr($content[0],46,30);
	echo "Nome do Beneficiário: " . $nome_benif_h."<br>";

	$ident_banco_h = substr($content[0],76,18);
	echo "Identificação do Banco: ".$ident_banco_h."<br>";

	$data_grav_ret_h = substr($content[0],94,6);
	echo "Data da Gravação do Retorno: " . substr($data_grav_ret_h, 0,2)."/".substr($data_grav_ret_h, 2,2)."/". substr($data_grav_ret_h, 4,2) ."<br>"; 

	$seq_ret_h = substr($content[0],100,7);
	echo "Seqüencial do Retorno: ". $seq_ret_h."<br>";

	$seq_reg_h = substr($content[0],394,6);
	echo "Seqüencial do Registro: " . $seq_reg_h."<br>";

	$arquivo = file($file);

    echo "<br><h3>TRANSAÇÕES</h3> <br><br>";

    for ($i = 1; $i < (count($arquivo)-1); $i++) {

    	$ident_reg_d = substr($arquivo[$i],0,1);
    	echo "<b>Identificação do Registro Detalhe: </b>" . $ident_reg_d ."<br>";

    	$tipo_insc_benef_d = substr($arquivo[$i],1,2);

    		$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                  operacoes ON operacoes.id = detalhes_op.id_op
                  WHERE detalhes_op.codigo = '$tipo_insc_benef_d' AND operacoes.id = '60' ";

          $r = @mysqli_query($conexao, $sql);

          while ($result = mysqli_fetch_array($r)) {
              $tipo_inscr = $result['descricao'] ;
          }

    	echo "Tipo de Inscrição do Beneficiário: " .$tipo_insc_benef_d. " - ". utf8_encode($tipo_inscr). "<br>";

    	$num_cpf_cnpj_benif_d = substr($arquivo[$i],4,14);
    	echo "Número do CPF/CNPJ do Beneficiário: " . $num_cpf_cnpj_benif_d."<br>";

    	$pref_coop_d = substr($arquivo[$i],17,4);
    	echo "Prefixo da Cooperativa:  " . $pref_coop_d."<br>";

    	$dig_verif_pref_d = substr($arquivo[$i],21,1);
    	echo "Dígito Verificador do Prefixo: " . $dig_verif_pref_d."<br>";

    	$cc_d =  substr($arquivo[$i],22,8);
    	echo "Conta Corrente: " . $cc_d ."<br>";

    	$dig_verif_cc_d = substr($arquivo[$i],30,1);
    	echo "Dígito Verificador da Conta: : ".$dig_verif_cc_d."<br>";

		$num_conv_cobr_benefic_d = substr($arquivo[$i],31,6);	
		echo "Número do Convênio de Cobrança do Beneficiário: " .$num_conv_cobr_benefic_t . "<br>";

		$num_contr_partic_d = substr($arquivo[$i],37,25);
		echo "Número de Controle do Participante: ". $num_contr_partic_d. "<br>";

		$nosso_num_d = substr($arquivo[$i],62,11);
		echo "Nosso Número: " . $nosso_num_d. "<br>";

		$dv_nosso_num_d = substr($arquivo[$i],73,1);
		echo "dv_Nosso Número: " . $dv_nosso_num_d. "<br>";

		$num_parc_d = substr($arquivo[$i],74,2);
		echo "Número da Parcela: " . $num_parc_d. "<br>";

		$grupo_valor_d = substr($arquivo[$i],76,4);
		echo "Grupo de Valor: ". $grupo_valor_d."<br>";

		$cod_baixa_recusa_d = substr($arquivo[$i],80,2);
		echo "Código de Baixa/Recusa: ".$cod_baixa_recusa_d ."<br>";

		$pref_tit_d = substr($arquivo[$i],82,3);

			$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                  operacoes ON operacoes.id = detalhes_op.id_op
                  WHERE detalhes_op.codigo = '$pref_tit_d' AND operacoes.id = '59' ";

          $r = @mysqli_query($conexao, $sql);

          while ($result = mysqli_fetch_array($r)) {
              $prefix_tit = $result['descricao'] ;
          }


		echo "Prefixo do Título: ". $pref_tit_d. " - ". utf8_encode($prefix_tit). "<br>";

		$var_cart_d = substr($arquivo[$i],85,3);
		echo "Variação da Carteira:  " . $var_cart_d."<br>";

		$cont_cau_d = substr($arquivo[$i],88,1);
		echo "Conta Caução: ".$cont_cau_d."<br>";

		$cod_resp_d = substr($arquivo[$i],89,5);
		echo "Código de responsabilidade: ".$cod_resp_d."<br>";

		$dv_cod_resp_d = substr($arquivo[$i],94,1);
		echo "DV do código de responsabilidade: ".$dv_cod_resp_d."<br>";

		$taxa_desc_d = substr($arquivo[$i],95,5);
		$taxa_desc_d = substr($taxa_desc_d, 0,3) .".".substr($taxa_desc_d, 3,2);
  		$taxa_desc_d = number_format($taxa_desc_d,2,",","."); 
		echo "Taxa de desconto: R$ " .$taxa_desc_d."<br>";

		$taxa_iof_d = substr($arquivo[$i],100,5);
		$taxa_iof_d = substr($taxa_iof_d, 0,3) .".".substr($taxa_iof_d, 3,2);
  		$taxa_iof_d = number_format($taxa_iof_d,2,",","."); 
		echo "Taxa de IOF: R$ " .$taxa_iof_d."<br>";

		$cart_mod_d = substr($arquivo[$i],106,2);

			$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                  operacoes ON operacoes.id = detalhes_op.id_op
                  WHERE detalhes_op.codigo = '$cart_mod_d' AND operacoes.id = '61' ";

          $r = @mysqli_query($conexao, $sql);

          while ($result = mysqli_fetch_array($r)) {
              $cart_mod = $result['descricao'] ;
          }

		echo "Carteira/Modalidade: ".$cart_mod_d." - ".utf8_encode($cart_mod). "<br>";

		$coman_mov_d = substr($arquivo[$i],108,2);

				$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                  operacoes ON operacoes.id = detalhes_op.id_op
                  WHERE detalhes_op.codigo = '$coman_mov_d' AND operacoes.id = '62' ";

          $r = @mysqli_query($conexao, $sql);

          while ($result = mysqli_fetch_array($r)) {
              $comam_mov = $result['descricao'] ;
          }


		echo "Comando/Movimento: " . $coman_mov_d." - ".utf8_encode($comam_mov). "<br>";

		$data_entr_liq_d = substr($arquivo[$i],110,6);
		echo "Data da Entrada/Liquidação: ". substr($data_entr_liq_d, 0,2)."/".substr($data_entr_liq_d, 2,2)."/". substr($data_entr_liq_d, 4,2) ."<br>"; 

		$seu_num_num_atrib_emp_d = substr($arquivo[$i],116,10);
		echo "Seu Número/Número atribuído pela Empresa: ".$seu_num_num_atrib_emp_d."<br>";

		$data_venc_tit_d = substr($arquivo[$i],146,6);
		echo "Data Vencimento Título: ". substr($data_venc_tit_d, 0,2)."/".substr($data_venc_tit_d, 2,2)."/". substr($data_venc_tit_d, 4,2) ."<br>"; 

		$val_tit_d = substr($arquivo[$i],152,13);
		$val_tit_d = substr($val_tit_d, 0,11) .".".substr($val_tit_d, 11,2);
  		$val_tit_d = number_format($val_tit_d,2,",","."); 
		echo "Valor Titulo: R$ ".$val_tit_d."<br>";

		$cod_banco_receb_d = substr($arquivo[$i], 165,3);
		echo "Código do banco recebedor: ".$cod_banco_receb_d."<br>";

		$pref_ag_receb_d = substr($arquivo[$i], 168,4);
		echo "Prefixo da agência recebedora: ".$pref_ag_receb_d."<br>";

		$dv_pref_receb_d = substr($arquivo[$i], 172,1);
		echo "DV prefixo recebedora: ".$dv_pref_receb_d."<br>";

		$esp_tit_d = substr($arquivo[$i],173,2);

				$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                  operacoes ON operacoes.id = detalhes_op.id_op
                  WHERE detalhes_op.codigo = '$esp_tit_d' AND operacoes.id = '63' ";

          $r = @mysqli_query($conexao, $sql);

          while ($result = mysqli_fetch_array($r)) {
              $espec_tit = $result['descricao'] ;
          }


		echo "Espécie do Título: " .$esp_tit_d." - ".utf8_encode($espec_tit). "<br>";

		$data_cred_d = substr($arquivo[$i],175,6);
		echo "Data do crédito: " . substr($data_cred_d, 0,2)."/".substr($data_cred_d, 2,2)."/". substr($data_cred_d, 4,2) ."<br>"; 

		$val_tarif_d = substr($arquivo[$i],181,7);
		$val_tarif_d = substr($val_tarif_d, 0,5) .".".substr($val_tarif_d, 5,2);
  		$val_tarif_d = number_format($val_tarif_d,2,",","."); 
		echo "Valor da Tarifa: R$ " . $val_tarif_d ."<br>";

		$out_desp_d = substr($arquivo[$i],187,13);
		$out_desp_d = substr($out_desp_d, 0,11) .".".substr($out_desp_d, 11,2);
  		$out_desp_d = number_format($out_desp_d,2,",","."); 
		echo "Outras despesas: R$ ".$out_desp_d."<br>";

		$jur_desc_d = substr($arquivo[$i],201,13);
		$jur_desc_d = substr($jur_desc_d, 0,11) .".".substr($jur_desc_d, 11,2);
  		$jur_desc_d = number_format($jur_desc_d,2,",","."); 
		echo "Juros do desconto: R$ " .$jur_desc_d."<br>";

		$iof_desc_d = substr($arquivo[$i],214,13);
		$iof_desc_d = substr($iof_desc_d, 0,11) .".".substr($iof_desc_d, 11,2);
  		$iof_desc_d = number_format($iof_desc_d,2,",","."); 
		echo "IOF do desconto: R$ ".$iof_desc_d."<br>";

		$val_abat_d = substr($arquivo[$i],227,13);
		$val_abat_d = substr($val_abat_d, 0,11) .".".substr($val_abat_d, 11,2);
  		$val_abat_d = number_format($val_abat_d,2,",","."); 
		echo "Valor do abatimento: R$ " .$val_abat_d."<br>";


		$desc_conced_d = substr($arquivo[$i],240,13);
		$desc_conced_d = substr($desc_conced_d, 0,11) .".".substr($desc_conced_d, 11,2);
  		$desc_conced_d = number_format($desc_conced_d,2,",","."); 
		Echo "Desconto concedido (diferença entre valor do título e valor recebido): R$ ". $desc_conced_d."<br>";

		$val_receb_parcial_d = substr($arquivo[$i],253,13);
		$val_receb_parcial_d = substr($val_receb_parcial_d, 0,11) .".".substr($val_receb_parcial_d, 11,2);
  		$val_receb_parcial_d = number_format($val_receb_parcial_d,2,",","."); 
		echo "Valor recebido (valor recebido parcial): R$ " .$val_receb_parcial_d."<br>";

		$juros_mora_d = substr($arquivo[$i],266,13);
		$juros_mora_d = substr($juros_mora_d, 0,11) .".".substr($juros_mora_d, 11,2);
  		$juros_mora_d = number_format($juros_mora_d,2,",","."); 
		echo "Juros de Mora: R$ " .$juros_mora_d."<br>";

		$out_receb_d = substr($arquivo[$i],279,13);
		$out_receb_d = substr($out_receb_d, 0,11) .".".substr($out_receb_d, 11,2);
  		$out_receb_d = number_format($out_receb_d,2,",","."); 
		echo "Outros recebimentos: R$ " .$out_receb_d."<br>";

		$abat_n_aprov_pelo_pag_d = substr($arquivo[$i],292,13);
		echo "Abatimento não aproveitado pelo Pagador: " .$abat_n_aprov_pelo_pag_dt."<br>";

		$val_lanc_d = substr($arquivo[$i],305,13);
		$val_lanc_d = substr($val_lanc_d, 0,11) .".".substr($val_lanc_d, 11,2);
  		$val_lanc_d = number_format($val_lanc_d,2,",","."); 
		echo "Valor do Lançamento: R$" . $val_lanc_d."<br>";

		$ind_deb_cred_d = substr($arquivo[$i],318,1);
		echo "Indicativo débito/crédito: " .$ind_deb_cred_d."<br>";

		$indic_valor_d = substr($arquivo[$i],319,1);
		echo "Indicativo valor: " .$indic_valor_d."<br>";

		$val_ajust_d = substr($arquivo[$i],320,12);
		$val_ajust_d = substr($val_ajust_d, 0,10) .".".substr($val_ajust_d, 10,2);
  		$val_ajust_d = number_format($val_ajust_d,2,",","."); 
		echo "Valor do Ajuste: R$ ".$val_ajust_d."<br>";
		

		$cpf_cnpj_pag_d = substr($arquivo[$i],342,14);
		echo "CPF/CNPJ do Pagador: ".$cpf_cnpj_pag_d."<br>";

		$seq_reg_d = substr($arquivo[$i],394,6);
		echo "Seqüencial do Registro: ".$seq_reg_d."<br>";

    	echo "<br><br>";   
    }

    echo "<br><h2>Trailler</h2> <br><br>";
    
  	$trailler = end($arquivo);

  	$ident_reg_tra_t = substr($trailler, 0, 1);
  	echo "<b>Identificação do Registro Trailer: </b>" .$ident_reg_tra_t . "<br>";

  	$ident_tipo_serv_t = substr($trailler,1,2);
  	echo "Identificação do Tipo de Serviço: ". $ident_tipo_serv_t. "<br>";

  	$num_banco_t = substr($trailler,3,3);
  	echo "Número Banco: ". $num_banco_t. "<br>";

  	$cod_coop_reme_t = substr($trailler,6,4);
  	echo "Código da Cooperativa Remetente: ".$cod_coop_reme_t. "<br>";

  	$sig_coop_rem_t = substr($trailler,10,25);
  	echo "Sigla da Cooperativa Remetente: ".utf8_encode($sig_coop_rem_t). "<br>";

  	$end_coop_rem_t = substr($trailler,35,50);
  	echo "Endereço da Cooperativa Remetente: " .utf8_encode($end_coop_rem_t). "<br>";

  	$bairro_coop_rem_t = substr($trailler,85,30);
  	echo "Bairro da Cooperativa Remetente: " . utf8_encode($bairro_coop_rem_t). "<br>";

  	$cep_coop_rem_t = substr($trailler,115,8);
  	echo "CEP da Cooperativa Remetente: ".substr($cep_coop_rem_t, 0,5)."-". substr($cep_coop_rem_t, 4,3) ."<br>"; 

  	$cid_coop_rem_t = substr($trailler,123,30);
  	echo "Cidade da Cooperativa Remetente: " . utf8_encode($cid_coop_rem_t). "<br>";

  	$uf_coop_rem_t = substr($trailler,153,2);
  	echo "UF da Cooperativa Remetente: ".$uf_coop_rem_t. "<br>";

  	$data_mov_t = substr($trailler,155,8);
  	echo "Data do movimento: " . substr($data_mov_t, 0,2)."/".substr($data_mov_t, 2,2)."/". substr($data_mov_t, 4,2) ."<br>"; 

	$qtde_reg_det_t = substr($trailler,163,8);	
	echo "Quantidade de registros no Detalhe: ".$qtde_reg_det_t. "<br>";

	$ult_nosso_num_benef_t = substr($trailler,171,11);
	echo "Último Nosso Número Beneficiário: " .$ult_nosso_num_benef_t. "<br>";

	$seq_reg_t = substr($trailler,394,6);
	echo "Seqüencial do Registro: ". $seq_reg_t. "<br>";
?>

