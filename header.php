<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        .header {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            justify-content: center;
            justify-items: center;
            align-items: center;
        }

        .header img {
            height: 100px;
       padding: 10px 0;
        }

        .header .user {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
<header class="header">
    <div></div>
    <img src="imagenes/logo_pokedex.png" alt="Logo" class="logo">
    <div class="user">Usuario Admin</div>
</header>
