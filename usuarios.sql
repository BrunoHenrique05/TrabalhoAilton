-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2018 às 06:51
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_cpf` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_Telefone` varchar(45) NOT NULL,
  `user_celular` varchar(45) NOT NULL,
  `user_atuacoes` varchar(45) NOT NULL,
  `user_matricula` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user`, `user_name`, `user_cpf`, `user_email`, `user_Telefone`, `user_celular`, `user_atuacoes`, `user_matricula`, `user_password`) VALUES
(1, '1', 'fs', 'fsdfsdfsd', 'fsdfsdfsd', 'fsdfsdfsd', 'fsdfsdfsd', 'administrativo', 'sa', '$1$/v4.aN0.$0qTQvbSsIPxcRqbhS8iHj0'),
(2, '123456', 'Bruno Henrique da Silva Oliveira', '659559', 'SJUSDU@', '626565', '848448', 'diretorEnsino', '5895', '$1$Ab1.JE5.$t1An6AbgRL94cGKpdeRqI/'),
(3, 'bruno05', 'felllipe', '1062622662', 'bruno@kssdan', '84848', '848448', 'diretorGeral', '84249656', '$1$eA..PI3.$dby3v8SEnE7lr/SxYjMYl/'),
(4, 'bruno455', 'Bruno Henrique da Silva oliveira', '105544645455', 'bruno05@yahoo.com.br', '3497764477', '34988755551', 'professor', '87555465', '$1$0l5.HF1.$MdqXZ.47MRhaLfFqQZVMH1'),
(5, 'bruno', 'Bruno Henrique da Silva oliveira', '105544645455', 'bruno05@yahoo.com.br', '3497764477', '34988755551', 'professor', '87555465', '$1$E42.7e5.$avCldsXQdw9HlmemCMT9D/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
