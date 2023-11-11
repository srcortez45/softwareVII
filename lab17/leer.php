<?php


//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// incluir archivos de conexion y objetos
include_once 'DatabaseManager.php';
include_once 'Producto.php';
// inicializar base de datos y objeto producto

$dbManager = new DatabaseManager();
$productos = $dbManager->obtenerProductosPaginados();

function formatearProductos($productosConCategorias)
{
    $resultadoFormateado = array();

    foreach ($productosConCategorias as $producto) {

        $producto_formateado = array(
            "id" => $producto->getId(),
            "nombre" => $producto->getNombre(),
            "descripcion" => html_entity_decode($producto->getDescripcion()),
            "precio" => $producto->getPrecio(),
            "categoria_id" => $producto->getCategoriaId(),
            "categoria_desc" => $producto->getCategoriaDesc(),
            "creado" => $producto->getCreado()
        );

        $resultadoFormateado[] = $producto_formateado;
    }

    return array("records" => $resultadoFormateado);
}

if (!empty($productos)) {
    $productosFormateado = formatearProductos($productos);
    // asignar codigo de respuesta - 200 OK
    http_response_code(200);
    // mostrar productos en formato json
    echo json_encode($productosFormateado);
} else {

    // asignar codigo de respuesta - 404 No encontrado
    http_response_code(404);
    // informarle al usuario que no se encontraron productos
    echo json_encode(
        array("message" => "No se encontraron productos.")
    );
}
