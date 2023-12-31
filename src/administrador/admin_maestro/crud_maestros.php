<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: /src/index.php');
    exit();
} else {
require_once __DIR__ . '/../../conexiondb.php';
$consulta = $mysqli->query("SELECT maestros.*, cursos.nombre_curso 
                            FROM maestros 
                            LEFT JOIN cursos ON maestros.id_maestro = cursos.maestroID");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/styles.css">
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
                <a href="/src/administrador/permisos/crud_permisos.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">manage_accounts</span>
                    <h2 class="text-[#9c9fa1] font-medium">Permisos</h2>
                </a>
                <a href="/src/administrador/admin_maestro/crud_maestros.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">person_pin</span>
                    <h2 class="text-[#9c9fa1] font-medium">Maestros</h2>
                </a>
                <a href="/src/administrador/admin_estudiantes/crud_alumnos.php" class="flex gap-3">
                    <span class="material-symbols-outlined text-[#9c9fa1]">school</span>
                    <h2 class="text-[#9c9fa1] font-medium">Alumnos</h2>
                </a>
                <a href="/src/administrador/clases/clases_vista.php" class="flex gap-3">
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
                        <form action="/actions/cerrar_sesion.php">
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
                    <h1 class=" text-2xl font-medium text-gray-700">Lista de Maestros</h1>
                    <div class="flex gap-1">
                        <a href="../vAdmin.php">
                            <p class="text-blue-500">Home</p>
                        </a>/ <p>Maestro</p>
                    </div>
                </div>
                <div class="bg-white shadow-sm shadow-gray-400 w-[100%] rounded-sm  flex flex-col justify-center gap-1">
                    <div class="flex items-center justify-between p-3 pl-6">
                        <h2>Informacion de Maestros</h2>
                        <a href="create_maestro_vista.php"><button type="submit" class="w-[170px] bg-blue-500 text-white px-4 py-[6px] rounded-md right-5  hover:bg-blue-600 hover:shadow-custom hover:shadow-zinc-800">Agregar Maestro</button></a>
                    </div>
                    <hr>
                    <div class="w-[100%] flex justify-end gap-1 p-2 pt-4 px-3">
                        <p>Search:</p>
                        <input type="text" class="border-2 rounded-md">
                    </div>
                    <div class="flex flex-col gap-4 px-6 py-2">
                        <table class="w-full">
                            <thead class="text-black font-medium text-sm">
                                <tr class="bg-white">
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between">
                                            #
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Nombre
                                            <span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Correo<span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Direccion<span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Fecha de Nacimiento<span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Clase Asignada<span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-2 py-2 border-2 border-gray-300">
                                        <div class="flex justify-between items-center">
                                            Acciones<span class="material-symbols-outlined text-gray-400 text-base">swap_vert</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                </tr>
                                <?php
                                while ($row = $consulta->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['id_maestro'] . "</td>";
                                    echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['nombre'] . $row['apellido'] . "</td>";
                                    echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['email'] .   "</td>";
                                    echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['direccion'] . "</td>";
                                    echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['fecha_nacimiento'] . "</td>";
                                    echo "<td class='px-2 py-2 border-[1px] border-gray-200'>" . $row['nombre_curso'] . "</td>";
                                    echo "<td class='px-2 py-2 border-[1px] border-gray-200 flex justify-center'>
                                                <a href='./edit_maestro.php?id_maestro=" . $row['id_maestro'] . "'><span class='material-symbols-outlined text-blue-400'>edit_square</span></a>
                                                <a href='./delete.php?id_maestro=" . $row['id_maestro'] . "'><span class='material-symbols-outlined text-red-400'>delete</span></a>
                                            </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-[100%] flex items-center justify-between gap-1 p-2 pt-4 px-6 pb-6">
                        <p>Showing 1 to 10 of 11 entries</p>
                        <div class="flex">
                            <button class="hover:bg-slate-200 px-3 py-2 border-[1px] border-gray-500 rounded-l-lg">Previous</button>
                            <button class="hover:bg-blue-500 hover:text-white text-blue-600 px-3 py-2 border-y-[1px] border-gray-500">1</button>
                            <button class="hover:bg-blue-500 hover:text-white text-blue-600 px-3 py-2 border-y-[1px] border-l-[1px] border-gray-500">2</button>
                            <button class="hover:bg-slate-200 text-blue-600 px-3 py-2 border-[1px] border-gray-500 rounded-r-lg">Next</button>
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
    </main>
</body>

</html>

<?php } ?>