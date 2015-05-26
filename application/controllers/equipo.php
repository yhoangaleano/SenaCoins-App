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

				if ($registrar > 0) {
					try{ 

						if(mkdir("upload/guias/".$registrar) == true && mkdir("upload/artefactos/".$registrar) == true){
							$mensaje="Se registro correctamente ";
						}else{
							$mensaje="Se registro correctamente, pero la carpeta no fue posible crearla";
						}

					}catch(Exception $e){
						$mensaje="Se registro correctamente, pero la carpeta no fue posible crearla";
					}

				}
				else{
					$mensaje="Error al Registrar";
				}

			}
			echo json_encode(['item'=>$mensaje]);
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
					$mensaje="Se modifico correctamente";
				}
				else{
					$mensaje="Error al modificar";
				}

			}
			echo json_encode(['item'=>$mensaje]);
		}
	}


	?>