CREATE DATABASE portfolio;

USE portfolio; 

CREATE TABLE port_itens(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
titulo VARCHAR(64) NOT NULL,
descricao TEXT NOT NULL,
tecnologias VARCHAR(256) NOT NULL,
imgCaminho VARCHAR(256) NOT NULL
);

INSERT INTO port_itens(titulo,descricao,tecnologias,imgCaminho) VALUES('Exemplo1' , 'Apenas o exemplo1' , 'jQuery/Bootstrap/PHP','img/meuwebsite.png');
INSERT INTO port_itens(titulo,descricao,tecnologias,imgCaminho) VALUES('Exemplo2' , 'Apenas o exemplo2' , 'jQuery/Bootstrap/PHP','img/meuwebsite.png');
INSERT INTO port_itens(titulo,descricao,tecnologias,imgCaminho) VALUES('Exemplo3' , 'Apenas o exemplo3' , 'jQuery/Bootstrap/PHP','img/meuwebsite.png');
INSERT INTO port_itens(titulo,descricao,tecnologias,imgCaminho) VALUES('Exemplo4' , 'Apenas o exemplo4' , 'jQuery/Bootstrap/PHP','img/meuwebsite.png');