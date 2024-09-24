<?php

session_start();
$usuario_logueado=$_SESSION['usuario_nombre'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header">
    <div class="logo-container">
        <a href="index.php"> <img src="imagenes/logo_pokedex.png" alt="Logo" class="logo"></a>
    </div>
    <div class="usuario">
        <?php
        if ($usuario_logueado) {
            echo '<span class="user">' . $usuario_logueado . '</span>';
            echo '<a href="desloguear.php" class="cerrar_sesion">x</a>';
        } else {
            ?>
            <form action="loguear.php" class="formulario_login" method="post">
                <input type="text" name="usuario" placeholder="usuario" required>
                <input type="password" name="contrasena" placeholder="contraseña" required>
                <button type="submit">Ingresar</button>
            </form>
            <?php
        }
        ?>
    </div>
</header>

</body>
</html>
