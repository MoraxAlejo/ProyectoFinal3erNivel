<?php
session_start();
require_once __DIR__ . '/../../conexiondb.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_estudiante'])) {
        $id = $_GET['id_estudiante'];

        // Evitar la vulnerabilidad de inyección SQL usando consultas preparadas
        $query = "DELETE FROM estudiantes WHERE id_estudiante = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Éxito en la eliminación
            header("Location: crud_alumnos.php");
            exit();
        } else {
            // Manejar un posible error
            echo "Error al eliminar el estudiante: " . $stmt->error;
        }

        $stmt->close();
    }


// Cerrar la conexión a la base de datos al final del script si es necesario
$mysqli->close();
?>
