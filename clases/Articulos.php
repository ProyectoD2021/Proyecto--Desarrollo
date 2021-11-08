

<?php 
	class articulos{
		public function agregaImagen($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into imagenes (
										nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									
									'$fecha')";
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}
		public function insertaArticulo($datos){  
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into articulos (
										id_imagen,
										id_usuario,
										
										descripcion,
										
										fechaCaptura) 
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$fecha')";
			return mysqli_query($conexion,$sql);
		}

		


		 

		public function actualizaArticulo($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE articulos set  
										
										descripcion='$datos[1]'
										
						where id_producto='$datos[0]'";

			return mysqli_query($conexion,$sql);
		}



		 

		public function eliminaArticulo($idarticulo){
			$c=new conectar();
			$conexion=$c->conexion();

			$idimagen=self::obtenIdImg($idarticulo);

			$sql="DELETE from articulos 
					where id_producto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);

			if($result){
				$ruta=self::obtenRutaImagen($idimagen);

				$sql="DELETE from imagenes 
						where id_imagen='$idimagen'";
				$result=mysqli_query($conexion,$sql);
					if($result){
						if(unlink($ruta)){
							return 1;
						}
					}
			}
		}

		public function obtenIdImg($idProducto){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_imagen 
					from articulos 
					where id_producto='$idProducto'";
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenRutaImagen($idImg){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT ruta 
					from imagenes 
					where id_imagen='$idImg'";

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

	}

 ?>