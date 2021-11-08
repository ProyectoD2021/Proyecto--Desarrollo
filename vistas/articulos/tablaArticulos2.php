
<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT 
					img.ruta,
					art.descripcion,
					art.id_producto
		  from articulos as art 
		  inner join imagenes as img
		  on art.id_imagen=img.id_imagen ORDER BY id_producto DESC" ;
	$result=mysqli_query($conexion,$sql);

 ?>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table  class="table" id="TablaDT" style="text-align: center; "> 
					<thead>
						<br>
						<tr>
							
							<td></td>
							<td></td>
							<td></td>
							
							
						</tr>
				  </thead>  
				  <tbody>
					<?php 

                            

					 
					while($ver=mysqli_fetch_row($result)): 

                        
			 
						?>
						 
							<tr>
								
								<td>
									<?php 
									$imgVer=explode("/", $ver[0]) ; 
									$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
									?>
									<img width="80" height="80" src="<?php echo $imgruta ?>">
								</td>
								<td><?php echo $ver[1]; ?></td>
								
								<td>
									<button  class="btn btn-default btn-xs" >
										<span class="glyphicon glyphicon-thumbs-up">Like</span>
									</button>
								</td>
								
								 
								 
									 
							</tr>
							
				<?php endwhile; ?> </tbody>
			</table>
		</div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#TablaDT').DataTable();
	});
</script>