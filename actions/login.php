<?php
$correo = $_POST["correo"];
$password = $_POST["contrasena"];

try {
    require_once "../src/conexiondb.php";
    $tablas = array("administrador", "maestros", "estudiantes");
    $tabla_usuario = "";
    $resultado = array();
    foreach ($tablas as $tabla) {
        $consulta = $mysqli->query("SELECT * FROM `$tabla` WHERE email = '$correo'");
        if ($consulta->num_rows > 0) {
            $resultado = $consulta->fetch_assoc();
            $tabla_usuario = $tabla;
            break;
        }
    }
    if (!empty($resultado)) {
        if (password_verify($password, $resultado['contrasena'])) {
            session_start();
            $_SESSION['password'] = $resultado['contrasena'];
            $_SESSION['email'] =  $resultado['email'];
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['name'] =  $resultado['nombre'];
            if ($tabla_usuario == "administrador") {
                header("Location:../src/administrador/vista_admin.php");
            } else if ($tabla_usuario == "maestros") {
                header("Location:../src/maestros/vista_maestro.php");
            } else if ($tabla_usuario == "estudiantes") {
                header("Location:../src/alumno/vista_estudiante.php");
            }
            exit();
        } else {
            echo "Contraseña equivocada";
            die();
        }
    } else {
        echo "Correo no encontrado en ninguna tabla";
        die();
    }
} catch (mysqli_sql_exception $e) {
    echo "Error" . $e->getMessage();
}