<?php
session_start();
require_once __DIR__ . '/../../conexiondb.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_estudiante'])) {
    $id = $_GET['id_estudiante'];

    $consulta = $mysqli->query("SELECT *FROM estudiantes WHERE id_estudiante = '$id'");
    $resultado = $consulta->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h2>Editar Producto</h2>
    <form method="post" action="editar_action.php">
        Matricula: <input type="text" name="matricula" value="<?php echo $resultado['matricula']; ?>"><br>
        Correo: <input type="text" name="email" value="<?php echo $resultado['email']; ?>"><br>
        Nombre: <input type="text" name="nombre" value="<?php echo $resultado['nombre']; ?>"><br>
        Apellidos: <input type="text" name="apellidos" value="<?php echo $resultado['apellido']; ?>"><br>
        Direccion: <input type="text" name="direccion" value="<?php echo $resultado['direccion']; ?>"><br>
        Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" value="<?php echo $resultado['fecha_nacimiento']; ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>