<?php
include('func.check.login.php');
?>
<!-- index.php -->
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
<h1>Olá <?php echo $_SESSION['nome'];?></h1>

<a href="login.php?pagina=cad_usuario.php"><h2>Cadastro de Usuário</h2></a>

<a href="func.logout.php"><h2>Sair</h2></a>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
