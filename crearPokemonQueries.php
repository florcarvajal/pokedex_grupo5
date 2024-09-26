<?php

global $conn;
include 'conexion.php';


function extractGetParameterOrDefault($param, $defaultValue = "")
{
    return isset($_POST[$param]) && $_POST[$param] != $defaultValue ? $_POST[$param] : $defaultValue;
}


function imagenCrear($nombre)
{
    $carpetaImagenes = 'imagenes/';
    $rutaImagen = '';
    $imagenOk = false;

    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0 && $_FILES["imagen"]["size"] > 0) {
        $rutaImagen = $nombre . rand(0, 1000000) . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpetaImagenes . $rutaImagen);
        $imagenOk = true;
    }

}
function imagenCrearEditar($nombre)
{
    $carpetaImagenes = 'imagenes/';
    $rutaImagen = '';
    $imagenOk = false;

    if (isset($_FILES["imagenEditar"]) && $_FILES["imagenEditar"]["error"] == 0 && $_FILES["imagenEditar"]["size"] > 0) {
        $rutaImagen = $nombre . rand(0, 1000000) . $_FILES["imagenEditar"]["name"];
        move_uploaded_file($_FILES["imagenEditar"]["tmp_name"], $carpetaImagenes . $rutaImagen);
        $imagenOk = true;
    }


    return [$rutaImagen, $imagenOk];
}

function IDPokemon($ID_Unico) {
    if(isset($ID_Unico) && $ID_Unico != "- sin id -"){

        switch ($ID_Unico) {
            case $ID_Unico >= 100: return "P" . $ID_Unico;
                break;
            case $ID_Unico >= 10: return "P" . 0 . $ID_Unico;
                break;
            case $ID_Unico >= 0: return "P" . 0 . 0 . $ID_Unico;
                break;
        }
    }
    return $ID_Unico;
}


function insertarPokemon($conn, $ID_Unico, $nombre, $rutaImagen, $tipo, $descripcion) {
    if($nombre != "- sin nombre -" && $descripcion != "- sin descripcion -" && $tipo != "- sin tipo -"){

        $crearPokemonSQL = "INSERT INTO pokemones (id_unico, nombre, imagen, tipo_id, descripcion) VALUES ('$ID_Unico', '$nombre', '$rutaImagen', '$tipo', '$descripcion')";

        if ($conn->query($crearPokemonSQL) === TRUE) {
            return "Nuevo Pokémon insertado correctamente";
        } else {
            return "Error: " . $crearPokemonSQL . "<br>" . $conn->error;
        }
    }

}

function editarPokemon($conn, $ID, $ID_Unico, $nombre, $rutaImagen, $tipo, $descripcion) {
    if($nombre != "- sin nombre -" && $descripcion != "- sin descripcion -" && $tipo != "- sin tipo -"){

        $editarPokemonSQL = "UPDATE pokemones SET id_unico = '$ID_Unico', nombre = '$nombre', imagen = '$rutaImagen', 
                     tipo_id = '$tipo', descripcion = '$descripcion' WHERE id = $ID";

        if ($conn->query($editarPokemonSQL) === TRUE) {
            return "Pokemon editado correctamente";
        } else {
            return "Error: " . $editarPokemonSQL . "<br>" . $conn->error;
        }
    }

}




