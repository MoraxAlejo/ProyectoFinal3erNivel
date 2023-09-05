<?php
session_start();
require_once __DIR__ . '/../../conexiondb.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_estudiante'])) {
    $id_estudiante = $_GET['id_estudiante'];

    // Evitar la vulnerabilidad de inyección SQL usando consultas preparadas
    $query = "DELETE FROM inscripciones WHERE estudianteID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_estudiante);

    // Primero eliminamos al estudiante de la tabla de inscripciones
    if ($stmt->execute()) {
        // Luego, eliminamos al estudiante de la tabla de estudiantes
        $query = "DELETE FROM estudiantes WHERE id_estudiante = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id_estudiante);

        if ($stmt->execute()) {
            // Éxito en la eliminación
            header("Location: crud_alumnos.php");
            exit();
        } else {
            // Manejar un posible error al eliminar al estudiante de la tabla de estudiantes
            echo "Error al eliminar el estudiante de la tabla de estudiantes: " . $stmt->error;
        }
    } else {
        // Manejar un posible error al eliminar al estudiante de la tabla de inscripciones
        echo "Error al eliminar el estudiante de la tabla de inscripciones: " . $stmt->error;
    }

    
}

?>
