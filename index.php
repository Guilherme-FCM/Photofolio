<?php
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: PhotoFolio
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PhotoFolio</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<!-- tabs -->
<script type="text/javascript" src="layout/scripts/jquery.ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#tabcontainer").tabs({
        event: "click"
    });
});
</script>
<!-- / tabs -->
<script type="text/javascript" src="layout/scripts/jquery-photostack.js"></script>
<!-- coinslider -->
<script type="text/javascript" src="layout/scripts/jquery-coin-slider.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#portfolioslider').coinslider({
        width: 480,
        height: 280,
        navigation: false,
        links: false,
        hoverPause: true
    });
});
</script>
<!-- / coinslider -->
</head>
<body id="top">
<div class="wrapper col1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.php">PhotoFolio</a></h1>
      <p>Free Website Template</p>
    </div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="topbar" class="clear">
    <ul id="topnav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="pages/style-demo.html">Style Demo</a></li>
      <li><a href="pages/full-width.html">Full Width</a></li>
      <li><a href="#">CATEGORIAS</a>
        <ul>
          <?php
			//1)Montar um sql com informações
			$sql_cat="select * from categorias";
			
			//2)Executar o sql acima.
			$consulta_cat=mysqli_query($conexao, $sql_cat);
			
			//3)Mostrar o conteúdo do sql acima
			while($linha_cat=mysqli_fetch_row($consulta_cat)){
				echo '<li><a href="index.php?pagina=conteudo.php&categoria='.$linha_cat[1].'">'.$linha_cat[1].'</a></li>';
			}
		  ?>
        </ul>
      </li>
      <li><a href="pages/portfolio.html">Portfolio</a></li>
      <li class="last"><a href="pages/gallery.html">Gallery</a></li>
    </ul>
    <form action="index.php?pagina=conteudo.php" method="get" id="search">
      <fieldset>
        <legend>Procurar por...</legend>
        <input type="text" name="procurar" value="Procurar por..." onfocus="this.value=(this.value=='Procurar por...')? '' : this.value ;" />
        <input type="image" id="go" src="layout/images/search.gif" alt="Search" />
      </fieldset>
    </form>
  </div>
</div>
<!-- ####################################################################################################### -->
<?php
(!empty($_GET['pagina'])?include(trim($_GET['pagina'])):include('conteudo.php'));
?>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="footer" class="clear">
    <div class="footbox">
      <h2>About Us</h2>
      <p>Lornunc tincidunt nec nequat risus convallisis elit vestiquat justo et volutpat. Urnanec monterdum turistibus semportis non vivamus justo pellus ac integestiquat eros. Turet cursuspend ero nulla dapienteger quisque nullamcorper lorem in ut pellus.</p>
      <p>Atmaecenas nec non nam nullamcorper magna id id nisl ac in. Sedfauctortis fuscetus estibus gravida id dui curabitur commodo facilisi loborttitorttitor vitae.</p>
    </div>
    <div class="footbox">
      <h2>Our Skillset</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor sit</a></li>
        <li><a href="#">Amet consectetur</a></li>
        <li><a href="#">Praesent vel sem id</a></li>
        <li><a href="#">Curabitur hendrerit est</a></li>
        <li><a href="#">Aliquam eget erat nec sapien</a></li>
        <li><a href="#">Cras id augue nunc</a></li>
        <li><a href="#">In nec justo non</a></li>
        <li><a href="#">Vivamus mollis enim ut</a></li>
        <li class="last"><a href="#">Sed a nulla urna</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Blog Links</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor sit</a></li>
        <li><a href="#">Amet consectetur</a></li>
        <li><a href="#">Praesent vel sem id</a></li>
        <li><a href="#">Curabitur hendrerit est</a></li>
        <li><a href="#">Aliquam eget erat nec sapien</a></li>
        <li><a href="#">Cras id augue nunc</a></li>
        <li><a href="#">In nec justo non</a></li>
        <li><a href="#">Vivamus mollis enim ut</a></li>
        <li class="last"><a href="#">Sed a nulla urna</a></li>
      </ul>
    </div>
    <div class="footbox last">
      <h2>Keep in Touch</h2>
      <ul>
        <li><a href="#">Check out our Facebook page</a></li>
        <li><a href="#">Get the latest Tweets</a></li>
        <li><a href="#">Grab our latest Deviants</a></li>
        <li><a href="#">View our LinkedIn profile</a></li>
      </ul>
      <h2>Contact Us</h2>
      <ul>
        <li><strong class="title">Tel:</strong><br />
          xxxxx xxxxxxxxxx</li>
        <li><strong class="title">Email:</strong><br />
          <a href="#">contact@mydomain.com</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </div>
</div>
</body>
</html>