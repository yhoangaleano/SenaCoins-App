<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    public $modelEquipo = null;

    function __construct(){
        $this->modelEquipo = $this->loadModel("mdlEquipo");
    }


    public function index()
    {
        $this->render("index", array('slides' => true));
    }


    public function login(){
      

        $mensaje="";
        if ($_POST != null) {

            $user = $_POST['txtUsuario'];
            $psw = $_POST['txtContrasena'];
            $this->modelEquipo->__SET('_nombre_usuario', $user);
            $usuarios = $this->modelEquipo->login();
            if ($usuarios != false) {
                if ($usuarios->contrasena == $psw) {
                    $_SESSION['ID'] = $usuarios->idEquipo;
                    $_SESSION['Rol'] = $usuarios->administrador;
                    $_SESSION['User'] = $user;
                    $_SESSION['Equipo'] = $usuarios->nombre_equipo;
                    header("Location:".URL."home/Index");
                }else{
                     $mensaje="alert('password incorrecto')";
                }
            }else{
                $mensaje="alert('El Usuario no existe')";
            }
            
        }
        $this->render("login", array('mensaje'=>$mensaje), false);
    }

    public function ValiUsuario(){

        if($this->isAjax()){

            $this->modelEquipo->__SET('_nombre_usuario', $_POST["User"]);

            $usuario = $this->modelEquipo->VlUsuario();

            if($usuario != false){
                echo json_encode(array("item"=>$usuario->imagen));
            }else{
                echo json_encode(array("item"=>null));
            }

        }else{
            header("location: ".URL."home/index");
        }

    }

    public function logout(){
        unset($_SESSION['ID']);
        unset($_SESSION['Rol']);
        unset($_SESSION['User']);
        unset($_SESSION['Equipo']);
        session_destroy();
        header("location: ".URL."home/index");
    }

}
