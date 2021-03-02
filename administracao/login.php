<!-- login.php -->
<html>
<?php
include('head.php')
?>
<body>
<div id="geral">
 <?php
	include('topo.php');
	(!empty($_GET["pagina"])?include(trim($_GET["pagina"])):include('login2.php'));
 ?>
</div>
</body>
</html>