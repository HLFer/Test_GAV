<?php
//Arquivo para receber os dados digitados pelo cliente 
include "database.php";
include "upload.php";

$nome = $_POST["nome"];
$quantidade = $_POST["quantidade"];
$foto = $_FILES["foto"];
$descricao = $_POST["descricao"];

//Chama a funcao para inserir a imagem da peca 
$nome_imagem = upload($foto);

//Cria o objeto para conexao com o Banco de dados
$db = new Database();
//Insere no banco os dados coletados -  armazenados nas variaveis $_POST e $_FILES
$db->insertPeca($nome, $quantidade, $foto, $descricao);

//Verifica a quantidade de pecas no banco
$pecas = $db->getTotalPecas();

//Se a quantidade for igual a 5, a mensagem abaixo sera retornada
if ($pecas == 5)
{
	echo "Há somente 5 produtos em estoque!";
}