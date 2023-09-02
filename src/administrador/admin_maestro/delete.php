<?php
session_start();
require_once __DIR__ . '/../../conexiondb.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_maestro'])) {
        $id = $_GET['id_maestro'];

        // Evitar la vulnerabilidad de inyección SQL usando consultas preparadas
        $query = "DELETE FROM maestros WHERE id_maestro = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Éxito en la eliminación
            header("Location: crud_maestros.php");
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
