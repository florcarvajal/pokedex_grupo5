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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css">
    <style>
        .pokemon-card {
            margin: 20px;
        }
        .pokemon-image {
            width: 150px;
            height: 150px;
        }
        .tipo-image {
            width: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4">Pokédex</h1>
    <div class="row">
        <?php
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar cada Pokémon en una tarjeta
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4">';
                echo '<div class="card pokemon-card">';
                echo '<img src="imagenes/' . $row["imagen"] . '" class="card-img-top pokemon-image" alt="' . $row["nombre"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nombre"] . ' (' . $row["id_unico"] . ')</h5>';
                echo '<p class="card-text">' . $row["descripcion"] . '</p>';
                echo '<p><img src="imagenes/' . $row["tipo_imagen"] . '" class="tipo-image" alt="' . $row["tipo"] . '"> Tipo: ' . $row["tipo"] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No se encontraron Pokémon.</p>';
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
