-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jul-2016 às 15:00
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retorno_bancos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bancos`
--

INSERT INTO `bancos` (`id`, `codigo`, `nome`) VALUES
(1, 237, 'BRADESCO'),
(2, 341, 'ITAU'),
(3, 353, 'SANTANDER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_op`
--

CREATE TABLE `detalhes_op` (
  `id` int(11) NOT NULL,
  `id_op` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `detalhes_op`
--

INSERT INTO `detalhes_op` (`id`, `id_op`, `codigo`, `descricao`) VALUES
(1, 1, 1, 'CPF'),
(2, 1, 2, 'CNPJ'),
(3, 1, 3, 'PIS/PASEP'),
(4, 1, 98, 'NÃO TEM'),
(5, 1, 99, 'OUTROS'),
(6, 2, 2, 'Entrada Confirmada'),
(7, 2, 3, 'Entrada Rejeitada'),
(8, 2, 6, 'Liquidação normal'),
(9, 2, 9, 'Baixado Automat. via Arquivo'),
(10, 2, 10, 'Baixado conforme instruções da Agência'),
(11, 2, 11, 'Em Ser - Arquivo de Títulos pendentes'),
(12, 2, 12, 'Abatimento Concedido'),
(13, 2, 13, 'Abatimento Cancelado'),
(14, 2, 14, 'Vencimento Alterado'),
(15, 2, 15, 'Liquidação em Cartório'),
(16, 2, 16, 'Título Pago em Cheque – Vinculado'),
(17, 2, 17, 'Liquidação após baixa ou Título não registrado'),
(18, 2, 18, 'Acerto de Depositária'),
(19, 2, 19, 'Confirmação Receb. Inst. de Protesto'),
(20, 2, 20, 'Confirmação Recebimento Instrução Sustação de Protesto'),
(21, 2, 21, 'Acerto do Controle do Participante'),
(22, 2, 22, 'Título Com Pagamento Cancelado'),
(23, 2, 23, 'Entrada do Título em Cartório'),
(24, 2, 24, 'Entrada rejeitada por CEP Irregular'),
(25, 2, 25, 'Confirmação Receb.Inst.de Protesto Falimentar'),
(26, 2, 27, 'Baixa Rejeitada'),
(27, 2, 28, 'Débito de tarifas/custas'),
(28, 2, 29, 'Ocorrências do Pagador'),
(29, 2, 30, 'Alteração de Outros Dados Rejeitados'),
(30, 2, 32, 'Instrução Rejeitada'),
(31, 2, 33, 'Confirmação Pedido Alteração Outros Dados '),
(32, 2, 34, 'Retirado de Cartório e Manutenção Carteira'),
(33, 2, 35, 'Desagendamento do débito automático'),
(34, 2, 40, 'Estorno de pagamento'),
(35, 2, 55, 'Sustado judicial'),
(36, 2, 68, 'Acerto dos dados do rateio de Crédito'),
(37, 2, 69, 'Cancelamento dos dados do rateio'),
(38, 2, 73, 'Confirmação Receb. Pedido de Negativação'),
(39, 2, 74, 'Confir Pedido de Excl de Negat (com ou sem baixa)'),
(40, 3, 1, 'CPF'),
(41, 3, 2, 'CNPJ'),
(42, 4, 2, 'ENTRADA CONFIRMADA COM POSSIBILIDADE DE MENSAGEM'),
(43, 4, 3, 'ENTRADA REJEITADA'),
(44, 4, 4, 'ALTERAÇÃO DE DADOS - NOVA ENTRADA OU ALTERAÇÃO/EXCLUSÃO DE DADOS ACATADA'),
(45, 4, 5, 'ALTERAÇÃO DE DADOS – BAIXA'),
(46, 4, 6, 'LIQUIDAÇÃO NORMAL'),
(47, 4, 7, 'LIQUIDAÇÃO PARCIAL – COBRANÇA INTELIGENTE (B2B)'),
(48, 4, 8, 'LIQUIDAÇÃO EM CARTÓRIO'),
(49, 4, 9, 'BAIXA SIMPLES'),
(50, 4, 10, 'BAIXA POR TER SIDO LIQUIDADO'),
(51, 4, 11, 'EM SER (SÓ NO RETORNO MENSAL)'),
(52, 4, 12, 'ABATIMENTO CONCEDIDO'),
(53, 4, 13, 'ABATIMENTO CANCELADO'),
(54, 4, 14, 'VENCIMENTO ALTERADO'),
(55, 4, 15, 'BAIXAS REJEITADAS'),
(56, 4, 16, 'INSTRUÇÕES REJEITADAS'),
(57, 4, 17, 'ALTERAÇÃO/EXCLUSÃO DE DADOS REJEITADOS'),
(58, 4, 18, 'COBRANÇA CONTRATUAL - INSTRUÇÕES/ALTERAÇÕES REJEITADAS/PENDENTES'),
(59, 4, 19, 'CONFIRMA RECEBIMENTO DE INSTRUÇÃO DE PROTESTO'),
(60, 4, 20, 'CONFIRMA RECEBIMENTO DE INSTRUÇÃO DE SUSTAÇÃO DE PROTESTO /TARIFA'),
(61, 4, 21, 'CONFIRMA RECEBIMENTO DE INSTRUÇÃO DE NÃO PROTESTAR'),
(62, 4, 23, 'TÍTULO ENVIADO A CARTÓRIO/TARIFA'),
(63, 4, 24, 'INSTRUÇÃO DE PROTESTO REJEITADA / SUSTADA / PENDENTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `layouts`
--

CREATE TABLE `layouts` (
  `id` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `layouts`
--

INSERT INTO `layouts` (`id`, `id_banco`, `descricao`) VALUES
(1, 1, 'Lay-out do Arquivo-Retorno - Registro Header Label'),
(2, 1, 'Lay-out do Arquivo-Retorno - Registro de Transação – Tipo 1'),
(3, 1, 'Lay-out do Arquivo-Retorno - Registro Trailler'),
(4, 2, 'REGISTRO HEADER DE ARQUIVO'),
(5, 2, 'REGISTRO TRAILER'),
(6, 2, 'REGISTRO DETALHE DE ARQUIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivos`
--

CREATE TABLE `motivos` (
  `id` int(11) NOT NULL,
  `id_op` int(11) NOT NULL,
  `id_dt` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `motivos`
--

INSERT INTO `motivos` (`id`, `id_op`, `id_dt`, `codigo`, `descricao`) VALUES
(1, 2, 6, 0, 'Ocorrência aceita'),
(2, 2, 6, 1, 'Código do Banco inválido'),
(3, 2, 6, 4, 'Código do movimento não permitido para a carteira'),
(4, 2, 6, 15, 'Características da cobrança incompatíveis'),
(5, 2, 6, 17, 'Data de vencimento anterior a data de emissão'),
(6, 2, 6, 21, 'Espécie do Título inválido'),
(7, 2, 6, 24, 'Data da emissão inválida'),
(8, 2, 6, 27, 'Valor/taxa de juros mora inválido'),
(9, 2, 6, 38, 'Prazo para protesto/ Negativação inválido'),
(10, 2, 6, 39, 'Pedido para protesto/ Negativação não permitido para o título'),
(11, 2, 6, 43, 'Prazo para baixa e devolução inválido'),
(12, 2, 6, 45, 'Nome do Pagador inválido'),
(13, 2, 6, 46, 'Tipo/num. de inscrição do Pagador inválidos'),
(14, 2, 6, 47, 'Endereço do Pagador não informado'),
(15, 2, 6, 48, 'CEP Inválido'),
(16, 2, 6, 50, 'CEP referente a Banco correspondente'),
(17, 2, 6, 53, 'Nº de inscrição do Pagador/avalista inválidos (CPF/CNPJ)'),
(18, 2, 6, 54, 'Pagadorr/avalista não informado'),
(19, 2, 6, 67, 'Débito automático agendado'),
(20, 2, 6, 68, 'Débito não agendado - erro nos dados de remessa'),
(21, 2, 6, 69, 'Débito não agendado - Pagador não consta no cadastro de autorizante'),
(22, 2, 6, 70, 'Débito não agendado - Beneficiário não autorizado pelo Pagador'),
(23, 2, 6, 71, 'Débito não agendado - Beneficiário não participa da modalidade de déb.automático'),
(24, 2, 6, 72, 'Débito não agendado - Código de moeda diferente de R$'),
(25, 2, 6, 73, 'Débito não agendado - Data de vencimento inválida/vencida'),
(26, 2, 6, 75, 'Débito não agendado - Tipo do número de inscrição do pagador debitado inválido'),
(27, 2, 6, 76, 'Pagador Eletrônico DDA (NOVO)- Esse motivo somente será disponibilizado no arquivo retorno para as e'),
(28, 2, 6, 86, 'Seu número do documento inválido'),
(29, 2, 6, 89, 'Email Pagador não enviado – título com débito automático'),
(30, 2, 6, 90, 'Email pagador não enviado – título de cobrança sem registro'),
(31, 2, 7, 2, 'Código do registro detalhe inválido'),
(32, 2, 7, 3, 'Código da ocorrência inválida'),
(33, 2, 7, 4, 'Código de ocorrência não permitida para a carteira'),
(34, 2, 4, 5, 'Código de ocorrência não numérico'),
(35, 2, 7, 7, 'Agência/conta/Digito - |Inválido'),
(36, 2, 7, 8, 'Nosso número inválido'),
(37, 2, 7, 9, 'Nosso número duplicado'),
(38, 2, 7, 10, 'Carteira inválida'),
(39, 2, 7, 13, 'Identificação da emissão do bloqueto inválida'),
(40, 2, 7, 16, 'Data de vencimento inválida'),
(41, 2, 7, 18, 'Vencimento fora do prazo de operação'),
(42, 2, 7, 20, 'Valor do Título inválido'),
(43, 2, 7, 21, 'Espécie do Título inválida'),
(44, 2, 7, 22, 'Espécie não permitida para a carteira'),
(45, 2, 7, 24, 'Data de emissão inválida'),
(46, 2, 7, 28, 'Código do desconto inválido'),
(47, 2, 7, 38, 'Prazo para protesto/ Negativação inválido'),
(48, 2, 7, 44, 'Agência Beneficiário não prevista'),
(49, 2, 7, 45, 'Nome do pagador não informado'),
(50, 2, 7, 46, 'Tipo/número de inscrição do pagador inválidos'),
(51, 2, 7, 47, 'Endereço do pagador não informado'),
(52, 2, 7, 48, '48..CEP Inválido'),
(53, 2, 7, 50, 'CEP irregular - Banco Correspondente'),
(54, 2, 7, 63, 'Entrada para Título já cadastrado'),
(55, 2, 7, 65, 'Limite excedido'),
(56, 2, 7, 66, 'Número autorização inexistente'),
(57, 2, 7, 68, 'Débito não agendado - erro nos dados de remessa'),
(58, 2, 7, 69, 'Débito não agendado - Pagador não consta no cadastro de autorizante'),
(59, 2, 7, 70, 'Débito não agendado - Beneficiário não autorizado pelo Pagador'),
(60, 2, 7, 71, 'Débito não agendado - Beneficiário não participa do débito Automático'),
(61, 2, 7, 72, 'Débito não agendado - Código de moeda diferente de R$'),
(62, 2, 7, 73, 'Débito não agendado - Data de vencimento inválida'),
(63, 2, 7, 74, 'Débito não agendado - Conforme seu pedido, Título não registrado'),
(64, 2, 7, 75, 'Débito não agendado – Tipo de número de inscrição do debitado inválido'),
(65, 2, 8, 0, 'Título pago com dinheiro'),
(66, 2, 8, 15, 'Título pago com cheque'),
(67, 2, 8, 42, 'Rateio não efetuado, cód. Calculo 2 (VLR. Registro) e v ('),
(68, 2, 17, 0, 'Título pago com dinheiro'),
(69, 2, 17, 15, 'Título pago com cheque'),
(70, 2, 10, 0, 'Baixado Conforme Instruções da Agência'),
(71, 2, 10, 20, 'Titulo Baixado e Transferido para Desconto'),
(72, 2, 10, 14, 'Título Protestado'),
(73, 2, 10, 15, 'Título excluído'),
(74, 2, 10, 16, 'Título Baixado pelo Banco por decurso Prazo'),
(75, 2, 10, 17, 'Titulo Baixado Transferido Carteira'),
(76, 2, 10, 20, 'Titulo Baixado e Transferido para Desconto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacoes`
--

CREATE TABLE `operacoes` (
  `id` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `id_layout` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `operacoes`
--

INSERT INTO `operacoes` (`id`, `id_banco`, `id_layout`, `descricao`) VALUES
(1, 1, 2, 'Tipo de Inscrição Empresa'),
(2, 1, 2, 'Identificação de Ocorrência'),
(3, 2, 6, 'IDENTIFICAÇÃO DO TIPO DE INSCRIÇÃO/EMPRESA'),
(4, 2, 6, 'IDENTIFICAÇÃO DA OCORRÊNCIA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalhes_op`
--
ALTER TABLE `detalhes_op`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_op` (`id_op`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_banco` (`id_banco`);

--
-- Indexes for table `motivos`
--
ALTER TABLE `motivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dt` (`id_dt`),
  ADD KEY `id_op` (`id_op`);

--
-- Indexes for table `operacoes`
--
ALTER TABLE `operacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_banco` (`id_banco`),
  ADD KEY `id_layout` (`id_layout`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detalhes_op`
--
ALTER TABLE `detalhes_op`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `motivos`
--
ALTER TABLE `motivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `operacoes`
--
ALTER TABLE `operacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `detalhes_op`
--
ALTER TABLE `detalhes_op`
  ADD CONSTRAINT `detalhes_op_ibfk_1` FOREIGN KEY (`id_op`) REFERENCES `operacoes` (`id`);

--
-- Limitadores para a tabela `layouts`
--
ALTER TABLE `layouts`
  ADD CONSTRAINT `layouts_ibfk_1` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`);

--
-- Limitadores para a tabela `motivos`
--
ALTER TABLE `motivos`
  ADD CONSTRAINT `motivos_ibfk_1` FOREIGN KEY (`id_dt`) REFERENCES `detalhes_op` (`id`),
  ADD CONSTRAINT `motivos_ibfk_2` FOREIGN KEY (`id_op`) REFERENCES `operacoes` (`id`);

--
-- Limitadores para a tabela `operacoes`
--
ALTER TABLE `operacoes`
  ADD CONSTRAINT `operacoes_ibfk_1` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`),
  ADD CONSTRAINT `operacoes_ibfk_2` FOREIGN KEY (`id_layout`) REFERENCES `layouts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
