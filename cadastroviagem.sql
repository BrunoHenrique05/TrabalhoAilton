-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2018 às 06:47
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
-- Estrutura da tabela `cadastroviagem`
--

CREATE TABLE `cadastroviagem` (
  `id` int(11) NOT NULL,
  `tipoFormulario` varchar(45) NOT NULL,
  `tipoSolitacao` varchar(45) NOT NULL,
  `finalidadeViagem` varchar(45) NOT NULL,
  `numeroBanco` varchar(45) NOT NULL,
  `numeroAgencia` varchar(45) NOT NULL,
  `numeroConta` varchar(45) NOT NULL,
  `ufOrigem` varchar(45) NOT NULL,
  `ufDestino` varchar(45) NOT NULL,
  `cidadeOrigem` varchar(45) NOT NULL,
  `cidadeDestino` varchar(45) NOT NULL,
  `dataSaida` date NOT NULL,
  `dataRetorno` date NOT NULL,
  `quantiadeDiarias` int(11) NOT NULL,
  `arquivo` varchar(200) NOT NULL,
  `justificativa` varchar(200) NOT NULL,
  `formaAfastamento` varchar(45) NOT NULL,
  `meioTransporte` varchar(45) NOT NULL,
  `usuarios_user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `recusa` varchar(300) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `de` varchar(45) DEFAULT NULL,
  `ate` varchar(45) DEFAULT NULL,
  `cadastroViagemcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastroviagem`
--

INSERT INTO `cadastroviagem` (`id`, `tipoFormulario`, `tipoSolitacao`, `finalidadeViagem`, `numeroBanco`, `numeroAgencia`, `numeroConta`, `ufOrigem`, `ufDestino`, `cidadeOrigem`, `cidadeDestino`, `dataSaida`, `dataRetorno`, `quantiadeDiarias`, `arquivo`, `justificativa`, `formaAfastamento`, `meioTransporte`, `usuarios_user_id`, `status`, `recusa`, `numero`, `de`, `ate`, `cadastroViagemcol`) VALUES
(1, 'inicial', 'passagem', 'capacitacao', 'sdsdsd', 'ssdsd', 'sdsd', 'sdsdsd', 'sdsdsd', '5454', '54554', '2018-06-27', '2018-06-28', 1, 'Rar!\Z\0????\0???\0<???1?? h?J?\0cromossomo/.classpath\n??	??Q?&U42?`Eܠ?=.?*?tZ???j?ڙnamZ?a??7?h(??3D??vN?%???????4????ՅJ?9?o8?6?M9?Q?y??ˡ???????J@?M?b??\rZmk?N?????GM(?(', 'sddaaad', 'diariaMeia', 'rodoviario', 1, 1, NULL, '12445', '', '', NULL),
(2, 'prorrogacao', 'passagem', 'capacitacao', 'byuk', 'ssdsd', 'sdsd', '545545', 'sdsdsd', '5454', 'sdsdsd', '2018-06-27', '2018-06-28', 1, '', 'sadsadsad', 'diariaMeia', 'oficial', 1, 2, NULL, '44545', '05:05', '05:59', NULL),
(3, 'prorrogacao', 'ressarcimento', 'capacitacao', '6565', '65566556', '655665', '545545', 'sdsdsd', '5454', '54554', '2018-06-13', '2018-06-14', 1, 'Rar!\Z\0????\0???\0<???1?? h?J?\0cromossomo/.classpath\n??	??Q?&U42?`Eܠ?=.?*?tZ???j?ڙnamZ?a??7?h(??3D??vN?%???????4????ՅJ?9?o8?6?M9?Q?y??ˡ???????J@?M?b??\rZmk?N?????GM(?(', 'gfgfgf', 'diariaMeia', 'oficial', 1, 2, NULL, '5555', '05:05', '06:59', NULL),
(4, 'prorrogacao', 'diaria', 'atvGestao', '1234', '1234', '1243', 'MG', 'SP', 'Ituiutaba', 'Sao Paulo', '2018-06-28', '2018-06-30', 0, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0?\0\0\nw\0\0\0????\0\0\0bKGD\0?\0?\0?????\0\0\0tIME?.?ϛ?\0\0 \0IDATx???y??U???g?S??$a?@d?HRC\0\r??\n?h\0?Y???T?E0?vK+??x?P?5??s?h_?8@?*B????J{??v 2\'Ug???h3$??s???g?Z????ϒ,}????;!I`?4?', 'teste ', 'diariaTotal', 'aereo', 1, 2, NULL, '554554', '00:00', '00:00', NULL),
(5, 'inicial', 'passagem', 'capacitacao', 'sdsdsd', 'ssdsd', '655665', 'sdsdsd', 'sdsdsd', 'ssdsd', 'sdsdsd', '2018-06-20', '2018-06-28', 8, '33dbfe64509c46c51fc728b5f64b4241.png', 'baitola', 'diariaTotal', 'rodoviario', 1, 3, NULL, NULL, '05:45', '04:45', NULL),
(6, 'inicial', 'diaria', 'capacitacao', '123456', '123456', '123456', 'MG', 'SP', 'Ituiutaba', 'Sao Paulo', '2018-06-28', '2018-07-31', 0, '4e5e3a95ce1d772ed30a675154087c36.png', 'Teste Automatizado', 'diariaTotal', 'aereo', 1, 1, NULL, NULL, '23:00', '17:00', NULL),
(7, 'inicial', 'diaria', 'capacitacao', '123456', '123456', '123456', 'mg', 'sp', 'ituiutaba', 'sao paulo', '2018-06-28', '2018-06-29', 1, 'ab397fcbe24b2b83c21a8b2b5b7149aa.png', 'Teste Automatizado', 'diariaTotal', 'aereo', 2, 1, NULL, NULL, '23:00', '23:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastroviagem`
--
ALTER TABLE `cadastroviagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cadastroViagem_usuarios_idx` (`usuarios_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastroviagem`
--
ALTER TABLE `cadastroviagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastroviagem`
--
ALTER TABLE `cadastroviagem`
  ADD CONSTRAINT `fk_cadastroViagem_usuarios` FOREIGN KEY (`usuarios_user_id`) REFERENCES `usuarios` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
