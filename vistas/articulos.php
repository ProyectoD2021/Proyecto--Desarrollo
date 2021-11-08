<?php 
session_start();
if(isset($_SESSION['usuario'])){
 
	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>galeria</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		
		?>

     
	</head>
	<body style="background-image: linear-gradient(-225deg, #77FFD2 0%, #6297DB 48%, #1EECFF 100%);">
		
		<div class="container">  
			
			<div class="row col-md-offset-3"> 
				<div class="col-md-8">
					<h1>Galeria</h1>
					<form id="frmArticulos" enctype="multipart/form-data">
						<label>Imagen</label>
						<input type="file" id="imagen" name="imagen">
						<label>Comentario</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
						
						
						<p></p>
						<span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
						
						   
					</form>
					

					<div id="tablaArticulosLoad"></div>
				</div>
				
			</div>
		</div>


		<div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Articulo</h4>
					</div>
					<div class="modal-body">
						<form id="frmArticulosU" enctype="multipart/form-data">
							<input type="text" id="idArticulo" hidden="" name="idArticulo">
							<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
								<option value="A">Selecciona Categoria</option>
								<?php 
								$sql="SELECT id_categoria,nombreCategoria
								from categorias";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Descripcion</label>
							<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
							<label>Cantidad</label>
							<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
							<label>Precio</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
							
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>




 
	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosArticulo(idarticulo){
			$.ajax({
				type:"POST",
				data:"idart=" + idarticulo,
				url:"../procesos/articulos/obtenDatosArticulo.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idArticulo').val(dato['id_producto']);
					$('#categoriaSelectU').val(dato['id_categoria']);
					$('#nombreU').val(dato['nombre']);
					$('#descripcionU').val(dato['descripcion']);
				//	$('#cantidadU').val(dato['cantidad']);
					$('#precioU').val(dato['precio']);

				}
			});
		}


		 



		function eliminaArticulo(idArticulo){
			alertify.confirm('¿Lo Desea Eliminar?', function(){ 
				$.ajax({
					type:"POST",
					data:"idarticulo=" + idArticulo,
					url:"../procesos/articulos/eliminarArticulo.php",
					success:function(r){
						if(r==1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							 $('#buscador').load('articulos/buscador.php');
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado')
			});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaarticulo').click(function(){

				datos=$('#frmArticulosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/articulos/actualizaArticulos.php",
					success:function(r){
						if(r==1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							 $('#buscador').load('articulos/buscador.php');
							alertify.success("Actualizado con exito");
						}else{
							alertify.error("Error al actualizar");
						}
					}
				});
			});
		});





			 
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
            $('#buscador').load('articulos/buscador.php');
			$('#btnAgregaArticulo').click(function(){

				vacios=validarFormVacio('frmArticulos');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmArticulos"));  

				$.ajax({
					url: "../procesos/articulos/insertaArticulos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){
							$('#frmArticulos')[0].reset();
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							 $('#buscador').load('articulos/buscador.php');
							alertify.success("Agregado con exito");
						}else{
							alertify.error("Fallo al subir ");
						}
					}
				});
				
			});
		});
	</script>





	
	<?php 
}else{
	header("location:../index.php");
}
?>