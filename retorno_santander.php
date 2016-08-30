<?php

	require_once("includes/connection.php");  

	$content = file($file) ;

	echo "<h1><center>Arquivo de Retorno do Santander</center></h1><br><br>";

	echo "<h2>HEADER DO ARQUIVO RETORNO</h2><br><br>";

	$cod_banco_comp = substr($content[0], 0, 3);
	echo "<b>Código do Banco na compensação: </b>" . $cod_banco_comp . "<br>";

	$lote_serv =  substr($content[0], 3, 4);
	echo "Lote de serviço: " . $lote_serv . "<br>";

	$tipo_regist = substr($content[0], 7, 1);
	echo "Tipo de registro: ". $tipo_regist . "<br>";

	$tipo_insc_emp = substr($content[0], 16, 1);

		$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$tipo_insc_emp' AND operacoes.id = '10' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $tipo_inscr_emp_h_arq = $result['descricao'] ;
            }

	echo "Tipo de inscrição da empresa: " . $tipo_insc_emp . " - ".utf8_encode($tipo_inscr_emp_h_arq). "<br>";

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
	echo "Data de geração do arquivo: " . substr($data_gera_arq, 0,2)."/".substr($data_gera_arq, 2,2)."/". substr($data_gera_arq, 4,4) ."<br>"; 

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

		$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$tipo_incric_emp' AND operacoes.id = '11' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $tipo_inscri_empr = $result['descricao'] ;
            }
	echo "Tipo de inscrição da empresa: " .$tipo_incric_emp. " - " .utf8_encode($tipo_inscri_empr) . "<br>";

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
	echo "Data da gravação remessa/retorno: " . substr($data_grav_remessa, 0,2)."/".substr($data_grav_remessa, 2,2)."/". substr($data_grav_remessa, 4,4) ."<br>"; 

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
			$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$cod_mov_u' AND operacoes.id = '13' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $cod_mov_seg_t_u = $result['descricao'] ;
            }
		echo "Código de movimento (ocorrência): " . $cod_mov_t. " - " .utf8_encode($cod_mov_seg_t_u). "<br>";

		$cod_mov_u = substr($arquivo[$u], 15, 2);			
		echo "Código de movimento (ocorrência): " . $cod_mov_u." - " .utf8_encode($cod_mov_seg_t_u).  "<br>";

		$ag_cedente_t = substr($arquivo[$t], 17, 4);
		echo "Agência do Cedente: " . $ag_cedente_t . "<br>";

		$jur_multa_u = substr($arquivo[$u], 17, 15);
		$jur_multa_u = substr($jur_multa_u, 0,13) .".".substr($jur_multa_u, 13,2);
  		$jur_multa_u = number_format($jur_multa_u,2,",","."); 
		echo "Juros / Multa / Encargos: R$ " . $jur_multa_u . "<br>";

		$dig_ag_cedente_t = substr($arquivo[$t], 21,1);
		echo "Dígito da Agência do Cedente: " . $dig_ag_cedente_t. "<br>";

		$val_desc_conc_u = substr($arquivo[$u], 32,15);
		$val_desc_conc_u = substr($val_desc_conc_u, 0,13) .".".substr($val_desc_conc_u, 13,2);
  		$val_desc_conc_u = number_format($val_desc_conc_u,2,",","."); 
		echo "Valor do desconto concedido: R$ ". $val_desc_conc_u. "<br>";

		$num_cc_t = substr($arquivo[$t], 22,9);
		echo "Número da conta corrente: ". $num_cc_t . "<br>";

		$val_abat_conced_canc_u = substr($arquivo[$u], 47,15);
		$val_abat_conced_canc_u = substr($val_abat_conced_canc_u, 0,13) .".".substr($val_abat_conced_canc_u, 13,2);
  		$val_abat_conced_canc_u = number_format($val_abat_conced_canc_u,2,",",".");
		echo "Valor do Abatimento Concedido/Cancelado: R$ " . $val_abat_conced_canc_u . "<br>";

		$dig_verific_conta_t = substr($arquivo[$t], 32,1);
		echo "Dígito verificador da conta: " . $dig_verific_conta_t . "<br>";

		$val_iof_rec_u =  substr($arquivo[$u], 62,15);
		$val_iof_rec_u = substr($val_iof_rec_u, 0,13) .".".substr($val_iof_rec_u, 13,2);
  		$val_iof_rec_u = number_format($val_iof_rec_u,2,",",".");
		echo "Valor do IOF recolhido: R$ " . $val_iof_rec_u . "<br>";

		$ident_tit_banco_t = substr($arquivo[$t],40,13);
		echo "Identificação do título no Banco: " . $ident_tit_banco_t .  "<br>";

		$val_pago_sacado_u =  substr($arquivo[$u],77,15);
		$val_pago_sacado_u = substr($val_pago_sacado_u, 0,13) .".".substr($val_pago_sacado_u, 13,2);
  		$val_pago_sacado_u = number_format($val_pago_sacado_u,2,",",".");
		echo "Valor pago pelo sacado: R$ ". $val_pago_sacado_u . "<br>";

		$cod_cart_t = substr($arquivo[$t],53,1);
		echo "Código da carteira: " . $cod_cart_t. "<br>";

		$val_liq_cred_u = substr($arquivo[$u],92,15);
		$val_liq_cred_u = substr($val_liq_cred_u, 0,13) .".".substr($val_liq_cred_u, 13,2);
  		$val_liq_cred_u = number_format($val_liq_cred_u,2,",",".");
		echo "Valor liquido a ser creditado: R$ " . $val_liq_cred_u. "<br>";

		$num_doc_cobr_t = substr($arquivo[$t],54,15);
		echo "Nº do documento de cobrança: " . $num_doc_cobr_t. "<br>";

		$val_out_desp_u = substr($arquivo[$u],107,15);
		$val_out_desp_u = substr($val_out_desp_u, 0,13) .".".substr($val_out_desp_u, 13,2);
  		$val_out_desp_u = number_format($val_out_desp_u,2,",",".");
		echo "Valor de outras despesas: R$ ". $val_out_desp_u. "<br>";

		$data_venc_tit_t = substr($arquivo[$t],69,8);
		echo "Data do vencimento do título: " . substr($data_venc_tit_t, 0,2)."/".substr($data_venc_tit_t, 2,2)."/". substr($data_venc_tit_t, 4,4) ."<br>"; 

		$val_out_cred_u = substr($arquivo[$u],122,15);
		$val_out_cred_u = substr($val_out_cred_u, 0,13) .".".substr($val_out_cred_u, 13,2);
  		$val_out_cred_u = number_format($val_out_cred_u,2,",","."); 
		echo "Valor de outros créditos: R$ " . $val_out_cred_u. "<br>";

		$val_nomi_tit_t = substr($arquivo[$t],77,15);
		$val_nomi_tit_t = substr($val_nomi_tit_t, 0,13) .".".substr($val_nomi_tit_t, 13,2);
  		$val_nomi_tit_t = number_format($val_nomi_tit_t,2,",","."); 
		echo "Valor nominal do título: R$ " . $val_nomi_tit_t. "<br>";

		$data_ocor_u = substr($arquivo[$u], 137,8);
		echo "Data da ocorrência: " . substr($data_ocor_u, 0,2)."/".substr($data_ocor_u, 2,2)."/". substr($data_ocor_u, 4,4) ."<br>"; 

		$num_banco_cobr_rece_t = substr($arquivo[$t],92,3);
		echo "Nº do Banco Cobrador / Recebedor: ".$num_banco_cobr_rece_t. "<br>";


		$data_efet_cred_u = substr($arquivo[$u],145,8);
		echo "Data da efetivação do crédito: " . substr($data_efet_cred_u, 0,2)."/".substr($data_efet_cred_u, 2,2)."/". substr($data_efet_cred_u, 4,4) ."<br>"; 

		$ag_cob_rec_t = substr($arquivo[$t],95,4);	
		echo "Agência Cobradora / Recebedora: " . $ag_cob_rec_t. "<br>";

		$cod_oco_sac_u = substr($arquivo[$u],153,4);
		echo "Código da ocorrência do sacado: " . $cod_oco_sac_u. "<br>";

		$dig_ag_cedente_t = substr($arquivo[$t],99,1);
		echo "Dígito da Agência do Cedente: " . $dig_ag_cedente_t."<br>";

		$data_oc_sac_u = substr($arquivo[$u],157,8);
		echo "Data da ocorrência do sacado: " . substr($data_oc_sac_u, 0,2)."/".substr($data_oc_sac_u, 2,2)."/". substr($data_oc_sac_u, 4,4) ."<br>"; 

		$ident_tit_emp_t = substr($arquivo[$t],100,25);
		echo "Identif. do título na empresa: " . $ident_tit_emp_t . "<br>";

		$val_oco_sac_u = substr($arquivo[$u],165,15);
		$val_oco_sac_u = substr($val_oco_sac_u, 0,13) .".".substr($val_oco_sac_u, 13,2);
  		$val_oco_sac_u = number_format($val_oco_sac_u,2,",","."); 
		echo "Valor da ocorrência do sacado: R$ " . $val_oco_sac_u. "<br>";

		$cod_moeda_t = substr($arquivo[$t],125,2);
		echo "Código da moeda: " .$cod_moeda_t. "<br>";

		$compl_oco_sac_u = substr($arquivo[$u], 180,30);
		echo "Complemento da ocorrência do sacado: " . $compl_oco_sac_u. "<br>";

		$tipo_incr_sacado_t = substr($arquivo[$t],127,1);
			$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$tipo_incr_sacado_t' AND operacoes.id = '12' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $tipo_incric_sacado_t = $result['descricao'] ;
            }

		echo "Tipo de inscrição sacado: " . $tipo_incr_sacado_t." - " . utf8_encode($tipo_incric_sacado_t). "<br>";

		$cod_banco_corresp_compens_u = substr($arquivo[$u],210,3);
		echo "Código do Banco correspondente compens.: " . $cod_banco_corresp_compens_u. "<br>";

		$num_inscr_sac_t = substr($arquivo[$t],128,15);
		echo "Número de inscrição sacado: " . $num_inscr_sac_t. "<br>";

		$reserv_u = substr($arquivo[$u],213,27);
		echo "Reservado: " . $reserv_u. "<br>";

		$nome_sacado_t = substr($arquivo[$t],143,40);
		echo "Nome do Sacado: " .$nome_sacado_t. "<br>";

		$conta_cobr_t = substr($arquivo[$t],183,10);
		echo "Conta Cobrança: " . $conta_cobr_t. "<br>";

		$val_tarif_cust_t = substr($arquivo[$t],193,15);
		$val_tarif_cust_t = substr($val_tarif_cust_t, 0,13) .".".substr($val_tarif_cust_t, 13,2);
  		$val_tarif_cust_t = number_format($val_tarif_cust_t,2,",","."); 
		echo "Valor da Tarifa/Custas: R$ " . $val_tarif_cust_t. "<br>";

		$ident_rej_tarif_liq_baix_t_1 = substr($arquivo[$t],208,2);
		$ident_rej_tarif_liq_baix_t_2 = substr($arquivo[$t],210,2);
		$ident_rej_tarif_liq_baix_t_3 = substr($arquivo[$t],212,2);
		$ident_rej_tarif_liq_baix_t_4 = substr($arquivo[$t],214,2);
		$ident_rej_tarif_liq_baix_t_5 = substr($arquivo[$t],216,2);
			$sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$ident_rej_tarif_liq_baix_t_1' AND detalhes_op.codigo = '$cod_mov_t' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $espec_1 = $result['descricao'] ;
            }

        if ($ident_rej_tarif_liq_baix_t_1 != '0')    {

            $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$ident_rej_tarif_liq_baix_t_2' AND detalhes_op.codigo = '$cod_mov_t' ";

            $r = @mysqli_query($conexao, $sql);


            while ($result = mysqli_fetch_array($r)) {
                $espec_2 = $result['descricao'] ;
            }
        } 
        
        if ($ident_rej_tarif_liq_baix_t_1 != '0')    {   

            $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$ident_rej_tarif_liq_baix_t_3' AND detalhes_op.codigo = '$cod_mov_t' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $espec_3 = $result['descricao'] ;
            }
        }
        
        if ($ident_rej_tarif_liq_baix_t_1 != '0')    {    

            $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$ident_rej_tarif_liq_baix_t_4' AND detalhes_op.codigo = '$cod_mov_t' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $espec_4 = $result['descricao'] ;
            }
        }
        
        if ($ident_rej_tarif_liq_baix_t_1 != '0')    {    

            $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$ident_rej_tarif_liq_baix_t_5' AND detalhes_op.codigo = '$cod_mov_t' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $espec_5 = $result['descricao'] ;
            }
        }    


		echo "Identificação para rejeições, tarifas, custas, liquidações e baixas: ". $ident_rej_tarif_liq_baix_t_1." - ".utf8_encode($espec_1)." / ". $ident_rej_tarif_liq_baix_t_2." - ".utf8_encode($espec_2)." / " . $ident_rej_tarif_liq_baix_t_3." - ".utf8_encode($espec_3)." / ". $ident_rej_tarif_liq_baix_t_4." - ".utf8_encode($espec_4)." / ". $ident_rej_tarif_liq_baix_t_5." - ".utf8_encode($espec_5)."<br>";

		echo "<br><br>" ; 

		$t = $t + 2; 
		$u = $u +2;	 
	} 

	$u = $u - 1;

	echo "<br><h2>TRAILER DE LOTE RETORNO</h2> <br><br>";   
  	
  	$trailler_lr = $arquivo[$u];

  	$cod_banco_compensa = substr($trailler_lr, 0,3);
  	echo "Código do Banco na compensação: " .$cod_banco_compensa. "<br>";

  	$lote_servi = substr($trailler_lr, 3,4);
  	echo "Lote de serviço: " . $lote_servi . "<br>";

  	$tipo_reg_tr_lr = substr($trailler_lr,7,1);
  	echo "Tipo de registro: " . $tipo_reg_tr_lr. "<br>";

  	$qtde_reg_lote_tr_lr = substr($trailler_lr,17,6);
  	echo "Quantidade de registros do lote: " .$qtde_reg_lote_tr_lr. "<br>";

  	$qtde_tit_cobr_simp_tr_lr = substr($trailler_lr,23,6);
  	echo "Quantidade títulos cobrança simples: " . $qtde_tit_cobr_simp_tr_lr. "<br>";

  	$val_tit_cobr_simp_tr_lr = substr($trailler_lr,29,17);
  	$val_tit_cobr_simp_tr_lr = substr($val_tit_cobr_simp_tr_lr, 0,15) .".".substr($val_tit_cobr_simp_tr_lr, 15,2);
  	$val_tit_cobr_simp_tr_lr = number_format($val_tit_cobr_simp_tr_lr,2,",","."); 
  	echo "Valor total dos títulos cobrança simples: R$ " .$val_tit_cobr_simp_tr_lr. "<br>";
  	$qtde_tit_cobr_vinc_tr_lr = substr($trailler_lr,46,6);
  	echo "Quantidade de títulos em cobrança vinculada: " .$qtde_tit_cobr_vinc_tr_lr. "<br>";

  	$val_tot_tit_cobr_vinc_tr_lr = substr($trailler_lr,52,17);
  	$val_tot_tit_cobr_vinc_tr_lr = substr($val_tot_tit_cobr_vinc_tr_lr, 0,15) .".".substr($val_tot_tit_cobr_vinc_tr_lr, 15,2);
  	$val_tot_tit_cobr_vinc_tr_lr = number_format($val_tot_tit_cobr_vinc_tr_lr,2,",","."); 
  	echo "Valor total dos títulos em cobrança vinculada: R$ " .$val_tot_tit_cobr_vinc_tr_lr. "<br>";

  	$qtde_tit_cobr_cauc_tr_lr = substr($trailler_lr,69,6);
  	echo "Quantidade de títulos em cobrança caucionada: ". $qtde_tit_cobr_cauc_tr_lr. "<br>";

  	$val_tot_tit_cobr_cauc_tr_lr = substr($trailler_lr,75,17);
  	$val_tot_tit_cobr_cauc_tr_lr = substr($val_tot_tit_cobr_cauc_tr_lr, 0,15) .".".substr($val_tot_tit_cobr_cauc_tr_lr, 15,2);
  	$val_tot_tit_cobr_cauc_tr_lr = number_format($val_tot_tit_cobr_cauc_tr_lr,2,",","."); 
  	echo "Valor total dos títulos em cobrança caucionada: R$ " .$val_tot_tit_cobr_cauc_tr_lr."<br>";

  	$qtde_tit_cobr_desc_tr_lr = substr($trailler_lr,92,6);
  	echo "Quantidade de títulos em cobrança descontada: " . $qtde_tit_cobr_desc_tr_lr."<br>";

  	$val_tot_tit_cobr_desc_tr_lr = substr($trailler_lr,98,17);
  	$val_tot_tit_cobr_desc_tr_lr = substr($val_tot_tit_cobr_desc_tr_lr, 0,15) .".".substr($val_tot_tit_cobr_desc_tr_lr, 15,2);
  	$val_tot_tit_cobr_desc_tr_lr = number_format($val_tot_tit_cobr_desc_tr_lr,2,",","."); 
  	echo "Valor total dos títulos em cobrança descontada: R$ " .$val_tot_tit_cobr_desc_tr_lr."<br>";

  	$num_avis_lanc_tr_lr = substr($trailler_lr,115,8);
  	echo "Número do aviso de lançamento: ".$num_avis_lanc_tr_lr."<br>";


	echo "<br><h2>TRAILER DE ARQUIVO RETORNO</h2> <br><br>";   
  	
  	$trailler_ar = end($arquivo);

  	$cod_banco_compensa_tr_ar = substr($trailler_ar, 0,3);
  	echo "Código do Banco na compensação: " .$cod_banco_compensa_tr_ar. "<br>";

  	$num_lote_reme_tr_ar = substr($trailler_ar,3,4);
  	echo "Numero do lote remessa: " . $num_lote_reme_tr_ar. "<br>";

  	$tipo_reg_tr_ar = substr($trailler_ar,7,1);
  	echo "Tipo de registro: " . $tipo_reg_tr_ar. "<br>";

  	$qtde_lotes_arq_tr_ar = substr($trailler_ar,17,6);
	echo "Quantidade de lotes do arquivo: " . $qtde_lotes_arq_tr_ar. "<br>";

	$qtde_reg_arq_tr_ar = substr($trailler_ar,23,6);
	echo "Quantidade de registros do arquivo: " .$qtde_reg_arq_tr_ar. "<br>";
?>

 