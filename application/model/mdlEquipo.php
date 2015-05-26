<?php 

	/**
	* 
	*/
	class mdlEquipo
	{

		private $_idEquipo;
		private $_nombre_equipo;
		private $_nombre_usuario;	
		private $_contrasena;
		private $_monedas;	
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
	    	$gsent = $this->db->prepare("call SP_GuardarEquipo(:ne, :nu, :c)");

	    	$gsent->bindValue(":ne", $this->__GET("_nombre_equipo"), PDO::PARAM_STR);
	    	$gsent->bindValue(":nu", $this->__GET("_nombre_usuario"), PDO::PARAM_STR);
	    	$gsent->bindValue(":c", $this->__GET("_contrasena"), PDO::PARAM_STR);

	    	$stm = $gsent->execute();

	    	return $stm;
	    }
	

		public function Modificar(){
	    	$gsent = $this->db->prepare("call SP_ModificarEquipo(:idE, :ne, :nu, :c)");

	    	$gsent->bindValue(":idE", $this->__GET("_idEquipo"), PDO::PARAM_INT);
	    	$gsent->bindValue(":ne", $this->__GET("_nombre_equipo"), PDO::PARAM_STR);
	    	$gsent->bindValue(":nu", $this->__GET("_nombre_usuario"), PDO::PARAM_STR);
	    	$gsent->bindValue(":c", $this->__GET("_contrasena"), PDO::PARAM_STR);

	    	$stm = $gsent->execute();

	    	return $stm;
	    }

	    public function Listar(){
	    	$stm = $this->db->prepare("call SP_ListarEquipo()");

	    	$stm->execute();

	    	return $stm->fetchAll();
	    }

	    public function login(){
	    	$gsent = $this->db->prepare("call SP_Login(:nu)");
	    	
	    	$gsent->bindValue(":nu",$this->__GET("_nombre_usuario"), PDO::PARAM_STR);

			$gsent->execute();

	    	return $gsent->fetch();
	    }

	    public function BusquedaParametro(){
	    	$gsent = $this->db->prepare("call SP_BusquedaParametro(:idE)");
	    	
	    	$gsent->bindValue(":idE",$this->__GET("_idEquipo"), PDO::PARAM_INT);

			$gsent->execute();

	    	return $gsent->fetch();
	    }

	    public function VlUsuario(){
	    	
	    	$gsent = $this->db->prepare("call SP_ValidarUsuario(:nu)");
	    	
	    	$gsent->bindValue(":nu",$this->__GET("_nombre_usuario"), PDO::PARAM_STR);

			$gsent->execute();

	    	return $gsent->fetch();
	    }
	}

 ?>