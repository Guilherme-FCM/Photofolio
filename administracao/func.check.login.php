<?php
//func.check.login.php

if ($_SESSION['codsessao']=="" || $_SESSION['ativo_inativo']==2){
	print "<script>document.location='login.php'</script>";
}

?>