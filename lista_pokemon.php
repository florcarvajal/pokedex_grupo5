<?php
function listaPokemon($result) {
    while ($row = $result->fetch_assoc()) {
        global $usuario_logueado;
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
        if ($usuario_logueado) {
            echo '  <a href="editarPokemon.php?id=' . $row["id"] . '"><img src="imagenes/editar.png" alt="Agregar" class="search-icon"></a>';
        }
        echo '</div>';
        echo '</div>'; // .pokemon-card
    }
}
?>
