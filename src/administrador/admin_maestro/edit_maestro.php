<?php
session_start();
require_once __DIR__ . '/../../conexiondb.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_maestro'])) {
    $id = $_GET['id_maestro'];

    $consulta = $mysqli->query("SELECT *FROM maestros WHERE id_maestro = '$id'");
    $resultado = $consulta->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Maestro</title>
</head>
<body>
    <h2>Editar Maestro</h2>
    <form method="post" action="edit_action.php">
        Email: <input type="text" name="email" value="<?php echo $resultado['email']; ?>"><br>
        Nombre: <input type="text" name="nombre" value="<?php echo $resultado['nombre']; ?>"><br>
        Apellidos: <input type="text" name="apellido" value="<?php echo $resultado['apellido']; ?>"><br>
        Direccion: <input type="text" name="direccion" value="<?php echo $resultado['direccion']; ?>"><br>
        Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" value="<?php echo $resultado['fecha_nacimiento']; ?>"><br>
        Clase asignada: <input type="date" name="fecha_nacimiento" value=""><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>