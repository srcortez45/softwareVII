<?php
class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $categoria_id;
    private $categoria_desc;
    private $creado;

    public function __construct($id=null, $nombre=null, $descripcion=null, $precio=null, $categoria_id=null, $categoria_desc=null, $creado=null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->categoria_id = $categoria_id;
        $this->categoria_desc = $categoria_desc;
        $this->creado = $creado;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function getCategoriaDesc()
    {
        return $this->categoria_desc;
    }

    public function setCategoriaDesc($categoria_desc)
    {
        $this->categoria_desc = $categoria_desc;
    }

    public function getCreado()
    {
        return $this->creado;
    }

    public function setCreado($creado)
    {
        $this->creado = $creado;
    }

}
