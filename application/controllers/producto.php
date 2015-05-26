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

		public function galeria(){
			$this->render("galeria");
		}

		public function Listar(){
			$lista = $this->modelProducto->listar();
			echo json_encode($lista);
		}

		public function Create(){
			$mensaje="";
			if ($_POST != null) {
				$nomEquipo = $_POST['txtNomEquipo'];
				$user = $_POST['txtUser'];
				$psw = $_POST['txtPass'];
				$this->modelProducto->__SET('_nombre_equipo', $nomEquipo);
				$this->modelProducto->__SET('_nombre_usuario', $user);
				$this->modelProducto->__SET('_contrasena', $psw);
				$registrar = $this->modelProducto->guardar();
				if ($registrar == true) {
					//header("location:".URL."equipo/Index");
				}
				else{
					$mensaje="Error al Registrar el equipo";
				}

			}
			$this->render("create",['mensaje'=>$mensaje]);
		}
	}


 ?>