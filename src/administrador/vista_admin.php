<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
</head>
<body>
    <h1>Admin tu nombre es: "<?php echo $_SESSION['name'] ?>"</h1>
</body>
</html>