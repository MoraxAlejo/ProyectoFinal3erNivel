
<?php
session_start();
require_once "../conexiondb.php";
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT * FROM maestros WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$id_maestro = $resultado['id_maestro'];
$query = "SELECT estudiantes.nombre, estudiantes.apellido, estudiantes.email, cursos.nombre_curso
          FROM estudiantes
          INNER JOIN inscripciones ON estudiantes.id_estudiante = inscripciones.estudianteID
          INNER JOIN cursos ON inscripciones.cursoID = cursos.id
          WHERE cursos.maestroID = ?";

$query2  = $mysqli->query("SELECT nombre_curso
FROM cursos
WHERE maestroID = '$id_maestro'");
$resultado2 = $query2->fetch_assoc();

// Preparar la consulta.
$stmt = $mysqli->prepare($query);

// Vincular el parámetro del maestro.
$stmt->bind_param("i", $id_maestro);

// Ejecutar la consulta.
$stmt->execute();

// Obtener resultados.
$result = $stmt->get_result();

// Cerrar la consulta.
$stmt->close();



?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Estudiantes</title>
</head>
<body>
    <h2>Lista de Estudiantes del Curso <?php echo $resultado2['nombre_curso'] ?></h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
        </tr>
        <?php
        // Iterar a través de los resultados y mostrarlos en la tabla.
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos.
$mysqli->close();
?>


