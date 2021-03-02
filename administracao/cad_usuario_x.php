
<?php
//cad_noticia_x.php
include ('../config.php');

if (!empty($_GET['processa_pagina']) && $_GET['processa_pagina']=='inclui'){
	
	$id_usuario=($_POST['txt_id_usuario']?$_POST['txt_id_usuario']:0);
	
	$nome=$_POST['txt_nome'];
	$login=$_POST['txt_login'];
	$senha=$_POST['txt_senha'];
	$email=$_POST['txt_email'];
	$tipo=$_POST['txt_tipo'];
	$ativo_inativo=$_POST['txt_ativo_inativo'];
	
	//DEBUG
	/*
	echo '<br/>';
	echo 'id : '.$id_noticia.'<br/>';
	echo 'titulo : '.$titulo.'<br/>';
	echo 'conteudo : '.$conteudo.'<br/>';
	echo 'categoria : '.$categoria.'<br/>';
	echo 'data : '.$data.'<br/>';
	echo 'ativo_inativo : '.$ativo_inativo.'<br/>';
	exit;
	*/
	
	$sql_checar="select id from usuario where id=$id_usuario"; //id valido (existe registro) ou se o id for 0 (novo registro)
	
	$rs_checar=mysqli_query($conexao, $sql_checar);
	
	if($linha_checar=mysqli_num_rows($rs_checar)){
		$sql_cadastra="update usuario set user_nome='$nome', user_login='$login', user_                                                                                                                                                                       senha='$senha', email='$email', tipo=$tipo, ativo_inativo=$ativo_inativo where id=$id_usuario";
	}else{
		$sql_cadastra="insert into usuario (user_nome, user_login, user_senha, email, tipo, ativo_inativo) values ('$nome', '$login', '$senha', '$email', $tipo, $ativo_inativo)";
	}
	mysqli_query($conexao, $sql_cadastra);
	header ("Refresh:0; URL=cad_usuario.php");
	exit;	
	
}elseif(!empty($_GET['processa_pagina']) && $_GET['processa_pagina']=='exclui' && !empty($_GET['id'])){
	$sql_exclui="update usuario set ativo_inativo=2 where id=".$_GET['id'];
	
	mysqli_query($conexao, $sql_exclui);
	
	header("Refresh:0; URL=cad_usuario.php");
	
	exit;
}

?>