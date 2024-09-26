<?php

function listaPokemon($result, $usuario_logueado) {
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

        echo '<div class="pokemon-card ' . $colorClase . '">'; // Inicia la tarjeta

        // Enlace envuelve la imagen y la información
        echo '<a href="pokemon.php?id_unico=' . $row["id_unico"] . '" class="pokemon-image-container">';
        echo '<img src="imagenes/' . $row["imagen"] . '" class="pokemon-image" alt="' . $row["nombre"] . '">';
        echo '</a>';

        echo '<a href="pokemon.php?id_unico=' . $row["id_unico"] . '" class="pokemon-info">';
        echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
        echo '</a>';

        echo '<a href="pokemon.php?id_unico=' . $row["id_unico"] . '" class="pokemon-tipo">';
        echo '<img src="imagenes/' . $row["tipo_imagen"] . '" class="tipo-image" alt="' . $row["tipo"] . '" title="' . $row["tipo"] . '">';
        echo '</a>';

        // Botón de edición que redirige a la página de edición
        if ($usuario_logueado) {
            echo '<div class="editar">';
            echo '<a href="editarPokemon.php?id=' . $row['id'] . '" class="btn-editar">Editar</a>'; // Usa un enlace estilizado como botón
            echo '</div>';
        }

        echo '</div>'; // Cierra la tarjeta
    }
    }
?>
