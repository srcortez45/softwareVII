<?php
include_once 'DatabaseManager.php';
include_once 'Producto.php';

$dbManager = new DatabaseManager();
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow Headers, Authorization, X-Requested-With");

// obtener los datos
$data = json_decode(file_get_contents("php://input"));

// asegurar que los datos no esten vacios
if (
    !empty($data->nombre) &&
    !empty($data->precio) &&
    !empty($data->descripcion) &&
    !empty($data->categoria_id)
) {
    $nombre = htmlspecialchars(strip_tags($data->nombre));
    $precio = htmlspecialchars(strip_tags($data->precio));
    $descripcion = htmlspecialchars(strip_tags($data->descripcion));
    $categoria_id = htmlspecialchars(strip_tags($data->categoria_id));
    if ($dbManager->crearProducto($nombre, $precio, $descripcion, $categoria_id)) {
        // asignar codigo de respuesta - 201 creado
        http_response_code(201);
        // informar al usuario
        echo json_encode(array("message" => "El producto ha sido creado."));
    } else {
        // asignar codigo de respuesta - 503 servicio no disponible
        http_response_code(503);
        // informar al usuario
        echo json_encode(array("message" => "No se puede crear el producto."));
    }
} else {
    // asignar codigo de respuesta - 400 solicitud incorrecta
    http_response_code(400);
    // informar al usuario
    echo json_encode(array("message" => "No se puede crear el producto. Los datos están incompletos."));
}
