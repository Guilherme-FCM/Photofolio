<?php
//cad_usuario.php
include('../config.php');

if (isset($_GET['processa_pagina']) && isset($_GET['id'])){
    if ($_GET['processa_pagina']=='edita'){
        $sql_edita="select * from usuario where id=".$_GET['id'];
        
        $rs_edita=mysqli_query($conexao, $sql_edita);
        
        $linha_edita=mysqli_fetch_array($rs_edita);
    }
}

?>
<html>
<head><title>Cadastro de Usuário</title>

<script language="javascript">
    function excluir(id, nome){
        var msg;
        msg='Confirma a exclusão do usuário '+nome+'?';
        if(confirm(msg)){
            location="<?='cad_usuario_x.php?processa_pagina=exclui&id='?>"+id;
        }
    }
</script>

</head>
<body>
<table width="650" align="center" cellpadding="2" cellspacing="2" border="0">
<form name="form1" method="post" action="cad_usuario_x.php?processa_pagina=inclui">
<tr>
    <td colspan="2" align="center"><h1>CADASTRO DE USUÁRIOS</h1></td>
</tr>
<tr>
    <td>ID USUÁRIO</td>
    <td><input type="text" name="txt_id_usuario" size="3" value="<?=isset($linha_edita['id'])?$linha_edita['id']:''?>" readonly style="background-color:#e0e0e0"></td>
</tr>
<tr>
    <td>NOME</td>
    <td><input type="text" name="txt_nome" size="56" value="<?=isset($linha_edita['user_nome'])?$linha_edita['user_nome']:''?>" maxlength="150" required="required"></td>
</tr>
<tr>
    <td>LOGIN</td>
    <td><input name="txt_login" rows="6" cols="58" required="required" value="<?=isset($linha_edita['user_login'])?$linha_edita['user_login']:''?>"></td>
</tr>
<tr>
    <td>SENHA</td>
    <td><input type="password" name="txt_senha" rows="6" cols="58" required="required" value="<?=isset($linha_edita['user_senha'])?$linha_edita['senha']:''?>"></td>
</tr> 
<tr>
    <td>EMAIL</td>
    <td><input name="txt_email" rows="6" cols="58" required="required" value="<?=isset($linha_edita['email'])?$linha_edita['email']:''?>"></td>
</tr>
<tr>
    <td>TIPO</td>
    <td>
    <input type="radio" name="txt_tipo" value="1" required="required" <?=isset($linha_edita['tipo']) && $linha_edita['tipo']==1?"checked=\"checked\"":''?>>Administrador
    
    <input type="radio" name="txt_tipo" value="2" required="required" <?=isset($linha_edita['tipo']) && $linha_edita['tipo']==2?"checked=\"checked\"":''?>>Usuário Comum
    </td>
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
    &nbsp;&nbsp;&nbsp;<input type="button" value="Limpar" onClick="javascript:document.location='cad_usuario.php';"></td>
</tr>
</form>
</table>
<br/><br/>
<table width="650" align="center" cellpadding="2" cellspacing="2" border="1">
<tr>
    <td>ID USUÁRIO</td>
    <td>NOME</td>
    <td>LOGIN</td>
    <td>EMAIL</td>
    <td>TIPO</td>
    <td>ATIVO/INATIVO</td>
</tr>
<?php
    $sql_generico="select id, user_nome, user_login, user_senha, email, case tipo when '1' then 'administrador' when '2' then 'usuario comum' end as tipo, case ativo_inativo when '1' then 'Ativo' when '2' then 'Inativo' end as ativo_inativo
    from usuario";
    
    $consulta_generico=mysqli_query($conexao, $sql_generico);
    
    while($linha=mysqli_fetch_array($consulta_generico)){
      echo '<tr>';
        echo '<td>'.$linha['id'].'</td>';
        echo '<td>'.$linha['user_nome'].'</td>';
        echo '<td>'.substr($linha['user_login'],0,200).'...</td>';
        echo '<td>'.$linha['email'].'</td>';
        echo '<td>'.$linha['tipo'].'</td>';
        echo '<td>'.$linha['ativo_inativo'].'</td>';
        echo '<td><a href=\'javascript: void excluir('.$linha['id'].', "'.$linha['user_nome'].'")\'><img src="botao_excluir.jpg" width="30" heigth="30"></a>&nbsp;&nbsp;&nbsp;<a href="cad_usuario.php?processa_pagina=edita&id='.$linha['id'].'"><img src="botao_editar.jpg" width="30" heigth="30"></a></td>';
      echo '</tr>';
    }
?>
</table>
</body>
</html>