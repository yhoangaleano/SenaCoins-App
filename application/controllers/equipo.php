<?php 

	/**
	* 
	*/
	class Equipo extends Controller
	{

		public $modelEquipo = null;

		function __construct(){
			$this->modelEquipo = $this->loadModel("mdlEquipo");
		}		
		
		public function Listar(){
			$lista = $this->modelEquipo->listar();
			echo json_encode($lista);
		}

		public function Index(){
			$this->render("Index", array("slides" => false) );
		}
	}


 ?>