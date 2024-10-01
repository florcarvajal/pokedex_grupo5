<?php

global $conn;
include 'conexion.php';
include 'crearPokemonQueries.php';

$search = isset($_POST['search']) ? trim($_POST['search']) : '';


$sql = "SELECT p.nombre,p.id, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen

        FROM pokemones p
        JOIN tipo t ON p.tipo_id = t.id";

if (!empty($search)) {
    $sql .= " WHERE p.nombre LIKE '%" . $conn->real_escape_string($search) . "%' 
    or t.tipo LIKE '%" . $conn->real_escape_string($search) . "%'
    or p.id_unico LIKE '%" . $conn->real_escape_string($search) . "%'";
}

$result = $conn->query($sql);
        function procesarPokemon($conn, $accion) {
            $ID_Unico = extractGetParameterOrDefault("ID", "- sin id -");
            $nombre = extractGetParameterOrDefault("nombre", "- sin nombre -");
            $descripcion = extractGetParameterOrDefault("descripcion", "- sin descripcion-");
            $tipo = extractGetParameterOrDefault("tipo", "- sin tipo -");
            $rutaImagen = imagenCrear($nombre);
            $ID_Unico = IDPokemon($ID_Unico);

            if ($accion == 'crear') {
                return insertarPokemon($conn, $ID_Unico, $nombre, $rutaImagen, $tipo, $descripcion);
            } elseif ($accion == 'editar') {
                $ID = extractGetParameterOrDefault("idEditar", "- sin id -");
                return editarPokemon($conn, $ID, $ID_Unico, $nombre, $rutaImagen, $tipo, $descripcion);
            }

            return null;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion'])) {
            $accion = $_POST['accion'];
            $mensajeAccion = procesarPokemon($conn, $accion);
            header("Location: index.php?mensaje=" . urlencode($mensajeAccion));
            exit();
        }

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

    <form method="POST" action="" class="busqueda">

        <input type="text" placeholder="¿Quién es este pokémon?" name="search" value="<?= $search?>"/>
        <button type="submit">
            <img src="imagenes/buscar.png" alt="Buscar" class="search-icon">
        </button>

    </form>



    <?php
    if ($usuario_logueado) {
        echo '<a href="nuevoPokemon.php" class="links"> <div class="agregar-pokemon">Agregar nuevo pokémon<span><img src="imagenes/agregar.png" alt="Agregar" class="search-icon"></span></div> </a>';
    }
    ?>


    <div class="pokemon-list">


        <?php
        include 'lista_pokemon.php';

        if ($result->num_rows > 0) {

            listaPokemon($result, $usuario_logueado);

        } else {
            if (!empty($search)) {
                echo '<div class="pokemon-card"><div></div><div>Pokémon no encontrado</div><div></div></div>';
            }

            $sql_todos = "SELECT p.nombre,p.id, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen
                  FROM pokemones p
                  JOIN tipo t ON p.tipo_id = t.id";
            $result_todos = $conn->query($sql_todos);

            if ($result_todos->num_rows > 0) {

                listaPokemon($result_todos,$usuario_logueado);
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
$conn->close();
?>

