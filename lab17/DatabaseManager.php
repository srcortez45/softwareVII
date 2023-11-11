<?php

require_once 'Database.php';
require_once 'Producto.php';

class DatabaseManager
{

    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->getConexion();
    }

    public function obtenerProductosPaginados()
    {
        $instruccion = "CALL sp_obtener_productos()";
        $stmt = $this->conexion->prepare($instruccion);
        $stmt->execute();
        $resultados = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $productos = [];
        if ($resultados) {
            foreach ($resultados as $fila) {
                $producto = new Producto(
                    $fila['producto_id'],
                    $fila['producto_nombre'],
                    $fila['producto_descripcion'],
                    $fila['producto_precio'],
                    $fila['categoria_id'],
                    $fila['categoria_desc'],
                    $fila['producto_creado']
                );
                $productos[] = $producto;
            }
        }
        return $productos;
    }

    public function crearProducto($nombre, $descripcion, $precio, $categoria_id)
    {
        $instruccion = "CALL sp_crear_producto(?,?,?,?)";
        $stmt = $this->conexion->prepare($instruccion);
        $stmt->bind_param("sssi", $nombre, $descripcion, $precio, $categoria_id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function obtenerProductoPorId($id)
    {
        $instruccion = "CALL sp_obtener_producto_por_id(?)";
        $stmt = $this->conexion->prepare($instruccion);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $registro = $stmt->get_result()->fetch_assoc();
        if ($stmt->affected_rows > 0) {
            return new Producto(
                $registro['producto_id'],
                $registro['producto_nombre'],
                $registro['producto_descripcion'],
                $registro['producto_precio'],
                $registro['categoria_id'],
                $registro['categoria_desc'],
                $registro['producto_creado']
            );
        } else {
            return new Producto();
        }
    }
}
