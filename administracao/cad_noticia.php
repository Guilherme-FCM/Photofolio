<?php
//cad_noticia.php
include('../config.php');

if (isset($_GET['processa_pagina']) && isset($_GET['id'])){
	if ($_GET['processa_pagina']=='edita'){
		$sql_edita="select * from noticias where id=".$_GET['id'];
		
		$rs_edita=mysqli_query($conexao, $sql_edita);
		
		$linha_edita=mysqli_fetch_array($rs_edita);
	}
}

?>
<html>
<head><title>Cadastro de Notícias</title>

<script language="javascript">
	function excluir(id, nome){
		var msg;
		msg='Confirma a exclusão da notícia de título: '+nome+'?';
		if(confirm(msg)){
			location="<?='cad_noticia_x.php?processa_pagina=exclui&id='?>"+id;
		}
	}
</script>

</head>
<body>
<table width="650" align="center" cellpadding="2" cellspacing="2" border="0">
<form name="form1" method="post" action="cad_noticia_x.php?processa_pagina=inclui">
<tr>
	<td colspan="2" align="center"><h1>CADASTRO DE NOTÍCIAS</h1></td>
</tr>
<tr>
	<td>ID NOTÍCIA</td>
	<td><input type="text" name="txt_id_noticia" size="3" value="<?=isset($linha_edita['id'])?$linha_edita['id']:''?>" readonly style="background-color:#e0e0e0"></td>
</tr>
<tr>
	<td>TÍTULO</td>
	<td><input type="text" name="txt_titulo" size="56" value="<?=isset($linha_edita['titulo'])?$linha_edita['titulo']:''?>" maxlength="150" required="required"></td>
</tr>
<tr>
	<td>CONTEÚDO</td>
	<td><textarea name="txt_conteudo" rows="6" cols="58" required="required"><?=isset($linha_edita['conteudo'])?$linha_edita['conteudo']:''?></textarea></td>
</tr>
<tr>
	<td>CATEGORIA</td>
	<td>
		<select name="txt_categoria" required="required">
			<option value="0">Escolha uma categoria</option>
			<?php
				$sql_categoria="select * from categorias";
				
				$rs_categoria=mysqli_query($conexao,$sql_categoria);
				
				while($linha_categoria=mysqli_fetch_row($rs_categoria)){
					if(isset($linha_edita['cod_categoria']) && $linha_categoria[0]==$linha_edita['cod_categoria']){
						echo "<option value='$linha_categoria[0]' selected>$linha_categoria[1]</option>";
					}else{
						echo "<option value='$linha_categoria[0]'>$linha_categoria[1]</option>";
					}
				}
			?>
		</select>
	</td>
</tr>
<tr>
	<td>DATA</td>
	<td><input type="date" name="txt_data" value="<?=isset($linha_edita['data_noticia'])?$linha_edita['data_noticia']:''?>" required="required"></td>
</tr>
<tr>
	<td>ATIVO/INATIVO</td>
	<td>
	<input type="radio" name="txt_ativo_inativo" value="1" required="required" <?=isset($linha_edita['ativo_inativo']) && $linha_edita['ativo_inativo']==1?"checked=\"checked\"":''?>>Ativo
	
	<input type="radio" name="txt_ativo_inativo" value="2" required="required" <?=isset($linha_edita['ativo_inativo']) && $linha_edita['ativo_inativo']==2?"checked=\"checked\"":''?>>Inativo
	</td>
</tr>
<tr>
	<td colspan="2">
	<?php
	if (isset($_GET['processa_pagina']) && $_GET['processa_pagina']=='edita'){
		echo '<input type="submit" value="Alterar">';
	}else{
		echo '<input type="submit" value="Incluir">';
	}
	?>
	&nbsp;&nbsp;&nbsp;<input type="button" value="Limpar" onClick="javascript:document.location='cad_noticia.php';"></td>
</tr>
</form>
</table>
<br/><br/>
<table width="650" align="center" cellpadding="2" cellspacing="2" border="1">
<tr>
	<td>ID</td>
	<td>TÍTULO</td>
	<td>CONTEÚDO</td>
	<td>CATEGORIA</td>
	<td>DATA</td>
	<td>ATIV/INATIV</td>
	<td>AÇÃO</td>
</tr>
<?php
	$sql_generico="select n.id, n.titulo, n.conteudo, c.nome, n.data_noticia, case n.ativo_inativo when '1' then 'Ativo' when '2' then 'Inativo' end as ativo_inativo
	from noticias n
	inner join categorias c on c.id=n.cod_categoria
	order by n.data_noticia";
	
	$consulta_generico=mysqli_query($conexao, $sql_generico);
	
	while($linha=mysqli_fetch_array($consulta_generico)){
	  echo '<tr>';
		echo '<td>'.$linha['id'].'</td>';
		echo '<td>'.$linha['titulo'].'</td>';
		echo '<td>'.substr($linha['conteudo'],0,200).'...</td>';
		echo '<td>'.$linha['nome'].'</td>';
		echo '<td>'.$linha['data_noticia'].'</td>';
		echo '<td>'.$linha['ativo_inativo'].'</td>';
		echo '<td><a href=\'javascript: void excluir('.$linha['id'].', "'.$linha['titulo'].'")\'><img src="botao_excluir.jpg" width="30" heigth="30"></a>&nbsp;&nbsp;&nbsp;<a href="cad_noticia.php?processa_pagina=edita&id='.$linha['id'].'"><img src="botao_editar.jpg" width="30" heigth="30"></a></td>';
	  echo '</tr>';
	}
?>
</table>
</body>
</html>