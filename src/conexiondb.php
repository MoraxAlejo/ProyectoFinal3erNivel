<?php 
try {
    $mysqli = new mysqli("localhost", "root", "", "universidad");
   
} catch(mysqli_sql_exception $e) {
    echo "Error" . $e->getMessage();
}
?>