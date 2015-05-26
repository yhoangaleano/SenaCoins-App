<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public static $db = null;

    /**
     * @var null Model
     */
    public $model = null;

    /**
     * @var default layout
     */

    public $layout = "header";

    /**
     * Whenever a controller is created, open a database connection too and load "the model".
     */
    //El nulo lo toma como un false
    //false == true entonces no carga el modelo

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        if (!isset(self::$db)) {

            // generate a database connection, using the PDO connector
            // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
            self::$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        }
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel($modelName)
    {
        $this->openDatabaseConnection();
        require APP . '/model/'.$modelName.'.php';
        // create new "model" (and pass the database connection)
        return new $modelName(self::$db);
    }


    public function CompareToWeb($page){
        if(isset($_SERVER['HTTP_REFERER'])) {
            if($_SERVER['HTTP_REFERER'] != APP.'controllers/'.$page) {
                return false;
            }else{
                return true;
            }
        }
    } 

    public function render($view, $datos=null, $estado=true){
        if(is_array($datos))
            extract($datos,EXTR_PREFIX_SAME,'data');
        else
            $data=$datos;

        define('content', APP.'views/'.strtolower(get_class($this)).'/'.$view.'.php');
        
        if($estado){
            require APP.'views/_templates/'.$this->layout.'.php';
        }else{
            require content;
        }
    }


    public function setSession($clave, $valor){
        $_SESSION[$clave] = $valor;
    }

    public function getSession($clave){
        if(isset($_SESSION[$clave])){
            return $_SESSION[$clave];
        }else{
            return false;
        }
    }

    public function destroySession($clave){
        if(isset($_SESSION[$clave])){
            unset($_SESSION[$clave]);
        }else{
            return false;
        }
        
    }

    public function isAjax()
    {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {return true;}
        else
        {return false;}
    }



}
