<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.3: Manejo de Arreglos P1</title>
</head>
<body>
    <h1>Laboratorio 4.3: Manejo de Arreglos P1</h1>
    <?php
    // Crear un arreglo unidimensional de 20 elementos
    $arreglo = array();

    // Llenar el arreglo con valores diferentes
    for ($i = 0; $i < 20; $i++) {
        $valor = rand(1, 100); // Generar un valor aleatorio entre 1 y 100

        // Verificar si el valor ya existe en el arreglo
        while (in_array($valor, $arreglo)) {
            $valor = rand(1, 100); // Generar otro valor si ya existe
        }

        $arreglo[] = $valor; // Agregar el valor único al arreglo
    }

    // Encontrar el elemento mayor y su posición
    $elementoMayor = max($arreglo);
    $posicionElementoMayor = array_search($elementoMayor, $arreglo);

    // Mostrar el arreglo completo
    echo "Arreglo llenado con valores únicos: <pre>";
    print_r($arreglo);
    echo "</pre>";

    // Mostrar el elemento mayor y su posición
    echo "El elemento mayor es $elementoMayor y se encuentra en la posición $posicionElementoMayor del arreglo.";
    ?>
</body>
</html>
