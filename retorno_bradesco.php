<?php 

    require_once("includes/connection.php");
        
    $fp = fopen($file, "r");

    $content = fread( $fp, filesize($file) );
    
    $ident_regh = substr($content, 0, 1  ); 

    echo "<h3>Header</h3> <br><br> <b>Identificação do Registro: </b> " . $ident_regh . "<br>";

    $ident_arq_ret = substr($content, 1, 1); 

    echo "Identificação do Arquivo Retorno: ". $ident_arq_ret . "<br>"; 

    $lit_ret = substr($content, 2 ,7);

    echo "Literal Retorno: " . $lit_ret . "<br>"; 

    $cod_ret = substr($content, 9, 2);
    
    echo "Código do Serviço: " . $cod_ret . "<br>";

    $lit_serv = substr($content, 11 ,15);

    echo "Literal Serviço: " . $lit_serv  . "<br>";

    $cod_emp = substr($content, 26, 20);

    echo "Código da Empresa: " . $cod_emp . "<br>";

    $nome_emp = substr($content, 46, 30);

    echo "Nome da Empresa por Extenso: ". $nome_emp . "<br>";

    $num_brad_cam_comp = substr($content, 76, 3);

    echo "Nº do Bradesco na Câmara Compensação: " . $num_brad_cam_comp . "<br>";

    $nome_banco = substr($content, 79, 15);

    echo "Nome do Banco por Extenso: " . $nome_banco . "<br>";

    $data_grav_arq = substr($content, 94, 6);

    echo "Data da Gravação do Arquivo: " . $data_grav_arq .  "<br>";

    $dens_grav = substr($content, 100, 8);

    echo "Densidade de Gravação: " . $dens_grav .  "<br>";

    $num_aviso_banc = substr($content, 108, 5);

    echo "Nº Aviso Bancário: " . $num_aviso_banc . "<br>";

    $branco = substr($content, 113, 266);

    echo "Branco: " . $branco . "<br>";

    $data_cred = substr($content, 379, 6);

    echo "Data do Crédito: " . $data_cred . "<br>";

    $branco2 = substr($content, 385, 9);

    echo "Branco: " . $branco2 . "<br>";

    $num_seq_reg = substr($content, 394, 6);

    echo "Nº Seqüencial de registro: " . $num_seq_reg . "<br>";

    $arquivo = file($file);

    echo "<br><h3>Transações</h3> <br><br>";

    for ($i = 1; $i < (count($arquivo)-1); $i++) {

        $ident_reg = substr($arquivo[$i], 0,1);

        echo "<b>Identificação do Registro: </b>" . $ident_reg . "<br>";  

        $tipo_insc_emp = substr($arquivo[$i], 1, 2);

             $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$tipo_insc_emp' AND operacoes.id = '1' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $tipo = $result['descricao'] ;
            }

        echo "Tipo de Inscrição Empresa: " .  $tipo_insc_emp . " - " . $tipo . "<br>";

        $num_insc_emp = substr($arquivo[$i], 3, 14);

        echo "Nº Inscrição da Empresa: " .$num_insc_emp . "<br>";

        $zeros = substr($arquivo[$i],  17, 3);

        echo "Zeros: " . $zeros . "<br>";

        $ident_emp_benef_banco = substr($arquivo[$i], 20, 17);

        echo "Identificação da Empresa Beneficiário no Banco: " .$ident_emp_benef_banco . "<br>";

        $num_cont_part = substr($arquivo[$i], 37, 25);

        echo "Nº Controle do Participante: " . $num_cont_part . "<br>";

        $zeros = substr($arquivo[$i],  62, 8);

        echo "Zeros: " . $zeros . "<br>";

        $ident_titu_banco = substr($arquivo[$i], 70, 12);

        echo "Identificação do Título no Banco: " . $ident_titu_banco . "<br>";

        $uso_banco = substr($arquivo[$i], 82, 10);

        echo "Uso do Banco: ". $uso_banco . "<br>";

        $uso_banco = substr($arquivo[$i], 92, 12);

        echo "Uso do Banco: ". $uso_banco . "<br>";

        $indc_rat_cred = substr($arquivo[$i], 104, 1);

        echo "Indicador de Rateio Crédito: ". $indc_rat_cred . "<br>";

        $zeros = substr($arquivo[$i],  105, 2);

        echo "Zeros: " . $zeros . "<br>";

        $carteira = substr($arquivo[$i], 107, 1);

        echo "Carteira: " . $carteira . "<br>";

        $ident_ocor = substr($arquivo[$i], 108, 2);

            $sql = "SELECT detalhes_op.descricao FROM detalhes_op INNER JOIN
                    operacoes ON operacoes.id = detalhes_op.id_op
                    WHERE detalhes_op.codigo = '$ident_ocor' AND operacoes.id = '2' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $id_oc = $result['descricao'] ;
            }

        echo "Identificação de Ocorrência: " .$ident_ocor . " - " . $id_oc . "<br>";

        $data_ocorr_banco = substr($arquivo[$i], 110, 6);

        echo "Data Ocorrência no Banco: " . $data_ocorr_banco . "<br>";

        $num_doc = substr($arquivo[$i], 116, 10);

        echo    "Número do Documento: " . $num_doc . "<br>";

        $ident_titu_banco = substr($arquivo[$i], 126, 20);

        echo "Identificação do Título no Banco: ". $ident_titu_banco . "<br>";

        $data_venc_titu = substr($arquivo[$i], 146, 6);

        echo "Data Vencimento do Título: " . $data_venc_titu  . "<br>";

        $val_tit = substr($arquivo[$i], 152, 13);

        echo "Valor do Título: " . $val_tit . "<br>";

        $banco_cobr = substr($arquivo[$i], 165, 3);

        echo "Banco Cobrador: " . $banco_cobr . "<br>";

        $ag_cobr = substr($arquivo[$i], 168, 5);

        echo "Agência Cobradora: " . $ag_cobr . "<br>";

        $espc_titu = substr($arquivo[$i], 173, 2);

        echo "Espécie do Título: " . $espc_titu . "<br>";

        $desp_cobr = substr($arquivo[$i], 175, 13);

        echo " Despesas de cobrança para os Códigos de Ocorrência: " . $desp_cobr . "<br>
                02 - Entradas Confirmadas<br>
                28 - Débitos de Tarifas<br>";


        $outr_desp_cust_prote = substr($arquivo[$i], 188, 13);

        echo "Outras despesas Custas de Protesto: " . $outr_desp_cust_prote . "<br>";

        $jur_ope_atr = substr($arquivo[$i], 201, 13); 

        echo "Juros Operação em Atraso: " . $jur_ope_atr . "<br>";

        $iof_dev = substr($arquivo[$i], 214, 13);

        echo "IOF Devido: " . $iof_dev . "<br>";

        $abat_conced_tit = substr($arquivo[$i], 227, 13); 

        echo "Abatimento Concedido sobre o Título: " . $abat_conced_tit . "<br>";

        $desc_conc = substr($arquivo[$i], 240, 13);

        echo "Desconto Concedido: " . $desc_conc . "<br>";

        $val_pago = substr($arquivo[$i], 253, 13);

        echo "Valor Pago: " . $val_pago . "<br>";

        $juros_mora = substr($arquivo[$i], 266, 13);

        echo "Juros de Mora: " .$juros_mora . "<br>";

        $out_cred = substr($arquivo[$i], 279, 13);

        echo "Outros Créditos: " .$out_cred . "<br>";

        $branco = substr($arquivo[$i], 292, 2);

        echo "Brancos: " . $branco . "<br>";

        $cod_25_19 = substr($arquivo[$i], 294 ,1);

        echo "Motivo do Código de Ocorrência 25 (Confirmação de Instrução de Protesto Falimentar e <br>
            (Do Código de Ocorrência 19 Confirmação de Instrução de Protesto): ". $cod_25_19 . "<br>";

        $data_cred = substr($arquivo[$i], 295, 6);

        echo "Data do Crédito: " . $data_cred . "<br>";

        $orig_pag = substr($arquivo[$i], 301, 3);

        echo "Origem Pagamento: ". $orig_pag . "<br>";

        $branco = substr($arquivo[$i], 304, 10);

        echo "Brancos: " . $branco . "<br>";

        $qnd_cheq_brad_inf = substr($arquivo[$i], 314, 4);

        echo "Quando cheque Bradesco informe 0237: " . $qnd_cheq_brad_inf . "<br>";

        $mot_rej_109_110 = substr($arquivo[$i], 318, 2);

             $sql = "SELECT motivos.descricao FROM motivos INNER JOIN
                    operacoes ON operacoes.id = motivos.id_op INNER JOIN
                    detalhes_op ON detalhes_op.id = motivos.id_dt
                    WHERE motivos.codigo = '$mot_rej_109_110' AND detalhes_op.descricao = '$id_oc' ";

            $r = @mysqli_query($conexao, $sql);

            while ($result = mysqli_fetch_array($r)) {
                $mot_rej_ent_conf = $result['descricao'] ;
            }    

        echo "Motivos das Rejeições para os Códigos de Ocorrência da Posição 109 a 110: " . $mot_rej_109_110 . 
        " - " . $mot_rej_ent_conf ."<br>";

        $branco = substr($arquivo[$i], 328, 40);

        echo "Brancos: " . $branco . "<br>";

        $num_cart = substr($arquivo[$i], 368, 2);

        echo "Número do Cartório: " . $num_cart . "<br>";

        $num_prot = substr($arquivo[$i], 370, 10);

        echo "Número do Protocolo: " .$num_prot . "<br>";

        $branco = substr($arquivo[$i], 380, 14);

        echo "Brancos: " . $branco . "<br>";

        $n_seq_reg = substr($arquivo[$i], 394, 6);

        echo "Nº Seqüencial de Registro: " .$n_seq_reg . "<br><br><br>";
    };

    echo "<br><h3>Trailler</h3> <br><br>";
    
    $trailler = end($arquivo);

    $ident_reg_tra = substr($trailler, 0, 1);

    echo "<b>Identificação do Registro: </b>" .$ident_reg_tra . "<br>";

    $ident_ret =  substr($trailler, 1, 1);

    echo "Identificação do Retorno: " . $ident_ret . "<br>";

    $ident_tipo_reg = substr($trailler, 2, 2);

    echo "Identificação Tipo de Registro: " . $ident_tipo_reg . "<br>";

    $cod_banco = substr($trailler, 4, 3);

    echo "Código do Banco: " . $cod_banco . "<br>";

    $qtde_tit_cobr = substr($trailler, 17, 8); 

    echo "Quantidade de Títulos em Cobrança: " .$qtde_tit_cobr . "<br>";

    $val_tot_cobr = substr($trailler, 25, 14); 

    echo "Valor Total em Cobrança: " . $val_tot_cobr . "<br>";

    $num_av_banc = substr($trailler, 39, 8);

    echo "Nº do Aviso Bancário: " . $num_av_banc . "<br>";

    $qtde_reg_oc_2 = substr($trailler, 57, 5);

    echo "Quantidade de Registros-Ocorrência 02 – Confirmação de Entradas: " . $qtde_reg_oc_2 . "<br>";

    $val_reg_oc_2 = substr($trailler, 62, 12);

    echo "Valor dos Registros – Ocorrência 02 - Confirmação de Entradas: " . $val_reg_oc_2 . "<br>";

    $val_reg_oc_6_liq = substr($trailler, 74, 12);

    echo "Valor dos Registros–Ocorrência 06 – Liquidação: " . $val_reg_oc_6_liq . "<br>";

    $qtde_reg_oc_6 = substr($trailler, 86, 5); 

    echo "Quantidade dos Registros - Ocorrência 06 – Liquidação: " . $qtde_reg_oc_6 . "<br>";

    $val_reg_oc_6 = substr($trailler, 91, 12);

    echo "Valor dos Registros - Ocorrência 06: " . $val_reg_oc_6 . "<br>";

    $qtde_reg_oc_9_10_tit_baix = substr($trailler, 103, 5);

    echo "Quantidade dos Registros - Ocorrência 09 e 10-Títulos baixados: " . $qtde_reg_oc_9_10_tit_baix . "<br>";

    $val_reg_oc_9_10_tit_baix = substr($trailler, 108, 12);

    echo "Valor dos Registros – Ocorrência 09 e 10 - Títulos baixados: " . $val_reg_oc_9_10_tit_baix . "<br>";

    $qtde_reg_oc_13_abat_canc = substr($trailler, 120, 5);

    echo "Quantidade de registros - ocorrência 13 - Abatimento Cancelado: " . $qtde_reg_oc_13_abat_canc . "<br>";

    $val_reg_oc_13 = substr($trailler, 125, 12);

    echo "Valor dos Registros – Ocorrência 13 - Abatimento Cancelado: " . $val_reg_oc_13 . "<br>";

    $qtde_reg_oc_14 = substr($trailler, 137, 5); 

    echo "Quantidade dos Registros - Ocorrência 14 – Vencimento Alterado: " . $qtde_reg_oc_14 . "<br>";

    $val_reg_oc_14 = substr($trailler, 142, 12);

    echo "Valor dos Registros – Ocorrência 14 - Vencimento Alterado: " . $val_reg_oc_14 . "<br>";

    $qtde_reg_oc_12 = substr($trailler, 154, 5); 

    echo "Quantidade dos Registros-Ocorrência 12 – Abatimento Concedido: " . $qtde_reg_oc_12 . "<br>";

    $val_reg_oc_12 = substr($trailler, 159, 12);

    echo "Valor dos Registros – Ocorrência 12 - Abatimento Concedido: " . $val_reg_oc_12 . "<br>";

    $qtde_reg_oc_19 = substr($trailler, 171, 5); 

    echo "Quantidade dos Registros-Ocorrência 19-Confirmação da Instrução Protesto: " . $qtde_reg_oc_19 . "<br>";

    $val_reg_oc_19 = substr($trailler, 176, 12);

    echo "Valor dos Registros – Ocorrência 19 - Confirmação da Instrução de Protesto: " . $val_reg_oc_19 . "<br>";

    $val_tot_rat_efet = substr($trailler, 362, 15);

    echo "Valor Total dos Rateios Efetuados: " . $val_tot_rat_efet . "<br>";

    $qtde_tot_rat_efet = substr($trailler, 377, 8);

    echo "Quantidade Total dos Rateios Efetuados: " . $qtde_tot_rat_efet . "<br>";

    $num_seq_reg_tra = substr($trailler, 394, 6);

    echo "Número Seqüencial do Registro: " . $num_seq_reg_tra . "<br>";   

 ?>

 <!DOCTYPE html>
 <html>
 <head>

    <meta charset="utf-8">
    
    <title>Arquivo de Retorno - Bradesco</title>

 </head>
 <body>
 
 </body>
 </html>