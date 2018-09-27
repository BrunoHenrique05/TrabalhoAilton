-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: sistema_login
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1


CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID do Usuário',
  `user` varchar(255) NOT NULL COMMENT 'Usuário',
  `user_name` varchar(255) NOT NULL COMMENT 'Nome do usuário',
  `user_password` varchar(255) NOT NULL COMMENT 'Senha',
  `user_matricula` varchar(255) NOT NULL COMMENT 'Matricula',
  `user_cpf` varchar(255) NOT NULL COMMENT 'CPF',
  `user_email` varchar(255) NOT NULL COMMENT 'Email',
  `user_Telefone` varchar(255) NOT NULL COMMENT 'Telefone',
  `user_celular` varchar(255) NOT NULL COMMENT 'Celular',
  `user_atuacoes` varchar(255) NOT NULL COMMENT 'Atuações',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

