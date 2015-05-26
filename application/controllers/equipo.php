<?php 

	/**
	* 
	*/
	
	class Equipo extends Controller
	{

		public $modelEquipo = null;
		$_SESSION["public"] = 2;

		function __construct(){
			$this->modelEquipo = $this->loadModel("mdlEquipo");

		}		
		
		public function Index(){
			$lista = $this->modelEquipo->listar();
			$this->render("Index", array('listaEquipos' => $lista));
		}

		public function Create(){
			$mensaje="";
			if ($_POST != null) {
				$nomEquipo = $_POST['txtNomEquipo'];
				$user = $_POST['txtUser'];
				$psw = $_POST['txtPass'];
				$this->modelEquipo->__SET('_nombre_equipo', $nomEquipo);
				$this->modelEquipo->__SET('_nombre_usuario', $user);
				$this->modelEquipo->__SET('_contrasena', $psw);
				$registrar = $this->modelEquipo->guardar();
				if ($registrar == true) {
					header("location:".URL."equipo/Index");
				}
				else{
					$mensaje="Error al Registrar el equipo";
				}

			}
			$this->render("create",['mensaje'=>$mensaje]);
		}

		public function detail()
		{
			$mensaje="";
			if ($_GET != null) {
				$idE = $_GET['id'];
				$this->modelEquipo->__SET('_idEquipo', $idE);
				$equipo = $this->modelEquipo->BusquedaParametro();
				$this->render("edit",array('equipo' => $equipo,'mensaje' => $mensaje));

				
			}			
		}

		public function edit()
		{
			$mensaje="";
			if ($_POST != null) {
				$idEquipo = $_POST['txtCod'];
				$nomEquipo = $_POST['txtNomEq'];
				$user = $_POST['txtUser'];
				$psw = $_POST['txtPass'];
				$this->modelEquipo->__SET('_idEquipo', $idEquipo);
				$this->modelEquipo->__SET('_nombre_equipo', $nomEquipo);
				$this->modelEquipo->__SET('_nombre_usuario', $user);
				$this->modelEquipo->__SET('_contrasena', $psw);
				$modificar = $this->modelEquipo->Modificar();
				if ($modificar == true) {
					header("location:".URL."equipo/Index");
				}
				else{
					$mensaje="Error al Modificar el equipo";
				}

			}
			$this->render("edit",['mensaje'=>$mensaje]);
		}
	}


	?>