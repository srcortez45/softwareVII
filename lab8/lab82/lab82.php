<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.2: Manejo de Arreglos P1 - Orientado a objetos</title>
</head>

<body>
    <h1>Laboratorio 8.2: Manejo de Arreglos P1 - Orientado a objetos</h1>

    <?php
    require_once 'class_lib.php';

    $manejoArreglo = new ManejoArreglo();
    $arreglo = $manejoArreglo->obtenerArreglo();
    $elementoMayorInfo = $manejoArreglo->encontrarElementoMayor();

    echo "Arreglo llenado con valores únicos: <pre>";
    print_r($arreglo);
    echo "</pre>";

    echo "El elemento mayor es {$elementoMayorInfo['elemento']} y se encuentra en la posición {$elementoMayorInfo['posicion']} del arreglo.";
    ?>
</body>

</html>
