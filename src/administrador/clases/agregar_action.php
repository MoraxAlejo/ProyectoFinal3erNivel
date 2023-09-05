<?php 
session_start();
require_once __DIR__ . '/../../conexiondb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre_curso = $_POST['curso_name'];
    $maestroID = $_POST['id_maestro'];

    // Realizar la inserción en la base de datos
    // Por ejemplo:
     $consulta = $mysqli->prepare("INSERT INTO cursos (nombre_curso, maestroID) VALUES (?, ?)");
     $consulta->bind_param("si", $nombre_curso, $maestroID);
     $consulta->execute();
    
    // Redirigir a una página de éxito o mostrar un mensaje de confirmación
    header("Location: clases_vista.php");
    exit;
}
?>


