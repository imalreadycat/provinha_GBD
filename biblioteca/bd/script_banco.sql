DROP DATABASE BCKbasedados;

CREATE DATABASE BCKbasedados;

USE BCKbasedados;

DROP TABLE IF EXISTS `Cliente`;
CREATE TABLE `Cliente` (
  `idCliente` int(10) NOT NULL AUTO_INCREMENT,
  `rg` int(10) NOT NULL,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`idCliente`)
);

DROP TABLE IF EXISTS `itemVenda`;

CREATE TABLE `itemVenda` (
  `codvenda` int(10) unsigned NOT NULL,
  `codProduto` int(10) unsigned NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  PRIMARY KEY (`codvenda`,`codProduto`),
  KEY `codProduto` (`codProduto`),
  FOREIGN KEY (`codvenda`) REFERENCES `venda` (`codvenda`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`codProduto`) REFERENCES `produto` (`codProduto`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `codProduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  PRIMARY KEY (`codProduto`)
);

DROP TABLE IF EXISTS `venda`;
CREATE TABLE `venda` (
  `codvenda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(10) NOT NULL,
  `dataVenda` date NOT NULL,
  PRIMARY KEY (`codvenda`),
  KEY `fk_venda_Cliente1_idx` (`idCliente`),
  CONSTRAINT `fk_venda_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

-- Procedures --

-- Cliente --
DROP PROCEDURE IF EXISTS sp_cadastra_cliente;
DELIMITER $$

CREATE PROCEDURE sp_cadastra_cliente(IN rg INT(10), nome VARCHAR(60))
BEGIN
	IF(rg != 0)AND(nome != "")THEN
		INSERT INTO cliente (rg, nome) VALUES(rg, nome);
	ELSE 
		SELECT "Você deve preencher todos os campos!" AS msg;
	END IF;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_listar_clientes;
DELIMITER $$

CREATE PROCEDURE sp_listar_clientes()
BEGIN
	SELECT * FROM cliente;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_deleta_cliente_por_id;
DELIMITER $$

CREATE PROCEDURE sp_deleta_cliente_por_id(IN id INT(10))
BEGIN
	DELETE FROM cliente WHERE idCliente=id;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_listar_cliente_por_id;
DELIMITER $$

CREATE PROCEDURE sp_listar_cliente_por_id(IN id INT(10))
BEGIN
	SELECT * FROM cliente WHERE idCliente=id;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_atualizar_dados_do_cliente;
DELIMITER $$

CREATE PROCEDURE sp_atualizar_dados_do_cliente(IN id INT(10), rg INT(10), nome VARCHAR(60))
BEGIN
	UPDATE cliente SET rg=rg, nome=nome WHERE idCliente=id;
END $$

DELIMITER ;

-- Produto --
DROP PROCEDURE IF EXISTS sp_cadastra_produto;
DELIMITER $$

CREATE PROCEDURE sp_cadastra_produto(IN descricao VARCHAR(45), quantidade INT(10))
BEGIN
	IF(descricao != "")AND(quantidade != 0)THEN
		INSERT INTO produto (descricao, quantidade) VALUES(descricao, quantidade);
	ELSE 
		SELECT "Você deve preencher todos os campos!" AS msg;
	END IF;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_listar_produtos;
DELIMITER $$

CREATE PROCEDURE sp_listar_produtos()
BEGIN
	SELECT * FROM produto;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_deleta_produto_por_id;
DELIMITER $$

CREATE PROCEDURE sp_deleta_produto_por_id(IN id INT(10))
BEGIN
	DELETE FROM produto WHERE codProduto=id;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_listar_produto_por_id;
DELIMITER $$

CREATE PROCEDURE sp_listar_produto_por_id(IN id INT(10))
BEGIN
	SELECT * FROM produto WHERE codProduto=id;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_atualizar_dados_do_produto;
DELIMITER $$

CREATE PROCEDURE sp_atualizar_dados_do_produto(IN id INT(10), descricao VARCHAR(60), quantidade INT(10))
BEGIN
	UPDATE produto SET descricao=descricao, quantidade=quantidade WHERE codProduto=id;
END $$

DELIMITER ;

-- Venda --

DROP PROCEDURE IF EXISTS sp_cadastrar_venda;

DELIMITER $$

CREATE PROCEDURE sp_cadastrar_venda(in idCliente int(10), dataVenda DATE)
BEGIN
    if (idCliente != 0) and (dataVenda  != "") then
	INSERT INTO venda (idCliente , dataVenda ) VALUES(idCliente , dataVenda);
    else 
             SELECT  "Você deve inserir um valor!" AS msg;
END IF;

END $$ 

DELIMITER ;



DROP PROCEDURE IF EXISTS sp_listar_vendas;
DELIMITER $$

CREATE PROCEDURE sp_listar_vendas()
BEGIN
	SELECT * FROM venda;
END $$

DELIMITER ;


DROP PROCEDURE IF EXISTS sp_deleta_venda_por_id;
DELIMITER $$

CREATE PROCEDURE sp_deleta_venda_por_id(IN id INT(10))
BEGIN
	DELETE FROM venda WHERE codvenda=id;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_listar_venda_por_id;
DELIMITER $$

CREATE PROCEDURE sp_listar_venda_por_id(IN id INT(10))
BEGIN
	SELECT * FROM venda WHERE codvenda=id;
END $$

DELIMITER ;



DROP PROCEDURE IF EXISTS sp_atualizar_dados_da_venda;
DELIMITER $$

CREATE PROCEDURE sp_atualizar_dados_da_venda(in id int(10), cod int(10), dataVenda DATE)
BEGIN
	UPDATE venda SET dataVenda=dataVenda WHERE codvenda=id and idCliente = cod;
END $$

DELIMITER ;


-- itemVenda --

DROP PROCEDURE IF EXISTS sp_cadastrar_itemvenda;

DELIMITER $$

CREATE PROCEDURE sp_cadastrar_itemvenda(IN codvenda INT(10), codProduto INT(10), quantidade INT(10))
BEGIN

declare quanti INT;

IF(codvenda != 0)AND(codProduto != 0)AND(quantidade != 0)THEN
SET quanti = (SELECT quantidade FROM produto WHERE codProduto = codProduto);
IF (quantidade < quanti) THEN
SELECT "Estoque insuficiente" AS Msg;
ELSE
INSERT INTO itemVenda VALUES(codvenda, codProduto, quantidade);
END IF;

ELSE
SELECT "Informe valores válidos" AS Msg;
END IF;

END $$ 

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_listar_itemvendas;
DELIMITER $$

CREATE PROCEDURE sp_listar_itemvendas()
BEGIN
	SELECT * FROM itemvenda;
END $$

DELIMITER ;



DROP PROCEDURE IF EXISTS sp_atualizar_dados_do_itemvenda;
DELIMITER $$

CREATE PROCEDURE sp_atualizar_dados_do_itemvenda(IN ID INT(10), cod INT(10), quantidade INT(10))
BEGIN
	UPDATE itemvenda SET quantidade=quantidade WHERE codvenda=id and codProduto = cod;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_apagar_itemvenda;

DELIMITER $$

CREATE PROCEDURE sp_apagar_itemvenda(IN ID INT(10), cod INT(10))
BEGIN
	DELETE FROM itemvenda WHERE codvenda=id and codProduto = cod;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_pegar_itemvenda_por_id;

DELIMITER $$

CREATE PROCEDURE sp_pegar_itemvenda_por_id(IN ID INT(10), cod INT(10))
BEGIN
	SELECT * FROM itemvenda WHERE codvenda=id;
END $$

DELIMITER ;

DROP PROCEDURE IF EXISTS sp_pegar_itemvenda_por_id;

DELIMITER $$

CREATE PROCEDURE sp_pegar_itemvenda_por_id(IN id INT(10), cod INT(10))
BEGIN
	SELECT * FROM itemvenda WHERE codvenda=id and codProduto = cod;
END $$

DELIMITER ;

-- triggers --

DROP TRIGGER IF EXISTS tgr_diminuiestoque;
DELIMITER $$ 
CREATE TRIGGER tgr_diminuiestoque
AFTER INSERT ON itemvenda 
FOR EACH ROW 
BEGIN 
update produto set produto.Quantidade = produto.Quantidade- New.Quantidade 
where produto.codproduto = new.codproduto; 
END $$ 
DELIMITER ;

DROP TRIGGER IF EXISTS tgr_restauraestoque;
DELIMITER $$ 
CREATE TRIGGER tgr_restauraestoque
AFTER DELETE ON itemvenda 
FOR EACH ROW 
BEGIN 
update produto set produto.Quantidade = produto.Quantidade+ Old.Quantidade 
where produto.codproduto = Old.codproduto; 
END $$ 
DELIMITER ;