<?php 

	/**
	* 
	*/
	class Producto extends Controller
	{

		public $modelProducto = null;
		public $modelImagen = null;
		public $modelEquipo = null;

		function __construct(){
			$this->modelProducto = $this->loadModel("mdlProducto");
			$this->modelImagen = $this->loadModel("mdlImagen");
			$this->modelEquipo = $this->loadModel("mdlEquipo");
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

		public function listarEquipoProyecto(){
			$lista = $this->modelProducto->Listar_Equipos_Producto();
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

		public function create(){
			$mensaje="";
			if ($_POST != null) {
				if($this->modelEquipo->artefactoAso($_POST["txtIdEquipo"]) == false){

					$this->modelProducto->__SET('_nombre_producto', $_POST["txtNombreProducto"]);
					$this->modelProducto->__SET('_descripcion', $_POST["txtDescripcion"]);
					$this->modelProducto->__SET('_idEquipo', $_POST["txtIdEquipo"]);

					$registrar = $this->modelProducto->guardar();
					//var_dump($registrar);
					if ($registrar == true) {
						try{
							$this->subirUna(1);
							$mensaje = '1';
						}catch(Exception $e){
							$mensaje = '3';
						}

					}
					else{
						$mensaje="2";
					}
				}else{
					$mensaje = '4';
				}
			}
			$this->render("create",['mensaje'=>$mensaje]);
		}

		// Método para modificar un producto
		public function Modificar()
		{
			$mensaje="";
			if ($_POST != null) {
				$idProducto = $_POST['txt'];
				$nomProducto = $_POST['txtNombreProducto'];
				$descripcion = $_POST['txtDescripcion'];
				$this->modelProducto->__SET('_nombre_producto', $nomProducto);
				$this->modelProducto->__SET('_descripcion', $descripcion);
				$this->modelProducto->__SET('_idProducto', $idProducto);
				$modificar = $this->modelProducto->Modificar();
				if ($modificar == true) {
					$mensaje="Se modifico correctamente";
				}
				else{
					$mensaje="Error al modificar";
				}

			}
			echo json_encode(['item'=>$mensaje]);
		}


		//Imagenes
		public function asociar(){

			$this->render("asociarGaleria");
		}

		public function subir($estado = 0){

			if($_POST["txtIdEquipo"] != null){

				$target_dir = "upload/artefactos/".$_POST["txtIdEquipo"]."/";

				for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {

					$target_file = $target_dir . $_FILES["file"]["name"][$i];
					//var_dump($target_file);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

					// Check if file already exists
					if (file_exists($target_file)) {
					    	echo json_encode([
							    'status' => 'exist'
							]);
					    $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    echo json_encode([
							    'status' => 'fail'
						]);
					// if everything is ok, try to upload file
					} else {
					    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {

					    	$this->modelImagen->__SET("_url_imagen",$_FILES["file"]["name"][$i]);
					    	$art = $this->modelEquipo->artefactoAso($_POST["txtIdEquipo"]);
					    	$this->modelImagen->__SET("_producto_idProducto",$art->idProducto);
					    	$this->modelImagen->__SET("_estado",$estado);

					    	if($this->modelImagen->Guardar()){
					    		echo json_encode([
							    	'status' => 'ok'
								]);
					    	}else{
					    		echo json_encode([
							    	'status' => 'fail'
								]);
					    	}

					    } else {
					        echo json_encode([
							    	'status' => 'fail'
							]);
					    }
					}
				}

			}
		}


		public function subirUna($estado){

			if($_POST["txtIdEquipo"] != null){

				$target_dir = "upload/artefactos/".$_POST["txtIdEquipo"]."/";


					$target_file = $target_dir . $_FILES["file"]["name"];
					//var_dump($target_file);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

					// Check if file already exists
					if (file_exists($target_file)) {
						throw new Exception('exits');
					    $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    throw new Exception('fail');
					// if everything is ok, try to upload file
					} else {
					    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

					    	$this->modelImagen->__SET("_url_imagen",$_FILES["file"]["name"]);
					    	$art = $this->modelEquipo->artefactoAso($_POST["txtIdEquipo"]);
					    	$this->modelImagen->__SET("_producto_idProducto",$art->idProducto);
					    	$this->modelImagen->__SET("_estado",$estado);

					    	if($this->modelImagen->Guardar()){
					    		echo json_encode([
							    	'status' => 'ok'
								]);
					    	}else{
					    		throw new Exception('fail');
					    	}

					    } else {
					        throw new Exception('fail');
					    }
					}
				

			}
		}

		public function subirGuia(){

			if($_POST["txtIdEquipo"] != null){

				$target_dir = "upload/artefactos/".$_POST["txtIdEquipo"]."/";


					$target_file = $target_dir . $_FILES["file"]["name"];
					//var_dump($target_file);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

					// Check if file already exists
					if (file_exists($target_file)) {
						throw new Exception('exits');
					    $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    throw new Exception('fail');
					// if everything is ok, try to upload file
					} else {
					    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

					    	$this->modelImagen->__SET("_url_imagen",$_FILES["file"]["name"]);
					    	$art = $this->modelEquipo->artefactoAso($_POST["txtIdEquipo"]);
					    	$this->modelImagen->__SET("_producto_idProducto",$art->idProducto);
					    	$this->modelImagen->__SET("_estado",$estado);

					    	if($this->modelImagen->Guardar()){
					    		echo json_encode([
							    	'status' => 'ok'
								]);
					    	}else{
					    		throw new Exception('fail');
					    	}

					    } else {
					        throw new Exception('fail');
					    }
					}
			}
		}

		public function guias(){
			$this->render("guias");
		} 
	}


 ?>