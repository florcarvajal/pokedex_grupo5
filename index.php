<?php

global $conn;
include 'conexion.php';

$search = isset($_POST['search']) ? trim($_POST['search']) : '';

$sql = "SELECT p.nombre, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen
        FROM pokemones p
        JOIN tipo t ON p.tipo_id = t.id";

if (!empty($search)) {
    $sql .= " WHERE p.nombre LIKE '%" . $conn->real_escape_string($search) . "%'";
}

$result = $conn->query($sql);

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

            $sql_todos = "SELECT p.nombre, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen
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
