<?php
// Verifica si se ha enviado un valor de rango de ventas
if (isset($_GET['salesRange'])) {
    $rango = intval($_GET['salesRange']);

    // Calcula el rango de ventas correspondiente
    $descripcion = '';
    switch ($rango) {
        case 1:
            $imagen = "imagen1.png";
            $descripcion = "Ventas por debajo del 50%";
            break;
        case 2:
            $imagen = "imagen2.png";
            $descripcion = "Ventas entre 50% y 79%";
            break;
        case 3:
            $imagen = "imagen3.png";
            $descripcion = "Ventas superiores al 80%";
            break;
        default:
            $imagen = "imagen_default.png";
            $descripcion = "Descripción predeterminada";
    }

    // Define el tipo de contenido como una aplicación JSON con UTF-8
    header("Content-Type: application/json; charset=UTF-8");

    // Define un arreglo asociativo con la imagen y la descripción
    $response = array(
        'imagen' => $imagen,
        'descripcion' => $descripcion
    );

    // Convierte el arreglo asociativo a formato JSON con UTF-8
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
} else {
    // Si no se ha enviado un valor de rango, proporciona una respuesta de error
    header("HTTP/1.1 400 Bad Request");
    echo "Error: Debes proporcionar un valor de rango de ventas.";
}
?>