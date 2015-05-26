<?php 

	/**
	* 
	*/
	class mdlProducto
	{
		private $_idProducto;
		private $_idEquipo;
		private $_nombre_producto;
		private $_descripcion;
		private $_url_guia;
		private $_administrador;
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
	    	$gsent = $this->db->prepare("call SP_GuardarProducto(:np, :d, :ug, ie)");

	    	$gsent->bindValue(":np", $this->__GET("_nombre_equipo"), PDO::PARAM_STR);
	    	$gsent->bindValue(":d", $this->__GET("_nombre_usuario"), PDO::PARAM_STR);
	    	$gsent->bindValue(":ug", $this->__GET("_contrasena"), PDO::PARAM_STR);
	    	$gsent->bindValue(":ie", $this->__GET("_contrasena"), PDO::PARAM_STR);

	    	$stm = $gsent->execute();

	    	return $stm;
	    }
	

		public function Modificar(){
	    	$gsent = $this->db->prepare("call SP_MdificarEquipo(:idE, :ne, :nu, :c)");

	    	$gsent->bindValue(":idE", $this->__GET("_idEquipo"), PDO::PARAM_INT);
	    	$gsent->bindValue(":ne", $this->__GET("_nombre_equipo"), PDO::PARAM_STR);
	    	$gsent->bindValue(":nu", $this->__GET("_nombre_usuario"), PDO::PARAM_STR);
	    	$gsent->bindValue(":c", $this->__GET("_contrasena"), PDO::PARAM_STR);

	    	$stm = $gsent->execute();

	    	return $stm;
	    }

	    public function Listar(){
	    	$stm = $this->db->prepare("call SP_ListarProducto()");

	    	$stm->execute();

	    	return $stm->fetchAll();
	    }

	    public function login(){
	    	$gsent = $this->db->prepare("CALL SP_Login(:nu)");
	    	
			$gsent->bindValue(":nu",$this->__GET("_nombre_usuario"));

			$gsent->execute();

	    	return $gsent->fetch();
	    }
	}

 ?>