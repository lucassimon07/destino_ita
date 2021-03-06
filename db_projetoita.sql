
CREATE SCHEMA IF NOT EXISTS `db_destinoita` DEFAULT CHARACTER SET utf8 ;
USE `db_destinoita` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_destinoita`.`usuarios` (
  `id_usuarios` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usuario` VARCHAR(255) NOT NULL,
  `senha_usuario` VARCHAR(255) NOT NULL,
  `nome_usuario` VARCHAR(255) NOT NULL,
  `tipo_usuario` TINYINT NOT NULL
  );



-- -----------------------------------------------------
-- Table `mydb`.`atracoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_destinoita`.`atracoes` (
  `id_atracao` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome_atracao` VARCHAR(255) NOT NULL,
  `descricao_atracao` TEXT NOT NULL,
   `categoria_atracao` VARCHAR(255) NOT NULL,
  `telefone_atracao` VARCHAR(255) NULL,
  `localizacao_atracao` VARCHAR(255) NOT NULL,
  `imagem_atracao` VARCHAR(255) NOT NULL,
  `horario_funcionamento_atracao` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `db_destinoita`.`telefones` (
  `id_telefone` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `nome_telefone` VARCHAR(255) NOT NULL,
  `numero_telefone` VARCHAR(255) NOT NULL
  );

USE db_destinoita;

INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `telefone_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Torres da Igreja
Submersa', 'Marco de um povo, ícone único no mundo, é a única construção remanescente da Velha cidade de Itá, que foi totalmente alagada pela represa da Usina Hidrelétrica Itá.', 'atracoes_gratuitas', '5214-2535', 'Avenida Tancredo Neves', 'dc70e95c49e2cc52fc6506c71462a8a1.jpeg', 'Aberto 24h');

INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Balvedere Dona Roma', 'A praça Belvedere Dona Roma, é um belíssimo lugar para você contemplar a natureza, o lago e ver o mais belo pôr do sol. ', 'atracoes_gratuitas', 'Avenida Tancredo Neves', '31f91f5dc999cfb641f6b3f1db1c62bb.jpg', 'Aberto 24h');

INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Mirante Vertedouro
da Usina(SC)', 'O Mirante do Vertedouro da Usina- Lado SC, tem vista para as 6 comportas da Barragem que em épocas de cheia, ao abri-las encantam a todos pelo show das águas.', 'atracoes_gratuitas', 'Avenida Tancredo Neves', '50aea2825d31d82395dffe5db0c8124f.jpg', 'Aberto 24h');



INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Funicular', 'Esse equipamento faz a integração da região turística, até o centro da cidade e é o segundo existente no Brasil, na modalidade turística. No entanto, é o primeiro e único fabricado totalmente em nosso País e o único no mundo, com iluminação e acionamentos por energia solar. ', 'atracoes_pagas', 'Avenida Tancredo Neves', '18761ffdc98680d84b90b3f48d0e6c15.jpg', 'Aberto 24h');




INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Restaurante e Lanchonete
Família Picolli', 'No restaurante da Família Picolli, você encontra aquela comida caseira e saborosa, atendimento familiar, e local aconchegante, o restaurante dispõe diariamente buffet livre e comida em quilo.', 'alimentacao', 'Avenida Tancredo Neves', '5498244f6dc54a2ed5db18ee706d7b6a.jpg', 'Segunda a sexta = 11:30h-14:30h / Finais de semana = 10:00h-15:00h');





INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Passeio de Barco
Capitão Itá', 'Saindo diariamente da Prainha, com agendamento. O passeio conta com uma visão deslumbrante de pôr do sol no lado da Usina Hidrelétrica de Itá, além de um espetáculo nas Torres da Igreja Submersa, a noite iluminadas, com show de fogos e música ao vivo.', 'passeios', 'Avenida Tancredo Neves', 'imagen_574_566225a6184a2.jpg', 'Aberto 24h');

INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `telefone_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Itá Thermas Resort e Spa', 'O Resort conta com 134 apartamentos nas categorias luxo, suítes luxo e suítes máster, com alto conforto em ambiente climatizado. Além disso, o Resort oferece um excelente restaurante, com padrão internacional. ', 'hospedagem', '3654-2563', 'Avenida Tancredo Neves', 'img.stpu.com.br.jpg', 'Segunda a sexta = 11:30h-14:30h / Finais de semana = 10:00h-15:00h');


INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Museu Casa Alberton', 'A Casa Alberton foi construída na década de 1930, usada como moradia da família e funcionava como comércio (armazém de secos e molhados). Em 1997 foi relocada e restaurada pela Gerasul e partir de um projeto chamado Arca de Noé, deﬁniu sua adaptação como espaço cultural, integrado a Casa da Memória de Itá. ', 'museus', 'Avenida Tancredo Neves', '97cc5fbaedd5b771be38aee0c08f613d.jpg.1045.600.0.-269.683.393.jpg', 'Aberto 24h');


INSERT INTO `db_destinoita`.`atracoes` (`nome_atracao`, `descricao_atracao`, `categoria_atracao`, `localizacao_atracao`, `imagem_atracao`, `horario_funcionamento_atracao`) VALUES ('Itá Shopping', 'A loja Itá Shopping, atua em Itá a 15 anos, trabalha com lembranças do município, Artesanato, Cama Mesa e Banho, vestuário adulto e infantil, aviamentos, artigos para piscinas, e toda a linha de presentes. ', 'comercio', 'Avenida Tancredo Neves', 'foto_01-d10fc2d1e5.jpg', 'Aberto 24h');



INSERT INTO `db_destinoita`.`telefones` (`nome_telefone`, `numero_telefone`) VALUES ('Bombeiros', '193');

INSERT INTO `db_destinoita`.`telefones` (`nome_telefone`, `numero_telefone`) VALUES ('Plantão Polícia', '99924-2536');

INSERT INTO `db_destinoita`.`usuarios` (`usuario`, `senha_usuario`, nome_usuario, tipo_usuario) VALUES ('admin', 'admin', 'Admin', '2');

















