<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../index.php');
    exit();
} else {
require_once "../conexiondb.php";
$email = $_SESSION['email'];
$consulta = $mysqli->query("SELECT *FROM estudiantes WHERE email = '$email'");
$resultado = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="/dist/output.css" rel="stylesheet">
    <script src="/js/modal.js" defer></script>
    <title>Alumno</title>
</head>

<body>
    <main class="flex">
        <section class="h-[100vh] bg-[#34393f] w-[20%] fixed">
            <img src="/imgs/logo2.jpg" alt="logo" class="w-[100%] ">
            <hr class=" border-[#51575e]">
            <div class="p-[20px] flex flex-col gap-2">
                <h2 class="text-[#9c9fa1] font-medium">Alumno</h2>
                <div class="text-[#9c9fa1] font-medium flex">
                    <div class="flex gap-1">
                        <p><?php echo $resultado['nombre'] ?></p>
                        <p><?php echo $resultado['apellido'] ?></p>
                    </div>
                </div>
            </div>
            <hr class="w-[230px] ml-[14px] border-[#4d5359]">
            <div class="p-[20px] pt-6 flex flex-col gap-4">
                <h1 class="text-[#9c9fa1] w-[100%] flex justify-center font-semibold">MENU ALUMNOS</h1>
                <a href="#" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">task</span>
                    <h2 class="text-[#9c9fa1] font-medium">Ver Calificaciones</h2>
                </a>
                <a href="cursos.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">tv_gen</span>
                    <h2 class="text-[#9c9fa1] font-medium">Administra tus Clases</h2>
                </a>
            </div>
        </section>
        <section class="w-[80%] h-[100vh] bg-[#f5f6fa] ml-[272px]">
            <nav class="bg-white w-[80%] h-[10%] flex justify-between items-center gap-3 px-3 shadow-sm shadow-gray-400 fixed">
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-[#b6beb3] text-lg">menu</span>
                    <h1 class="text-[#b6beb3] font-medium">Perfil</h1>
                </div>
                <div class="flex gap-2">
                    <div class="flex gap-1">
                        <p><?php echo $resultado['nombre'] ?></p>
                        <p><?php echo $resultado['apellido'] ?></p>
                    </div>
                    <span id="flecha" class="material-symbols-outlined cursor-pointer">chevron_right</span>
                    <div id="modal" class=" absolute top-[68px] right-[20px] bg-white shadow-sm shadow-gray-400 rounded-md hidden">
                        <a href="vista_estudiante.php">
                            <div class="flex gap-3 pl-4 py-3 pr-[4rem]">
                                <span class="material-symbols-outlined">home</span>
                                <p>Home</p>
                            </div>
                        </a>
                        <hr>
                        <form action="/actions/cerrar_sesion.php">
                            <div class="flex gap-3 px-4 py-3 text-red-500">
                                <span class="material-symbols-outlined cursor-none">door_open</span>
                                <button type="submit">
                                    <p>Logout</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </nav>
            <div class="p-5 h-[80%] flex flex-col gap-6 mt-[70px] ">
                <div class="flex justify-between">
                    <h1 class=" text-2xl font-medium text-gray-700">Editar datos del perfil</h1>
                    <div class="flex gap-1">
                        <a href="vista_estudiante.php">
                            <p class="text-blue-500">Home</p>
                        </a>/ <p>Perfil</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm  flex flex-col justify-center gap-1">
                    <div class="flex items-center p-3 pl-6">
                        <h2>Informacion de Usuario</h2>
                    </div>
                    <hr>
                    <form class="flex flex-col gap-4 p-3 pl-6" action="editar_perfil_estudiante.php" method="post">
                        <div>
                            <strong>
                                <p>Matricula</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md bg-slate-200 hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md bg-slate-200 hover:bg-slate-200 focus:outline-0" type="text" name="matricula" value="<?php echo $resultado['matricula'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Correo Electronico</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="email" name="email" value="<?php echo $resultado['email'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Contraseña Ingresa para cambiar la contraseña</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="password" name="contrasena" placeholder="Para modificar ingresa una nueva contraseña">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Nombre(s)</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="nombre" value="<?php echo $resultado['nombre'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Apellidos</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="apellidos" value="<?php echo $resultado['apellido'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Direccion</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px] w-[100%] rounded-l-md hover:bg-slate-200 focus:outline-0" type="text" name="direccion" value="<?php echo $resultado['direccion'] ?>">
                            </div>
                        </div>
                        <div>
                            <strong>
                                <p>Fecha de nacimiento</p>
                            </strong>
                            <div class="flex items-center border-gray-300 border-2 pr-3 rounded-md  hover:bg-slate-200  hover:shadow-custom hover:shadow-zinc-800">
                                <input class="px-3 py-[6px]  rounded-l-md hover:bg-slate-200 focus:outline-0" type="date" name="fecha_nacimiento" value="<?php echo $resultado['fecha_nacimiento'] ?>">
                            </div>
                        </div>

                        <button type="submit" class="w-[170px] bg-blue-500 text-white px-4 py-[6px] rounded-md right-5  hover:bg-blue-600 hover:shadow-custom hover:shadow-zinc-800">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>

<?php } ?>