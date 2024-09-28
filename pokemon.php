<?php

global $conn;
include 'conexion.php';

$id_unico = isset($_GET['id_unico']) ? $_GET['id_unico'] : null;

if ($id_unico) {

    $sql = "SELECT p.id, p.nombre, p.id_unico, p.imagen, p.descripcion, t.tipo, t.imagen AS tipo_imagen
            FROM pokemones p
            JOIN tipo t ON p.tipo_id = t.id
            WHERE p.id_unico = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_unico);  // "i" para indicar que es un número entero
    $stmt->execute();
    $resultado = $stmt->get_result();


    if ($resultado->num_rows > 0) {
        $pokemon = $resultado->fetch_assoc();
    } else {
        echo "Pokémon no encontrado.";
        exit();
    }
} else {
    echo "ID del Pokémon no proporcionado.";
    exit();
}
// Define la clase de color en función del tipo de Pokémon
$colorClase = '';
switch ($pokemon["tipo"]) {
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

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - <?= htmlspecialchars($pokemon['nombre']); ?></title>
    <link rel="stylesheet" type="text/css" href="estilos/estilo-pokemon.css">

</head>
<?php include 'header.php'; ?>

<body>

<div class="container">

    <div class="pokemon-container">
        <!-- Imagen del Pokémon -->
        <img src="imagenes/<?= htmlspecialchars($pokemon['imagen']); ?>" alt="<?= htmlspecialchars($pokemon['nombre']); ?>" class="pokemon-image img-fluid">


        <div class="pokemon-card">
        <!-- Detalles del Pokémon -->
            <div class="pokemon-details">
                <div class="pokemon-name <?= $colorClase; ?>"><?= htmlspecialchars($pokemon['nombre']); ?> <span class="pokemon-id">(<?= htmlspecialchars($pokemon['id_unico']); ?>)</span></div>
            </div>
            <!-- Tipo del Pokémon -->
            <div class="tipo">
                <img src="imagenes/<?= htmlspecialchars($pokemon['tipo_imagen']); ?>" alt="<?= htmlspecialchars($pokemon['tipo']); ?>" width="50">
                <p><strong>Tipo:</strong> <?= htmlspecialchars($pokemon['tipo']); ?></p>
            </div>

            <!-- Descripción del Pokémon -->
            <div class="pokemon-description">
                <p><strong>Descripción:</strong> <?= htmlspecialchars($pokemon['descripcion']); ?></p>
            </div>
            <div class="contenedor_btn">
            <button class="btn btn-warning botonform me-6" onclick="regresar()" id="cancelar-boton-login">
                                Volver
            </button>
            </div>
        </div>

    </div>
    
</div>

</body>
</html>

<?php
$conn->close();
?>