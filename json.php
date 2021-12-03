<?php
include "db.inc.php";

//CREAMOS LA CONEXIÓN CON EL SERVIDOR QUE SE ALMACENARÁ EN $conexion
$conexion=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password );
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM Myguests";
$result = $conexion->prepare($query);
$result->execute();

$objeto = array();


/* array asociativo */
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    
   
    $objeto ['Todos los usuarios'][] = $row;

}

//Crear un boton para regresar al formulario
echo "<link rel='stylesheet' type='text/css' href='assets\css\bootstrap.min.css'>";
echo "<link rel='stylesheet' href='assets\css\estilos.css'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'&amp;gt;>";
echo "<br>";
echo "<div class='text-center'>";
echo '<a href="index.html"> <input type="button" value="Formulario" class="btn btn-default btn-primary mb-2"></a>'."\n";

echo "</div>";


echo json_encode($objeto);
?>