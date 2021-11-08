<?php 

	class conectar{
		private $servidor="sql205.epizy.com";
		private $usuario="epiz_30303836";
		private $password="GeWLoyi0nOLvon";
		private $bd="epiz_30303836_proyecto";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>