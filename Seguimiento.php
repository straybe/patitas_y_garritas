<?php
// Conexión a la base de datos (configura tus propios valores)
// Chatgpt
$conexion = new mysqli("localhost", "usuario", "contraseña", "basededatos");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $detalles = $_POST["detalles"];
    $adopcion = $_POST["adopcion"];

    // Insertar registro en la base de datos
    $sql = "INSERT INTO seguimiento (fecha, detalles, adopcion) VALUES ('$fecha', '$detalles', '$adopcion')";
    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php"); // Redireccionar a la página principal
    } else {
        echo "Error al agregar registro: " . $conexion->error;
    }
}

$conexion->close();
?>

<!-- Formulario de creación de registro -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Seguimiento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Seguimiento</h2>
        <form method="post">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="detalles">Detalles:</label>
                <textarea class="form-control" id="detalles" name="detalles" required></textarea>
            </div>
            <div class="form-group">
                <label for="adopcion">Adopcion:</label>
                <input type="text" class="form-control" id="adopcion" name="adopcion" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
