<?php 
session_start();
require_once __DIR__ . '/../../conexiondb.php';
$consultaEstudiantes = $mysqli->query("SELECT * FROM maestros");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/modal.js" defer></script>
    <script src="/js/menu.js" defer></script>
    <title>Admin</title>
</head>

<body>
    <main class="flex">
        <section id="menu1" class="h-[100vh] bg-[#34393f] w-[20%] fixed hidden">
            <img src="/imgs/logo2.jpg" alt="logo" class="w-[100%] ">
            <hr class=" border-[#51575e]">
            <div class="p-[20px] flex flex-col gap-2">
                <h2 class="text-[#9c9fa1] font-medium">Admin</h2>
                <div class="text-[#9c9fa1] font-medium flex">
                    <p>Administrador</p>
                </div>
            </div>
            <hr class="w-[230px] ml-[14px] border-[#4d5359]">
            <div class="p-[20px] pt-6 flex flex-col gap-4">
                <h1 class="text-[#9c9fa1] w-[100%] flex justify-center font-semibold">MENU ADMINISTRACION</h1>
                <a href="./permisos.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">manage_accounts</span>
                    <h2 class="text-[#9c9fa1] font-medium">Permisos</h2>
                </a>
                <a href="./crud_maestros.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">person_pin</span>
                    <h2 class="text-[#9c9fa1] font-medium">Maestros</h2>
                </a>
                <a href="#" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">school</span>
                    <h2 class="text-[#9c9fa1] font-medium">Alumnos</h2>
                </a>
                <a href="./crud_clases.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">tv_gen</span>
                    <h2 class="text-[#9c9fa1] font-medium">Clases</h2>
                </a>
            </div>
        </section>
        <section id="menu2" class="w-[100%] h-[100vh] bg-[#f5f6fa] ">
            <nav id="nav" class=" bg-white w-[100%] h-[9%] flex justify-between items-center gap-3 px-3 shadow-sm shadow-gray-400 fixed">
                <div class="flex gap-3">
                    <span id="menu-icon" class="material-symbols-outlined text-[#b6beb3] text-lg cursor-pointer hover:text-gray-600">menu</span>
                    <h1 class="text-[#b6beb3] font-medium">Home</h1>
                </div>
                <div class="flex gap-2">
                    <p>Administrador</p>
                    <span id="flecha" class="material-symbols-outlined cursor-pointer">chevron_right</span>
                    <div id="modal" class=" absolute top-[68px] right-[20px] bg-white shadow-sm shadow-gray-400 rounded-md hidden">
                        <form action="/src/accions/logout.php">
                            <div class="flex gap-3 px-4 pr-[2rem] py-3 text-red-500">
                                <span class="material-symbols-outlined cursor-none">door_open</span>
                                <button type="submit">
                                    <p>Logout</p>
                                </button>
                            </div>
                        </form>
                    </div>
            </nav>
            <div class="p-5 h-[80%] flex flex-col gap-6 mt-[70px] ">
                <div class="flex justify-between">
                    <h1 class=" text-2xl font-medium text-gray-700">Lista Maestros</h1>
                    <div class="flex gap-1">
                        <a href="./vAdmin.php">
                            <p class="text-blue-500">Home</p>
                        </a>/ <p>Alumno</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm  flex flex-col justify-center gap-1">
                    <div class="flex items-center p-3 pl-6">
                        <h2>Informacion de alumnos</h2>
                    </div>
                    <hr>
                    <div class="flex flex-col gap-4 p-3 pl-6">
                        <table border="1" >
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Direccion</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Clase Asignada</th>
                                <th>Acciones</th>
                            </tr>
                            <?php
                            while ($row = $consultaEstudiantes->fetch_assoc()) {
                               
                                echo "<tr>";
                                echo "<td>" . $row['id_maestro'] . "</td>";
                                echo "<td>" . $row['nombre'] . $row['apellido'] ."</td>";
                                echo "<td>" . $row['email'] .   "</td>";
                                echo "<td>" . $row['direccion'] . "</td>";
                                echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                                echo "<td>" .  "</td>";
                                echo "<td><a href='edit_maestro.php?id_maestro=" . $row['id_maestro'] . "'>Editar</a> | <a href='delete.php?id_maestro=" . $row['id_maestro'] . "'>Eliminar</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                
            </div>
        </section>
    </main>
</body>

</html>