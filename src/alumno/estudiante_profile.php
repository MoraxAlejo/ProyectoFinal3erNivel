<?php 
session_start();
require_once "../conexiondb.php";
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT * FROM estudiantes where email = '$email'") ;
$resultado = $consulta->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name'] ?> profile</title>
</head>
<body>
    <form action="editar_perfil_estudiante.php" method="post">
        <h1>Editar datos de Perfil</h1>
        <h2>Informacion de Usuario</h2>
        <p>Matricula</p>
        <input type="text" name="matricula" value="<?php echo $resultado['matricula'] ?>">
        <p>Correo Electronico</p>
        <input type="email" name="email" value="<?php echo $resultado['email'] ?>">
        <p>Contraseña Ingresa para cambiar la contraseña</p>
        <input type="password" name="contrasena">
        <p>Nombre(s)</p>
        <input type="text" name="nombre" value="<?php echo $resultado['nombre'] ?>">
        <p>Apellidos</p>
        <input type="text" name="apellidos" value="<?php echo $resultado['apellido'] ?>">
        <p>Direccion</p>
        <input type="text" name="direccion"  value="<?php echo $resultado['direccion'] ?>">
        <p>Fecha de nacimiento</p>
        <input type="date" name="fecha_nacimiento" value="<?php echo $resultado['fecha_nacimiento'] ?>">
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>