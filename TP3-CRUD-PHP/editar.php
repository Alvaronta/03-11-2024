<?php
$conexion = new mysqli("localhost", "root", "", "tp3_laboratorio");

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$resultado = $conexion->query("SELECT * FROM registros WHERE id = $id");
$registro = $resultado->fetch_assoc();

if (!$registro) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $imagen_url = $_POST['imagen_url'];

    $conexion->query("UPDATE registros SET nombre = '$nombre', imagen = '$imagen_url' WHERE id = $id");

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Editar Registro</h1>

        <form action="" method="POST" class="formulario-nuevo">
            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $registro['nombre']; ?>" required>

            <label for="imagen_url">URL de la Imagen:</label>
            <input type="url" name="imagen_url" value="<?php echo $registro['imagen']; ?>" required
                onchange="previewImage(this, 'preview-image')">

            <div class="preview-container">
                <img id="preview-image" src="<?php echo $registro['imagen']; ?>" alt="Vista previa">
            </div>

            <div class="botones-container">
                <button type="submit">Aceptar</button>
                <a href="index.php" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="js/editar.js"></script>
</body>

</html>

<?php $conexion->close(); ?>