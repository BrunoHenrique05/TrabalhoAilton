<?php
/* 
CREATE DATABASE `sistema_login` CHARACTER SET utf8; 

CREATE USER 'admin_db'@'localhost' IDENTIFIED BY 'senha_234887';  

FLUSH PRIVILEGES;

GRANT
  ALTER,
  ALTER ROUTINE,
  CREATE,
  CREATE ROUTINE,
  CREATE TEMPORARY TABLES,
  CREATE VIEW,
  DELETE,
  DROP,
  EVENT,
  EXECUTE,
  INDEX,
  INSERT,
  LOCK TABLES,
  REFERENCES,
  SELECT,
  SHOW VIEW,
  TRIGGER,
  UPDATE 
ON
  `sistema_login`.* 
TO
  'admin_db' @'localhost'; 
  
CREATE TABLE `sistema_login`.`usuarios` (
  `user_id` INT (11) NOT NULL AUTO_INCREMENT COMMENT 'ID do Usuário',
  `user` VARCHAR (255) NOT NULL COMMENT 'Usuário',
  `user_name` VARCHAR (255) NOT NULL COMMENT 'Nome do usuário',
  `user_password` VARCHAR (255) NOT NULL COMMENT 'Senha',
  `user_matricula`VARCHAR (255) NOT NULL COMMENT 'Matricula',
  `user_cpf` VARCHAR (255) NOT NULL COMMENT 'CPF',
  `user_email` VARCHAR (255) NOT NULL COMMENT 'Email',
  `user_Telefone` VARCHAR (255) NOT NULL COMMENT 'Telefone',
  `user_celular`VARCHAR (255) NOT NULL COMMENT 'Celular',
  `user_atuacoes`VARCHAR (255) NOT NULL COMMENT 'Atuações',
  PRIMARY KEY (`user_id`)
) CHARSET = utf8 ;
*/
