<?php
require_once 'class_lib.php';

$manejoArreglo = new ManejoArreglo();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["numero"])) {
        $manejoArreglo->procesarNumero($_POST["numero"]);
    } elseif (isset($_POST["limpiar"])) {
        $manejoArreglo->limpiarSesion();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.1 - Manejo de Arreglos P2 - Orientado a objetos</title>
</head>

<body>
    <h1>Laboratorio 8.1 - Manejo de Arreglos P2 - Orientado a objetos</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Numero: <input type="number" name="numero"><br />
        <input type="submit" name="enviar">
        <input type="submit" value="Limpiar Sesión" name="limpiar">
    </form>

    <?php
    echo "<h1>Contenido del arreglo</h1>";
    $arregloPares = $manejoArreglo->obtenerArregloPares();
    if (empty($arregloPares)) {
        echo "El arreglo está vacío";
    } else {
        echo "<pre>";
        print_r($arregloPares);
        echo "</pre>";
        echo "<h2>Números Pares:</h2>";
        echo "<ul>";
        foreach ($arregloPares as $numero) {
            echo "<li>$numero</li>";
        }
        echo "</ul>";
    }
    ?>
</body>

</html>
