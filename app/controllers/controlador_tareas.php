<?php
require ("/modelo/conexion.php");
$conect = new Connect();
$tareas = $con->getTasks();
?>