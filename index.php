<?php

global $conn;
include 'conexion.php';
include 'crearPokemonQueries.php';

$search = isset($_POST['search']) ? trim($_POST['search']) : '';

$sql = "SELECT p.id, p.nombre, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen
        FROM pokemones p
        JOIN tipo t ON p.tipo_id = t.id";

if (!empty($search)) {
    $sql .= " WHERE p.nombre LIKE '%" . $conn->real_escape_string($search) . "%'";
}

$result = $conn->query($sql);
$nombre = extractGetParameterOrDefault("nombre", "- sin nombre -");
$descripcion = extractGetParameterOrDefault("descripcion", "- sin descripcion-");
$tipo = extractGetParameterOrDefault("tipo", "- sin tipo -");
$ID_Unico = extractGetParameterOrDefault("ID", "- sin id -");
$carpetaImagenes = 'imagenes/';
$imagenes = glob($carpetaImagenes . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
$imagenOk = false;

$idEditar = extractGetParameterOrDefault("idEditar", "- sin nombre -");
$nombreEditar = extractGetParameterOrDefault("nombreEditar", "- sin nombre -");
$descripcionEditar = extractGetParameterOrDefault("descripcionEditar", "- sin descripcion-");
$tipoEditar = extractGetParameterOrDefault("tipoEditar", "- sin tipo -");
$ID_UnicoEditar = extractGetParameterOrDefault("IDEditar", "- sin id -");
$imagenOkEditar = false;


list($rutaImagen, $imagenOk) = imagenCrear($nombre);
list($rutaImagenEditar, $imagenOkEditar) = imagenCrearEditar($nombreEditar);
$ID_Unico = IDPokemon($ID_Unico);
$ID_UnicoEditar = IDPokemon($ID_Unico);

$mensajeInsertar = insertarPokemon($conn, $ID_Unico, $nombre, $rutaImagen, $tipo, $descripcion);
$mensajeEditar = editarPokemon($conn, $idEditar, $ID_UnicoEditar, $nombreEditar, $rutaImagenEditar, $tipoEditar, $descripcionEditar);

echo $mensajeInsertar;
echo $mensajeEditar;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>

    <link rel="stylesheet" type="text/css" href="estilos/estilo-index.css">

</head>
<body>
<?php include 'header.php'; ?>

<div class="container">


    <!-- Barra de busqueda -->
    <form method="POST" action="" class="busqueda">

        <input type="text" placeholder="¿Quién es este pokémon?" name="search" />
        <button type="submit">
            <img src="imagenes/buscar.png" alt="Buscar" class="search-icon">
        </button>

        <?php
        if ($usuario_logueado) {
            echo '  <a href="nuevoPokemon.php"><img src="imagenes/agregar.png" alt="Agregar" class="search-icon"></a>';
        }
        ?>

    </form>


    <div class="pokemon-list">

        <?php
        include 'lista_pokemon.php';

        if ($result->num_rows > 0) {
            listaPokemon($result);
        } else {
            if (!empty($search)) {
                echo '<div class="pokemon-card"><div></div><div>Pokémon no encontrado</div><div></div></div>';
            }

            $sql_todos = "SELECT p.id, p.nombre, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen
                  FROM pokemones p
                  JOIN tipo t ON p.tipo_id = t.id";
            $result_todos = $conn->query($sql_todos);

            if ($result_todos->num_rows > 0) {
                listaPokemon($result_todos); // Mostrar todos los Pokémon
            } else {
                echo '<p class="text-center">No se encontraron pokémon.</p>';
            }
        }
        ?>

    </div>
</div>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
