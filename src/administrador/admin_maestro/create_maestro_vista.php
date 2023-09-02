<?php 
session_start();
require_once __DIR__ . '/../../conexiondb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Maestro</title>
</head>
<body>
    <h2>Crear Maestro</h2>
<form method="post" action="crear_maestro.php">
        Correo: <input type="text" name="email" ><br>
        Password: <input type="password" name="contrasena" ><br>
        Nombre: <input type="text" name="nombre" ><br>
        Apellidos: <input type="text" name="apellidos" ><br>
        Direccion: <input type="text" name="direccion" ><br>
        Fecha de Nacimiento: <input type="date" name="fecha_nacimiento"><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>