<?php
$current_page = "index.php";

include_once "header.php";

global $conn;
include 'conexion.php';


function extractGetParameterOrDefault($param, $defaultValue = "")
{
    return isset($_POST[$param]) && $_POST[$param] != $defaultValue ? $_POST[$param] : $defaultValue;
}


$nombre = extractGetParameterOrDefault("nombre", "- sin nombre -");
$descripcion = extractGetParameterOrDefault("descripcion", "- sin descripcion-");
$tipo = extractGetParameterOrDefault("tipo", "- sin tipo -");
$ID_Unico = extractGetParameterOrDefault("ID", "- sin id -");

$carpetaImagenes = 'imagenes/';
$imagenes = glob($carpetaImagenes . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

$imagenOk = false;
$mensajeError= '';

$rutaImagen = '';

if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0 && $_FILES["imagen"]["size"] > 0 ) {

    $rutaImagen =  $nombre . rand(0,1000000) . $_FILES["imagen"]["name"];

    move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpetaImagenes . $rutaImagen);
    $imagenOk = true;
}

if(isset($ID_Unico) && $ID_Unico != "- sin id -"){

    switch ($ID_Unico) {
        case $ID_Unico >= 100: $ID_Unico = "P" . $ID_Unico;
        break;
        case $ID_Unico >= 10: $ID_Unico = "P" . 0 . $ID_Unico;
        break;
        case $ID_Unico >= 0: $ID_Unico = "P" . 0 . 0 . $ID_Unico;
        break;
    }
}

if($nombre != "- sin nombre -" && $descripcion != "- sin descripcion -" && $tipo != "- sin tipo -"){

    $crearPokemonSQL = "INSERT INTO pokemones (id_unico, nombre, imagen, tipo_id, descripcion) VALUES ('$ID_Unico', '$nombre', '$rutaImagen', '$tipo', '$descripcion')";

    if ($conn->query($crearPokemonSQL) === TRUE) {
        echo "Nuevo Pokémon insertado correctamente";
    } else {
        echo "Error: " . $crearPokemonSQL . "<br>" . $conn->error;
    }
}

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
   

    <style>
        .pokemon-card {
            margin: 20px;
        }
        .pokemon-image {
            width: 150px;
            height: 150px;
            object-fit: cover; /* Asegura que las imágenes se vean bien */
        }
        .tipo-image {
            width: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4 mb-4">Pokédex</h1>
    <div class="row">
        <?php
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar cada Pokémon en una tarjeta
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';  // Ajuste para ser más responsivo
                echo '<div class="card pokemon-card h-100">';  // h-100 asegura que las tarjetas tengan altura consistente
                echo '<img src="imagenes/' . $row["imagen"] . '" class="card-img-top pokemon-image img-fluid" alt="' . $row["nombre"] . '">';  // img-fluid para hacer la imagen responsiva
                echo '<div class="card-body">';
                echo '<h5 class="card-title text-center">' . $row["nombre"] . ' (' . $row["id_unico"] . ')</h5>';
                echo '<p class="card-text text-center">' . $row["descripcion"] . '</p>';
                echo '<p class="text-center"><img src="imagenes/' . $row["tipo_imagen"] . '" class="tipo-image" alt="' . $row["tipo"] . '"> Tipo: ' . $row["tipo"] . '</p>';
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
