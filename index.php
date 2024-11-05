<?php
$conexion = new mysqli("localhost", "root", "", "tp3_laboratorio");

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $conexion->query("DELETE FROM registros WHERE id = $id");
}

$resultado = $conexion->query("SELECT * FROM registros");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP y MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Lista de registros de motos</h1>
    <div class="container">
        <a href="agregar.php" class="btn-agregar">Agregar nueva moto</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imágen</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td class="imagen-celda"><img src="<?php echo $fila['imagen']; ?>" alt="Imagen"></td>
                        <td>
                            <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn-accion btn-editar">Editar</a>
                            <a href="?eliminar=<?php echo $fila['id']; ?>"
                                onclick="return confirm('¿Estás seguro de eliminar este registro?')"
                                class="btn-accion btn-eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php $conexion->close(); ?>