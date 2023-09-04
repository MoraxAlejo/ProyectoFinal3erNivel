<?php
session_start();
require_once "../conexiondb.php";

$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT *FROM estudiantes WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$id_estudent = $resultado['id_estudiante'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Asignados</title>
</head>

<body>
    <h1>Cursos disponibles</h1>
        <?php
$query = "SELECT cursos.id, cursos.nombre_curso
          FROM cursos
          LEFT JOIN inscripciones ON cursos.id = inscripciones.cursoID AND inscripciones.estudianteID = $id_estudent
          WHERE inscripciones.cursoID IS NULL";
$result = $mysqli->query($query);

if ($result) {
    // Comprobar si hay cursos disponibles para inscripción
    if ($result->num_rows > 0) {
        echo '<table border="1">
                <tr>
                    <th>ID del Curso</th>
                    <th>Nombre del Curso</th>
                    <th>Inscribir</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre_curso'] . "</td>";
            echo "<td> <a href='inscribir_curso.php?id=" . $row['id'] . "'>Inscribir</a></td>";
            echo "</tr>";
        }

        echo '</table>';
    } else {
        echo 'Ya estás inscrito en todos los cursos disponibles.';
    }

    $result->free(); // Liberar los resultados de la consulta
} else {
    echo 'Error en la consulta: ' . $mysqli->error;
}

?>

    </table>

    <h1>Cursos a los que estas inscrito</h1>
    <?php

   

    // Consulta SQL para obtener los cursos inscritos por el estudiante
    $query = "SELECT cursos.id, cursos.nombre_curso
    FROM inscripciones
    INNER JOIN cursos ON inscripciones.cursoID = cursos.id
    WHERE inscripciones.estudianteID = $id_estudent";

    $result = $mysqli->query($query);

    if ($result) {
        // Comprobar si el estudiante está inscrito en algún curso
        if ($result->num_rows > 0) {
            echo '<table border="1">
                <tr>
                    <th>Nombre del Curso</th>
                    <th>Darse de baja </th>
                </tr>';

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                   echo " <td>" . $row['nombre_curso'] . "</td>";
                   echo "<td> <a href='darse_baja.php?id=" . $row['id'] . "'>Darse de baja</a></td>";
                  echo "</tr>";
            }

            echo '</table>';
        } else {
            echo 'El estudiante no está inscrito en ningún curso.';
        }

        $result->free(); // Liberar los resultados de la consulta
    } else {
        echo 'Error en la consulta: ' . $mysqli->error;
    }

    $mysqli->close(); // Cerrar la conexión a la base de datos
    ?>



</body>

</html>