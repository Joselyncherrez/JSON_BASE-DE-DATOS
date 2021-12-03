<?php
include "db.inc.php";

//obtener datos desde el formulario
$nombre = $_POST ['name'];
$apellido = $_POST ['lastname'];
$correo = $_POST ['mail'];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('$nombre', '$apellido',' $correo')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;


  echo "<link rel='stylesheet' type='text/css' href='assets\css\bootstrap.min.css'>";
echo "<link rel='stylesheet' href='assets\css\estilos.css'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'&amp;gt;>";
echo "<br>";
echo "<div class='text-center'>";
echo '<a href="json.php"> <input type="button" value="Visualizar JSON" class="btn btn-default btn-primary mb-2"></a>'."\n";

echo "</div>";
  ?>