<?php
//config.php

//essa linha conecta o php com o banco de dados

//mysqli_connect('local onde o banco', 'usuario do banco', 'senha do banco', 'nome do banco de dados')

$conexao=mysqli_connect('localhost', 'root', '', 'noticias');

//verifica se há algo errado com a conexão

if (mysqli_connect_errno()){
	printf("A conexão com o banco de dados falhou %s\n", mysqli_connect_error());
	exit;
}

/*try{
	$conexao=mysqli_connect('localhost', 'root', 'lapo', 'noticias');
}catch(mysqli_connect_errno $erro){
	echo "A conexão com o banco de dados falhou %s\n". $erro;
	exit;
}*/

//resolve problemas de acentuação
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

?>