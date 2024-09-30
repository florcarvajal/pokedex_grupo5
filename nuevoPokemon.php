<?php
$current_page = "nuevoPokemon.php";
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos/estilo-index.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-l6-6 col-md-10 mt-4">
            <div class="form-container mt-5">
                <h2 class="text-center mt-2 mb-5 form-titulo">Registrar un pokémon nuevo</h2>
                <form action='index.php' method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="accion" value="crear">
                    <div class="row mb-2">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre del pokemón" required>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre del Pokemón
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción del pokemón" required>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre del Pokemón
                            </div>
                        </div>
                    </div>




                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="file" name="imagen" id="formFile" required>
                        <div class="invalid-feedback">
                            Por favor, suba una imagen del Pokemón.
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
                        <div class="col-12 col-sm-8 col-md-6 d-flex justify-content-center">
                            <button type="button" class="btn btn-warning botonform me-3" onclick="regresar()" id="cancelar-boton-login">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-success botonform" id="registrar-boton-login">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
