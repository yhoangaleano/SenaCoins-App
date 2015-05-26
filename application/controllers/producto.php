<?php 

	/**
	* 
	*/
	class Producto extends Controller
	{

		public $modelProducto = null;

		function __construct(){
			$this->modelProducto = $this->loadModel("mdlProducto");
		}		
		
		public function Index(){
			$lista = $this->modelProducto->listar();
			$lista_json = json_encode($lista);
			$this->render("Index", array('listaProductos' => $lista, 'lista_json' => $lista_json));
		}

		public function Listar(){
			$lista = $this->modelProducto->listar();
			echo json_encode($lista);
		}
	}


 ?>