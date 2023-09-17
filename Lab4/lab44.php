<?php
session_start();

// Inicializa el arreglo si no existe en la sesión
if (!isset($_SESSION['arregloPares'])) {
    $_SESSION['arregloPares'] = array();
}

// Recorriendo el contenido del arreglo o limpiando la sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<h2>Valores recibidos por POST:</h2>";
    echo "<ul>";
    foreach ($_POST as $nombre => $valor) {
        echo "<li><strong>nombre: $nombre:</strong>valor: $valor</li>";
    }
    echo "</ul>";
    if (isset($_POST["numero"]) && is_numeric($_POST["numero"])) {

        if (intval($_POST["numero"] % 2 == 0)) { // Verificar si el número es par
            $_SESSION['arregloPares'][] = intval($_POST["numero"]); // Agregar el número al arreglo de pares en la sesión
        } else {
?>
            <script>
                alert("Valor impar, vuelta a intentar");
            </script>
<?php
        }
    } elseif (isset($_POST["limpiar"])) {
        $_SESSION['arregloPares'] = array(); // Asignar un arreglo vacío
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión por completo
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.4 - Manejo de Arreglos P2</title>
</head>

<body>
    <h1>Arreglo de números pares</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Numero: <input type="number" name="numero"><br />
        <input type="submit" name="enviar">
        <input type="submit" value="Limpiar Sesión" name="limpiar">
    </form>

    <?php
    echo "<h1>Contenido del arreglo</h1>";
    if (empty($_SESSION['arregloPares'])) {
        echo "El arreglo está vacío";
    } else {
        echo "<pre>";
        print_r($_SESSION['arregloPares']);
        echo "</pre>";
        echo "<h2>Números Pares:</h2>";
        echo "<ul>";
        foreach ($_SESSION['arregloPares'] as $numero) {
            echo "<li>$numero</li>";
        }
        echo "</ul>";
    }
    ?>
</body>

</html>