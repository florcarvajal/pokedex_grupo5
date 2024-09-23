
<?php

$current_page = "nuevoPokemon.php";
include_once "header.php"
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <style>
        body {
            background-image: url('imagenes/fondoRegistroPokemon.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }


        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            max-width: 90%;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 20px;
        }

    </style>
</head>


<body  >



<div class="container">
    <div class="row justify-content-center">
        <div class="col-l6-6 col-md-10 mt-4">
            <div class="form-container mt-5">
                <h2 class="text-center mt-2 mb-5 form-titulo">Registrar un pokemón nuevo</h2>
                <form action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del pokemón" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese el nombre del Pokemón
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="custom-file form-group m-20">

                                    <input class="form-control" type="file" name="imagen" id="formFile" required>

                                </div>
                            </div>

                            </div>


                        <div class="row mb-2">
                            <div class="col-md-12 mb-4">
                                <input type="text" class="form-control" name="descripcion" placeholder="Descripción del pokemón" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese una descripción
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <select class="form-control" name="tipo" required>
                                    <option value="3">Fuego</option>
                                    <option value="1">Electrico</option>
                                    <option value="2">Agua</option>
                                    <option value="4">Planta</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, seleccione el tipo del Pokemón.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="number" class="form-control" name="ID" placeholder="Número del Pokemón" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese el número del Pokemón.
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <button type="submit" class="btn btn-success botonform w-25" id="registrar-boton-login">
                                Registrar
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
