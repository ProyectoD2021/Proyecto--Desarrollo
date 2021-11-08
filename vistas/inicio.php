<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
</head>
<body style="background-size: 1300px 1200px; background-image: linear-gradient(-225deg, #B6CEE8 0%, #F578DC 100%);">
  

<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
      	<?php
        if($_SESSION['usuario']=="admin"):
         ?>
           <li><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Administrar usuario</a>
            </li>
         <?php 
       endif;
          ?>
        <p><a href="#" class="glyphicon glyphicon-user">Usuario: <?php echo $_SESSION['usuario']; ?></a></p>
        <img  src="../img/face-red-loop-60.emoji_.gif" class="img-circle" height="115" width="115" alt="">
      </div>
      <div class="well">
        <p><a href="#">Intereses</a></p>
        <p>
          <span class="label label-default">Noticias</span>
          <span class="label label-primary">Musica</span>
          <span class="label label-success">Etiquetas</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Amigos</span>
        </p>
      </div>
      
      
    </div>

    <div class="col-sm-7">
    
      
      
    

 <h1>Galeria </h1>
        <span class="linea"></span>
        <section class="galeria"> 
            

          

              

              <div id="tablaArticulosLoad"></div>
             
























    </div>


    <div class="col-sm-2 well">
      <div class="thumbnail">
        <p>Anuncios:</p>
        <img class="img-responsive" src="../img/emogi1.gif" alt="" width="115" height="115">
        
       
      </div>   

      <div class="thumbnail">
        
        <img class="img-responsive" src="../img/giphy.gif" alt="" width="115" height="115">
      </div>

      <div class="thumbnail">
        
        <img class="img-responsive" src="../img/face-yellow-loop-01.emoji_.gif" alt="" width="115" height="115">
      </div>

        <div class="well">
          <div class="w3-col s4 w3-justify">
        
        </div>
       </div>

    </div>
  </div>
</div>











</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaArticulosLoad').load("articulos/tablaArticulos2.php");
            $('#buscador').load('articulos/buscador.php');
	});
</script>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>