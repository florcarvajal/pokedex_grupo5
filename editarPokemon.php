<?php


global $conn;
include 'conexion.php';


$id = $_GET['id'];

    $sql = "SELECT * FROM pokemones WHERE id = ?";
    $stmt = $conn ->prepare($sql);
    $stmt->bind_Param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result -> num_rows > 0){
        $datos = $result->fetch_assoc();
    }



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <h2 class="text-center mt-2 mb-5 form-titulo">Registrar un pokemón nuevo</h2>
                <form action='index.php' method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="idEditar" value="<?php echo $id; ?>">
                    <div class="row mb-2">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" name="nombreEditar" placeholder="Nombre del pokemón" value="<?php echo isset($datos['nombre']) ? $datos['nombre'] : ''; ?>"required>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre del Pokemón
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" name="descripcionEditar" placeholder="Descripción del pokemón" value="<?php echo isset($datos['descripcion']) ? $datos['descripcion'] : ''; ?>"required>
                            <div class="invalid-feedback">
                                Por favor, ingrese la descripción del Pokemón
                            </div>
                        </div>
                    </div>



                    <div class="row mb-4 mt-0">
                        <div class="col-md-12">
                            <input class="form-control" type="file" name="imagenEditar" id="formFile" value="<?php echo isset($datos['imagen']) ? $datos['imagen'] : ''; ?>" required>
                            <div class="invalid-feedback">
                                Por favor, suba una imagen del Pokemón.
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <select class="form-control" name="tipoEditar" value="<?php echo isset($datos['tipo_id']) ? $datos['tipo_id'] : ''; ?>"required>
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
                            <input type="number" class="form-control" name="IDEditar" placeholder="Número del Pokemón" value="<?php echo isset($datos['id_unico']) ?  substr($datos['id_unico'], 1) : ''; ?>" required>
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
