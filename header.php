<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>

        .header {
            background-color: #DC2626;
            border-radius: 10px;
            height: 10vh;
        }

        .logo-header {

            width: 40px;
            color: white !important;
            margin-left: 20px;
        }

        .nav-item.active {
            border-bottom: 2px solid whitesmoke;
        }

        .nav-link.active {
            border-bottom: whitesmoke;
        }

        .nav-link:hover {
            border-bottom: 2px solid whitesmoke;
        }

        .btn-header {
            background-color: #B91C1C;
            border-color: #B91C1C;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-header:hover {
            background-color: #991B1B;
            border-color: #991B1B;
        }

        a {
            color: white !important;
        }
    </style>
</head>
<body>
<header>

    <nav class="navbar navbar-expand-lg navbar-light w-75 header mx-auto mt-4">
        <a class="navbar-brand" href="#">
            <img src="imagenes/pokeball.svg" alt="Logo" class="d-inline-block align-text-middle logo-header">
            Pokédex</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3 <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item me-3 <?php echo ($current_page == 'nuevoPokemon.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="nuevoPokemon.php">Crear nuevo pokemón</a>
                </li>
                <li class="nav-item me-3">
                    <a href="login.html" class="btn btn-outline-success my-2 my-sm-0 btn-header">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </nav>>

</header>
</body>
</html>


