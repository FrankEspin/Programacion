<?php
session_start(); // Iniciar la sesión
session_unset(); 
session_destroy(); // Destruir la sesión

// Redirigir al usuario a la página de inicio
header('Location: index.php');
exit;
?>
