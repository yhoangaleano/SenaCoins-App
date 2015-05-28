<?php 

	/**
	* 
	*/
	class mdlImagen
	{
		private $_idImagen;
		private $_url_imagen;
		private $_producto_idProducto;
		private $_estado;
		private $db;

		public function __GET($key){
			return $this->$key;
		}

		public function __SET($key, $value){
			$this->$key = $value;
		}
		
		function __construct($db)
		{
			try {
				$this->db = $db;
			} catch (PDOException $e) {
				exit('Database connection could not be established.');
			}
		}

		public function Guardar(){
			$stmt = $this->db->prepare("INSERT INTO imagen VALUES (0, ?, ?, ?)");
			$stmt->bindValue(1, $this->__GET("_url_imagen"), PDO::PARAM_STR);
			$stmt->bindValue(2, $this->__GET("_producto_idProducto"), PDO::PARAM_STR);
			$stmt->bindValue(3, $this->__GET("_estado"), PDO::PARAM_INT);
			return $stmt->execute();
		}

		public function GuardarGuia(){
			$stmt = $this->db->prepare("UPDATE producto SET url_guia = ? WHERE idProducto = ?");
			$stmt->bindValue(1, $this->__GET("_url_imagen"), PDO::PARAM_STR);
			$stmt->bindValue(2, $this->__GET("_producto_idProducto"), PDO::PARAM_STR);
			return $stmt->execute();
		}

		public function BorrarGuia(){
			$stmt = $this->db->prepare("UPDATE producto SET url_guia = null WHERE idProducto = ?");
			$stmt->bindValue(1, $this->__GET("_producto_idProducto"), PDO::PARAM_STR);
			return $stmt->execute();
		}

		public function ObtenerGuia(){
			$stmt = $this->db->prepare("SELECT url_guia FROM producto WHERE idProducto = ?");
			$stmt->bindValue(1, $this->__GET("_producto_idProducto"), PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}

	}
?>