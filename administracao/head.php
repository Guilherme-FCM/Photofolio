<?php
session_start();

error_reporting(~E_NOTICE);
?>
<head>
<!-- head.php -->
<script language="javascript">
	function excluir(id, nome){
		var msg;
		msg='Confirma a exclusão do id '+id+' e nome de usuário '+nome+'?';
		if (confirm(msg)){
			location="<?='login.php?pagina=cad_usuario_x.php&processa_pagina=excluir&id='?>"+id;
		}
	}
</script>
</head>