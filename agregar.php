<?php
    $conexion = new mysqli("localhost", "root", "", "tp3_laboratorio");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['guardar'])) {
            $nombre = $_POST['nombre'];
            $imagen_url = $_POST['imagen_url'];
            $conexion->query("INSERT INTO registros (nombre, imagen) VALUES ('$nombre', '$imagen_url')");
            header("Location: index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar nueva moto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar nueva moto</h1>
        <div class="formulario-nuevo">
            <form action="" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                
                <label for="imagen_url">URL de la Imágen:</label>
                <input type="url" name="imagen_url" required onchange="previewImage(this, 'preview-new')">
                
                <div class="preview-container">
                    <img id="preview-new" src="" alt="Vista previa">
                </div>
                
                <button type="submit" name="guardar">Guardar</button>
                <a href="index.php" class="btn-volver">Volver a la lista</a>
            </form>
        </div>
    </div>

    <script src="js/agregar.js"></script>
</body>
</html>

<?php $conexion->close(); ?>