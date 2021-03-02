<?php
//noticia.php

$categoria="select c.nome, n.titulo, n.conteudo, n.id
from noticias n
inner join categorias c on c.id=n.cod_categoria
where n.id=".$_GET['id_noticia'];

$consulta_categoria=mysqli_query($conexao, $categoria);

$linha_categoria=mysqli_fetch_row($consulta_categoria);
?>
<div class="wrapper col2">
	<div id="container" class="clear">
		<h1><?php echo $linha_categoria[0].' &raquo; '.$linha_categoria[1];?></h1>
	
		<p><?php echo $linha_categoria[2];?></p>
		
		<!-- Begin Facebook Comments -->
<div id="fb-root">Comentários<br/><br/>
Atenção! Os comentários do Portal "Experimenta Ler" são via Facebook, lembre-se que o comentário é de inteira responsabilidade do autor, comentários impróprios poderam ser denunciados por outros usuários, acarretando até mesmo a perda da conta do Facebook.</div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="http://localhost/photofolio/index.php?pagina=noticia.php&id_noticia=<? echo $_GET["id_noticia"];?>" data-num-posts="10" data-width="700"></div> <!-- Enter your page URL here --> 
<!-- End Facebook Comments -->
	</div>
</div>




