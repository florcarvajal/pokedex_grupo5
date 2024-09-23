<?php
// Incluir la conexión a la base de datos
global $conn;
include 'conexion.php';

// Consulta para obtener todos los Pokémon y sus tipos
$sql = "SELECT p.nombre, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen
        FROM pokemones p
        JOIN tipo t ON p.tipo_id = t.id";
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
    <div class="pokemon-list">
        <?php
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar cada Pokémon en una tarjeta
            while ($row = $result->fetch_assoc()) {
                // Obtener el color según el tipo de Pokémon
                $colorClase = '';
                switch ($row["tipo"]) {
                    case 'FUEGO':
                        $colorClase = 'color-fuego';
                        break;
                    case 'PLANTA':
                        $colorClase = 'color-planta';
                        break;
                    case 'ELECTRICO':
                        $colorClase = 'color-electrico';
                        break;
                    case 'AGUA':
                        $colorClase = 'color-agua';
                        break;
                }

                echo '<div class="pokemon-card ' . $colorClase . '">';
                echo '<div class="pokemon-image-container">';
                echo '<img src="imagenes/' . $row["imagen"] . '" class="pokemon-image" alt="' . $row["nombre"] . '">';
                echo '</div>';
                echo '<div class="pokemon-info">';
                echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                echo '</div>';
                echo '<div class="pokemon-tipo">';
                echo '<img src="imagenes/' . $row["tipo_imagen"] . '" class="tipo-image" alt="' . $row["tipo"] . '" title="' . $row["tipo"] . '">';
                echo '</div>';
                echo '</div>'; // .pokemon-card
            }
        } else {
            echo '<p class="text-center">No se encontraron Pokémon.</p>';
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
