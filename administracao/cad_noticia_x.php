
<?php
//cad_noticia_x.php
include ('../config.php');

if (!empty($_GET['processa_pagina']) && $_GET['processa_pagina']=='inclui'){
	
	$id_noticia=($_POST['txt_id_noticia']?$_POST['txt_id_noticia']:0);
	
	$titulo=$_POST['txt_titulo'];
	$conteudo=$_POST['txt_conteudo'];
	$categoria=$_POST['txt_categoria'];
	$data=$_POST['txt_data'];
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
	
	$sql_checar="select id from noticias where id=$id_noticia"; //id valido (existe registro) ou se o id for 0 (novo registro)
	
	$rs_checar=mysqli_query($conexao, $sql_checar);
	
	if($linha_checar=mysqli_num_rows($rs_checar)){
		$sql_cadastra="update noticias set titulo='$titulo', conteudo='$conteudo', cod_categoria=$categoria, data_noticia='$data', ativo_inativo=$ativo_inativo where id=$id_noticia";
	}else{
		$sql_cadastra="insert into noticias (titulo, conteudo, cod_categoria, data_noticia, ativo_inativo) values ('$titulo', '$conteudo', $categoria, '$data', $ativo_inativo)";
	}
	mysqli_query($conexao, $sql_cadastra);
	header ("Refresh:0; URL=cad_noticia.php");
	exit;	
	
}elseif(!empty($_GET['processa_pagina']) && $_GET['processa_pagina']=='exclui' && !empty($_GET['id'])){
	$sql_exclui="update noticias set ativo_inativo=2 where id=".$_GET['id'];
	
	mysqli_query($conexao, $sql_exclui);
	
	header("Refresh:0; URL=cad_noticia.php");
	
	exit;
}

?>