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

		public function detalle($id){
			$this->modelProducto->__SET('_idProducto', $id);
			$artefacto = $this->modelProducto->Listar_Detalle_Artefacto();

			$imagenes = $this->modelProducto->Listar_Imagenes_Asociadas();
			// var_dump($imagenes[0]);
			// exit();
			$this->render("detalleArtefacto", array("id" => $id, "artefacto" => $artefacto, "imagenes" => $imagenes));
		}

		public function Listar(){
			$lista = $this->modelProducto->listar();
			echo json_encode($lista);
		}

		public function transaccion(){
			$mensaje = 0;
			if ($_POST != null) {
				$idArtefacto = $_POST['idArtefacto'];
				$cantidadCoins = $_POST['cantidadCoins'];
				$this->modelProducto->__SET('_idProducto', $idArtefacto);
				$this->modelProducto->__SET('_monedas', $cantidadCoins);
				$registrar = $this->modelProducto->generarTransaccion();
				if ($registrar == true) {
					$mensaje = 1;
				}
				else{
					$mensaje= 0;
				}

			}
			echo json_encode(['mensaje'=>$mensaje]);
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