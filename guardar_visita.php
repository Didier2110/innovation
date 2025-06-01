<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conexion = new mysqli("localhost", "root", "", "innovation_visitas");

  if ($conexion->connect_error) {
    http_response_code(500);
    echo "Error de conexión: " . $conexion->connect_error;
    exit;
  }

  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $fecha = $_POST['fecha'];

  $sql = "INSERT INTO visitas (nombre, correo, telefono, direccion, fecha)
          VALUES ('$nombre', '$correo', '$telefono', '$direccion', '$fecha')";

  if ($conexion->query($sql) === TRUE) {
    echo "¡Registro exitoso!";
  } else {
    http_response_code(500);
    echo "Error al registrar visita.";
  }

  $conexion->close();
}
?>