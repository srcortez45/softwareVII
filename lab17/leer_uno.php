<?php
include_once 'DatabaseManager.php';
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');


// set ID property of record to read
$id = isset($_GET['id']) ? $_GET['id'] : die();

$dbManager = new DatabaseManager();

$producto = $dbManager->obtenerProductoPorId($id);

if ($producto->getNombre() != null) {
    // creacion del arreglo
    $producto_arr = array(
        "id" => $producto->getId(),
        "nombre" => $producto->getNombre(),
        "descripcion" => html_entity_decode($producto->getDescripcion()),
        "precio" => $producto->getPrecio(),
        "categoria_id" => $producto->getCategoriaId(),
        "categoria_desc" => $producto->getCategoriaDesc(),
        "creado" => $producto->getCreado()
    );
    // asignar codigo de respuesta - 200 OK
    http_response_code(200);
    // mostrarlo en formato json
    echo json_encode($producto_arr);
} else {
    // asignar codigo de respuesta - 400 solicitud incorrecta
    http_response_code(404);
    // informar al usuario
    echo json_encode(array("message" => "El producto no existe."));
}
