
<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

</head>
<body style="background-size: 1300px 1200px; background-image: linear-gradient(-225deg, #B6CEE8 0%, #F578DC 100%);">

 
 
  <div id="nav" >
    <div class="navbar navbar-inverse navbar-fixed-top"   data-spy="affix" data-offset-top="100">
      <div class="container" >
        <div class="navbar-header" >
          <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="collapse navbar-collapse" style="background-color: rgb(0,207,,255);">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>

            
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Cuenta<span class="caret"></span></a>
            <ul class="dropdown-menu">
              
              <li><a href="articulos.php">Subir</a></li>
              
            </ul>
          </li>


        <?php
        if($_SESSION['usuario']=="admin"):
         ?>
           <li><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Administrar usuario</a>
            </li>
         <?php 
       endif;
          ?>


          
         
          
          
          <li class="dropdown" >
            <a href="#" style="color: green"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario']; ?>  <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
     
    </div>
   
  </div>
</div>


</body>
</html>

