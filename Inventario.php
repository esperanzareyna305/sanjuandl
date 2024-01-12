<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Hotel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #1E90FF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #1E90FF;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<?php
$inventario = array(
    'cocina' => array(),
    'baños' => array(),
    'habitaciones' => array()
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = $_POST['categoria'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    if (!isset($inventario[$categoria][$producto])) {
        $inventario[$categoria][$producto] = 0;
    }

    $inventario[$categoria][$producto] += $cantidad;

    echo "<p>Producto '$producto' agregado al inventario de $categoria.</p>";
}
?>

<h2>Agregar Producto al Inventario</h2>
<form method="post" action="">
    <label for="categoria">Categoría:</label>
    <select name="categoria" required>
        <option value="cocina">Cocina</option>
        <option value="baños">Baños</option>
        <option value="habitaciones">Habitaciones</option>
    </select><br>

    <label for="producto">Nombre del Producto:</label>
    <input type="text" name="producto" required><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required><br>

    <button type="submit">Agregar Producto</button>
</form>

<h2>Inventario</h2>
<?php
foreach ($inventario as $categoria => $productos) {
    echo "<h3>$categoria</h3>";
    echo "<ul>";
    foreach ($productos as $producto => $cantidad) {
        echo "<li>$producto: $cantidad unidades</li>";
    }
    echo "</ul>";
}
?>

</body>
</html>
