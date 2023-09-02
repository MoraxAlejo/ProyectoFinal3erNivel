<?php
session_start();
require_once __DIR__ . '/../../conexiondb.php';


$email = $_POST["email"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellido"];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$consulta = $mysqli->query("SELECT *FROM maestros WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
$correo = $resultado['email'];
$consulta_maestros = $mysqli->prepare("SELECT * FROM maestros WHERE email = ?");
$consulta_maestros->bind_param("s", $correo);
$consulta_maestros->execute();
$resultado_maestros = $consulta_maestros->get_result()->fetch_assoc();

$contrahash = password_hash($password, PASSWORD_DEFAULT);

if (
    !empty($email)  ||
    !empty($nombre) || !empty($apellidos) || !empty($direccion) || !empty($fecha_nacimiento)
) {
    $query_maestros = "UPDATE `maestros` SET ";
    $params_maestros = array();

    if (!empty($email)) {
        $query_maestros .= "`email` = ?, ";
        $params_maestros[] = $email;
        $_SESSION['email'] = $email;

    }
    

    if (!empty($nombre)) {
        $query_maestros .= "`nombre` = ?, ";
        $params_maestros[] = $nombre;
        $_SESSION['name'] = $nombre;

    }
    if (!empty($apellidos)) {
        $query_maestros .= "`apellido` = ?, ";
        $params_maestros[] = $apellidos;
        $_SESSION['apellidos'] = $apellidos;

    }
    if (!empty($direccion)) {
        $query_maestros .= "`direccion` = ?, ";
        $params_maestros[] = $direccion;
        $_SESSION['direccion'] = $direccion;

    }
    if (!empty($fecha_nacimiento)) {
        $query_maestros .= "`fecha_nacimiento` = ?, ";
        $params_maestros[] = $fecha_nacimiento;
        $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;

    }
  
  
  

    $query_maestros = rtrim($query_maestros, ", ");
    $query_maestros .= " WHERE `maestros`.`email` = ?";
    $params_maestros[] = $correo;


    $stmt_maestros = $mysqli->prepare($query_maestros);
    $types_maestros = str_repeat("s", count($params_maestros));
    $stmt_maestros->bind_param($types_maestros, ...$params_maestros);


   
    if ($stmt_maestros->execute()) {
       
        header("Location: crud_maestros.php");
    } else {
        echo "Error en la actualización: " . $stmt_maestros->error . " - " . $stmt_maestros->error;
    }

    $stmt_maestros->close();
}
