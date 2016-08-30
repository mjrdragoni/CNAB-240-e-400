<?php

	foreach($arquivo as $line)
	{
		
		switch ($line[7]) {
		   case "0":
				 echo "<h1>Header de Arquivo</h1>";
					include('includes/headerarq.php');
				 break;
		   case "1":
				 echo "<h1>Header de Lote</h1>";
					include('includes/headerlot.php');
				 break;
		   case "3":
				if($line[13] === "P"){
					echo "<h1>Segmento P</h1>";
						echo "Código do Banco na Compensação: ";
						echo substr($line, 0, 3);
						echo "<br>";
						
						echo "Lote de Serviço: ";
						echo substr($line, 3, 4);
						echo "<br>";
						
						echo "Tipo de Registro: ";
						echo substr($line, 7, 1);
						echo "<br>";
						
						echo "Nº Sequencial do Registro no Lote: ";
						echo substr($line, 8, 5);
						echo "<br>";
						
						echo "Código Segmento do Registro Detalhe: ";
						echo substr($line, 13, 1);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 14, 1);
						echo "<br>";
						
						echo "Código de Movimento Remessa: ";
						echo substr($line, 15, 2);
						echo "<br>";
						
						echo "Agência Mantenedora da Conta: ";
						echo substr($line, 17, 5);
						echo "<br>";
						
						echo "Digíto Verificador da Agência: ";
						echo substr($line, 22, 1);
						echo "<br>";
						
						echo "Número da Conta Corrente: ";
						echo substr($line, 23, 12);
						echo "<br>";
						
						echo "Digíto Verificador da Conta: ";
						echo substr($line, 35, 1);
						echo "<br>";
						
						echo "Digíto Verificador da Ag/Conta: ";
						echo substr($line, 36, 1);
						echo "<br>";
						
						echo "Identificação do Titulo no Banco: ";
						echo substr($line, 37, 20);
						echo "<br>";
						
						echo "Código da Carteira: ";
						echo substr($line, 57, 1);
						echo "<br>";
						
						echo "Forma de Cadastro do Titulo no Banco: ";
						echo substr($line, 58, 1);
						echo "<br>";
						
						echo "Tipo de Documento: ";
						echo substr($line, 59, 1);
						echo "<br>";
						
						echo "Identificação da Emissão do Bloqueio: ";
						echo substr($line, 60, 1);
						echo "<br>";
						
						echo "Identificação da Distribuição: ";
						echo substr($line, 61, 1);
						echo "<br>";
						
						echo "Número do Documento de Cobrança: ";
						echo substr($line, 62, 15);
						echo "<br>";
						
						echo "Data de Vencimento do Titulo: ";
						echo substr($line, 77, 2) . "/" . substr($line, 79, 2) . "/" . substr($line, 81, 4);
						echo "<br>";
						
						echo "Valor Nominal do Titulo: ";
						echo number_format(substr($line, 85, 15), 2, ',', ',', ',', ',', '.');
						echo "<br>";
						
						echo "Agência Encarregada da Cobrança: ";
						echo substr($line, 100, 5);
						echo "<br>";
						
						echo "Digito Verificador da Agência: ";
						echo substr($line, 105, 1);
						echo "<br>";
						
						echo "Espécie de Titulo: ";
						echo substr($line, 106, 2);
						echo "<br>";
						
						echo "Identificação de Titulo Aceito / Não Aceito: ";
						echo substr($line, 108, 1);
						echo "<br>";
						
						echo "Data da Emissão do Titulo: ";
						echo substr($line, 109, 8);
						echo "<br>";
						
						echo "Código do Juros de Mora: ";
						echo substr($line, 117, 1);
						echo "<br>";
						
						echo "Data do Juros de Mora: ";
						echo substr($line, 118, 2) . "/" . substr($line, 120, 2) . "/" . substr($line, 122, 4);
						echo "<br>";
						
						echo "Juros de Mora por Dia/Taxa";
						echo substr($line, 126, 15);
						echo "<br>";
						
						echo "Código do Desconto 1: ";
						echo substr($line, 141, 1);
						echo "<br>";
						
						echo "Data do Desconto 1: ";
						echo substr($line, 142, 2) . "/" . substr($line, 144, 2) . "/" . substr($line, 146, 4);
						echo "<br>";
						
						echo "Desconto 1 Valor / Percentual a ser Concedido: ";
						echo substr($line, 150, 15);
						echo "<br>";
						
						echo "Valor do IOF a ser Recolhido: ";
						echo substr($line, 165, 15);
						echo "<br>";
						
						echo "Valor do Abatimento: ";
						echo substr($line, 180, 15);
						echo "<br>";
						
						echo "Identificação do Título na Empresa: ";
						echo substr($line, 195, 25);
						echo "<br>";
						
						echo "Código para Protesto: ";
						echo substr($line, 220, 1);
						echo "<br>";
						
						echo "Número de Dias para Protesto: ";
						echo substr($line, 221, 2);
						echo "<br>";
						
						echo "Código para Baixa / Devolução: ";
						echo substr($line, 223, 1);
						echo "<br>";
						
						echo "Número de Dias para Protesto: ";
						echo substr($line, 224, 3);
						echo "<br>";
						
						echo "Código da Moeda: ";
						echo substr($line, 227, 2);
						echo "<br>";
						
						echo "Nº do Contrato da Operação de Crédito: ";
						echo substr($line, 229, 10);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 239, 1);
						echo "<br>";
				}else if($line[13] === "Q"){
					echo "<h1>Segmento Q</h1>";
						echo "Código do Banco na Compensação: ";
						echo substr($line, 0, 3);
						echo "<br>";
						
						echo "Lote de Serviço: ";
						echo substr($line, 3, 4);
						echo "<br>";
						
						echo "Tipo de Registro: ";
						echo substr($line, 7, 1);
						echo "<br>";
						
						echo "Nº Sequencial do Registro no Lote: ";
						echo substr($line, 8, 5);
						echo "<br>";
						
						echo "Código Segmento do Registro Detalhe: ";
						echo substr($line, 13, 1);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 14, 1);
						echo "<br>";
						
						echo "Código de Movimento Remessa: ";
						echo substr($line, 15, 2);
						echo "<br>";
						
						echo "Tipo de Inscrição: ";
						echo substr($line, 17, 1);
						echo "<br>";
						
						echo "Número de Inscrição: ";
						echo substr($line, 18, 15);
						echo "<br>";
						
						echo "Nome: ";
						echo substr($line, 33, 40);
						echo "<br>";
						
						echo "Endereço: ";
						echo substr($line, 73, 40);
						echo "<br>";
						
						echo "Bairro: ";
						echo substr($line, 113, 15);
						echo "<br>";
						
						echo "CEP: ";
						echo substr($line, 128, 5);
						echo "<br>";
						
						echo "Sufixo do CEP: ";
						echo substr($line, 133, 3);
						echo "<br>";
						
						echo "Cidade: ";
						echo substr($line, 136, 15);
						echo "<br>";
						
						echo "Unidade da Federação: ";
						echo substr($line, 151, 2);
						echo "<br>";
						
						echo "Tipo de Inscrição: ";
						echo substr($line, 153, 1);
						echo "<br>";
						
						echo "Número de Inscrição: ";
						echo substr($line, 154, 15);
						echo "<br>";
						
						echo "Nome do Sacador / Avalista: ";
						echo substr($line, 169, 40);
						echo "<br>";
						
						echo "Código Banco Correspondente na Compensação: ";
						echo substr($line, 209, 3);
						echo "<br>";
						
						echo "Nosso Nº no Banco Correspondente: ";
						echo substr($line, 212, 20);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 232, 8);
						echo "<br>";
						
				}else if($line[13] === "R"){
					echo "<h1>Segmento R</h1>";
						echo "Código do Banco na Compensação: ";
						echo substr($line, 0, 3);
						echo "<br>";
						
						echo "Lote de Serviço: ";
						echo substr($line, 3, 4);
						echo "<br>";
						
						echo "Tipo de Registro: ";
						echo substr($line, 7, 1);
						echo "<br>";
						
						echo "Nº Sequencial do Registro no Lote: ";
						echo substr($line, 8, 5);
						echo "<br>";
						
						echo "Código Segmento do Registro Detalhe: ";
						echo substr($line, 13, 1);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 14, 1);
						echo "<br>";
						
						echo "Código de Movimento Remessa: ";
						echo substr($line, 15, 2);
						echo "<br>";
						
						echo "Código do Desconto 2: ";
						echo substr($line, 17, 1);
						echo "<br>";
						
						echo "Data do Desconto 2: ";
						echo substr($line, 18, 2) . "/" . substr($line, 20, 2) . "/" . substr($line, 22, 4);
						echo "<br>";
						
						echo "Desconto 2 Valor / Percentual a Ser Concedido: ";
						echo substr($line, 26, 15);
						echo "<br>";
						
						echo "Código do Desconto 3: ";
						echo substr($line, 41, 1);
						echo "<br>";
						
						echo "Data do Desconto 3: ";
						echo substr($line, 42, 2) . "/" . substr($line, 44, 2) . "/" . substr($line, 46, 4);
						echo "<br>";
						
						echo "Desconto 3 Valor / Percentual a ser consedido: ";
						echo substr($line, 50, 15);
						echo "<br>";
						
						echo "Código da Multa: ";
						echo substr($line, 65, 1);
						echo "<br>";
						
						echo "Data da Multa: ";
						echo substr($line, 66, 2) . "/" . substr($line, 68, 2) . "/" . substr($line, 70, 4);
						echo "<br>";
						
						echo "Valor / Percentual a Ser Aplicado: ";
						echo substr($line, 74, 15);
						echo "<br>";
						
						echo "Informação ao Sacado: ";
						echo substr($line, 89, 10);
						echo "<br>";
						
						echo "Mensagem 3: ";
						echo substr($line, 99, 40);
						echo "<br>";
						
						echo "Mensagem 4: ";
						echo substr($line, 139, 40);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 179, 20);
						echo "<br>";
						
						echo "Código Ocorrência do Sacado: ";
						echo substr($line, 199, 8);
						echo "<br>";
						
						echo "Código do Banco na Conta do Débito: ";
						echo substr($line, 207, 3);
						echo "<br>";
						
						echo "Código da Agência do Débito: ";
						echo substr($line, 210, 5);
						echo "<br>";
						
						echo "Verificador da Agência: ";
						echo substr($line, 215, 1);
						echo "<br>";
						
						echo "Conta Corrente para Débito: ";
						echo substr($line, 216, 12);
						echo "<br>";
						
						echo "Digito Verificador da Conta: ";
						echo substr($line, 228, 1);
						echo "<br>";
						
						echo "Digito Verificador Ag/Conta: ";
						echo substr($line, 229, 1);
						echo "<br>";
						
						echo "Aviso para Débito Automático: ";
						echo substr($line, 230, 1);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 231, 9);
						echo "<br>";
						
				}else if($line[13] === "S"){
					echo "<h1>Segmento S</h1>";
						echo "Código do Banco na Compensação: ";
						echo substr($line, 0, 3);
						echo "<br>";
						
						echo "Lote de Serviço: ";
						echo substr($line, 3, 4);
						echo "<br>";
						
						echo "Tipo de Registro: ";
						echo substr($line, 7, 1);
						echo "<br>";
						
						echo "Nº Sequencial do Registro no Lote: ";
						echo substr($line, 8, 5);
						echo "<br>";
						
						echo "Código Segmento do Registro Detalhe: ";
						echo substr($line, 13, 1);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 14, 1);
						echo "<br>";
						
						echo "Código de Movimento Remessa: ";
						echo substr($line, 15, 2);
						echo "<br>";
						
						echo "Identificação da Impressão: ";
						echo substr($line, 17, 1);
						echo "<br>";
						
						if(substr($line, 17, 1) === "1" || substr($line, 17, 1) === "2"){
							echo "Número da Linha a ser Impressa: ";
							echo substr($line, 18, 2);
							echo "<br>";
							
							echo "Mensagem a ser Impressa: ";
							echo substr($line, 20, 140);
							echo "<br>";
							
							echo "Tipo do Caracter a ser Impresso: ";
							echo substr($line, 160, 2);
							echo "<br>";
							
							echo "Uso Exclusivo FEBRABAN / CNAB: ";
							echo substr($line, 162, 78);
							echo "<br>";
							
						}else if(substr($line, 17, 1) === "3"){
							echo "Mensagem 5: ";
							echo substr($line, 18, 40);
							echo "<br>";
							
							echo "Mensagem 6: ";
							echo substr($line, 58, 40);
							echo "<br>";
							
							echo "Mensagem 7: ";
							echo substr($line, 98, 40);
							echo "<br>";
							
							echo "Mensagem 8: ";
							echo substr($line, 138, 40);
							echo "<br>";
							
							echo "Mensagem 9: ";
							echo substr($line, 178, 40);
							echo "<br>";
							
							echo "Uso Exclusivo FEBRABAN / CNAB: ";
							echo substr($line, 218, 22);
							echo "<br>";
							
						}
						
				}else if($line[13] === "Y"){
					echo "<h1>Segmento Y</h1>";
						echo "Código do Banco na Compensação: ";
						echo substr($line, 0, 3);
						echo "<br>";
						
						echo "Lote de Serviço: ";
						echo substr($line, 3, 4);
						echo "<br>";
						
						echo "Tipo de Registro: ";
						echo substr($line, 7, 1);
						echo "<br>";
						
						echo "Nº Sequencial do Registro no Lote: ";
						echo substr($line, 8, 5);
						echo "<br>";
						
						echo "Código Segmento do Registro no Lote: ";
						echo substr($line, 13, 1);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 14, 1);
						echo "<br>";
						
						echo "Código de Movimento Remessa: ";
						echo substr($line, 15, 2);
						echo "<br>";
						
						echo "Identificação Registro Opcional: ";
						echo substr($line, 17, 2);
						echo "<br>";
						
						echo "Tipo de Inscrição: ";
						echo substr($line, 19, 1);
						echo "<br>";
						
						echo "Número de Inscrição: ";
						echo substr($line, 20, 15);
						echo "<br>";
						
						echo "Nome do Sacador / Avalista: ";
						echo substr($line, 35, 40);
						echo "<br>";
						
						echo "Endereço: ";
						echo substr($line, 75, 40);
						echo "<br>";
						
						echo "Bairro: ";
						echo substr($line, 115, 15);
						echo "<br>";
						
						echo "CEP: ";
						echo substr($line, 130, 5);
						echo "<br>";
						
						echo "Sufixo do CEP: ";
						echo substr($line, 135, 3);
						echo "<br>";
						
						echo "Cidade: ";
						echo substr($line, 138, 15);
						echo "<br>";
						
						echo "Unidade da Federação: ";
						echo substr($line, 153, 2);
						echo "<br>";
						
						echo "Uso Exclusivo FEBRABAN / CNAB: ";
						echo substr($line, 155, 85);
						echo "<br>";
						
				}else if($line[13] === "T"){
						include('includes/segmentot.php');
						
				}else if($line[13] === "U"){
						include('includes/segmentou.php');
				}else{
					echo "<h1>Não existe ou não retornado corretamente!</h1>";
				}
				 break;
		   case "5":
				 include('includes/traillerlot.php');
				 break;
		   case "9":
				 include('includes/traillerarq.php');
				 break;
		}
		
	}
?>
