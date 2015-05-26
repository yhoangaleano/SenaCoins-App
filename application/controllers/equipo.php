<?php 

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
			$this->render("Index");
		}

		public function Create(){
			$mensaje="";
			if ($_POST != null) {
				$nomEquipo = $_POST['txtNombreEquipo'];
				$user = $_POST['txtNombreUsuario'];
				$psw = $_POST['txtContrasena'];
				$this->modelEquipo->__SET('_nombre_equipo', $nomEquipo);
				$this->modelEquipo->__SET('_nombre_usuario', $user);
				$this->modelEquipo->__SET('_contrasena', $psw);
				$registrar = $this->modelEquipo->guardar();
				if ($registrar == true) {
					//header("location:".URL."equipo/Index");
				}
				else{
					$mensaje="Error al Registrar el equipo";
				}

			}
			$this->render("create",['mensaje'=>$mensaje]);
		}


		public function Modificar()
		{
			$mensaje="";
			if ($_POST != null) {
				$idEquipo = $_POST['txtCodigoEquipo'];
				$nomEquipo = $_POST['txtNombreEquipo'];
				$user = $_POST['txtNombreUsuario'];
				$psw = $_POST['txtContrasena'];
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