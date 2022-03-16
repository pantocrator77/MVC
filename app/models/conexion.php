<?php   
    require ('/config/db_connect_data.php');
    private $con;
    class Connect{
        public function __construct(){
                $this->Connect = new mysqli(DB_NAME, DB_USER, DB_PASSWORD, DB_HOST); 
        }    
        public function getTasks (){
                $query = this->con->query('SELECT * FROM tareas');
                //controlador
                $num =[];
                i=0;
                while ($filas = $query->fetch_assoc[]){
                $retorno[i] = $fila;
                $i++;
                }//controlador
        return $retorno;
        }
        //CRUD



?>