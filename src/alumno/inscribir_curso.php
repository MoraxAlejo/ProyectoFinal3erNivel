<?php
session_start();
require_once "../conexiondb.php"; 
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT *FROM estudiantes WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$id_estudent = $resultado['id_estudiante'];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("INSERT INTO inscripciones (estudianteID, cursoID) VALUES (?, ?)");
    $stmt->bind_param("ii", $id_estudent, $id);
    if ($stmt->execute()) {
        header("Location: vista_estudiante.php");
    } else {
        // Ocurrió un error durante la inserción
        // Maneja el error apropiadamente
    }
    $stmt->close();
}


?>