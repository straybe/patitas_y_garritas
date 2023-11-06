<?php
// Conexión a la base de datos (configura tus propios valores)
// EJEMPLO DE CHATGPT
$conexion = new mysqli("localhost", "usuario", "contraseña", "basededatos");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $animal = $_POST["animal"];
    $adoptante = $_POST["adoptante"];
    $empleado = $_POST["empleado"];

    // Insertar registro en la base de datos
    $sql = "INSERT INTO adopcion (animal, adoptante, empleado) VALUES ('$animal', '$adoptante', '$empleado')";
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
    <title>Agregar Adopción</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Adopción</h2>
        <form method="post">
            <div class="form-group">
                <label for="animal">Animal:</label>
                <input type="text" class="form-control" id="animal" name="animal" required>
            </div>
            <div class="form-group">
                <label for="adoptante">Adoptante:</label>
                <input type="text" class="form-control" id="adoptante" name="adoptante" required>
            </div>
            <div class="form-group">
                <label for="empleado">Empleado:</label>
                <input type="text" class="form-control" id="empleado" name="empleado" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script src="https://codejquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
