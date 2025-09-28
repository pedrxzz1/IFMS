-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/12/2023 às 04:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro_ifms`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `idade` int(11) NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `status_carro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `idade`, `cpf`, `turno`, `descricao`, `status_carro`) VALUES
(80, 'samuel', 28, '07722571166', 'noite', 'ele é', 0),
(95, 'gustavo', 30, '07722571166', 'noite', 'tenho carro não', 0),
(96, 'samuel ', 19, '07722571166', 'noite', 'tenho carro não', 0),
(97, 'lenardo ', 21, '186.865.896', 'noite', 'tenho carro sim', 0),
(98, 'joao', 23, '186.865.896', 'tarde', 'quero carona não', 0),
(99, 'gustavo', 12, '186.865.896', 'tarde', 'quero carona não', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carona`
--

CREATE TABLE `carona` (
  `id` int(11) NOT NULL,
  `id_veiculo` int(11) DEFAULT NULL,
  `Id_aluno` int(11) DEFAULT NULL,
  `total_carona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carona`
--

INSERT INTO `carona` (`id`, `id_veiculo`, `Id_aluno`, `total_carona`) VALUES
(31, 72, 96, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carro`
--

CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `quantidade_lugar` int(11) NOT NULL,
  `consumo_km` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carro`
--

INSERT INTO `carro` (`id`, `id_pessoa`, `marca`, `modelo`, `ano`, `cor`, `quantidade_lugar`, `consumo_km`) VALUES
(72, 80, 'bmw', 'fuscaa', 2021, 'preto', 6, 50),
(82, 97, 'bmw', 'fusca', 2023, 'azul', 3, 50),
(83, 98, 'bmw', 'goll', 2023, 'azul', 3, 50);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `carona`
--
ALTER TABLE `carona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_veiculo` (`id_veiculo`),
  ADD KEY `Id_aluno` (`Id_aluno`);

--
-- Índices de tabela `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pessoa` (`id_pessoa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `carona`
--
ALTER TABLE `carona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carona`
--
ALTER TABLE `carona`
  ADD CONSTRAINT `carona_ibfk_1` FOREIGN KEY (`id_veiculo`) REFERENCES `carro` (`id`),
  ADD CONSTRAINT `carona_ibfk_2` FOREIGN KEY (`Id_aluno`) REFERENCES `aluno` (`id`);

--
-- Restrições para tabelas `carro`
--
ALTER TABLE `carro`
  ADD CONSTRAINT `carro_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `aluno` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
