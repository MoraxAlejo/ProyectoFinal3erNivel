<?php 
session_start();

$email = $_POST["email"];
$password = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"]; 
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$curso = $_POST['curso'];

try {
    require_once __DIR__ . '/../../conexiondb.php';
    $consulta1 = $mysqli->query("SELECT * FROM `maestros` WHERE email = '$email'");
    $resultado1 = $consulta1->fetch_assoc();
    $id_maestro = $resultado1['id_maestro'];
    // (El código de selección y verificación del correo del maestro aquí...)

if ($resultado1['email'] == $email) {
    echo "La Cuenta ya existe Por favor intente con otro correo";
    die();
} else {
    $contrahash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el nuevo maestro en la tabla "maestros"
    $mysqli->query("INSERT INTO maestros(email, contrasena, nombre, apellido, direccion, fecha_nacimiento) 
        VALUES ('$email', '$contrahash', '$nombre', '$apellidos', '$direccion', '$fecha_nacimiento');");

    // Obtener el ID del maestro recién insertado
    $id_maestro = $mysqli->insert_id;
    // Actualizar la tabla "cursos" para asignar el maestro al curso
    $query = "UPDATE cursos SET maestroID = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ii", $id_maestro, $curso);
    $stmt->execute();

    header("location: crud_maestros.php");
    exit();
}

} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
