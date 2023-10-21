<?php
require_once('modelo.php');

class noticia extends ModeloCredencialesBD
{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct()
    {
        parent::__construct();
    }

    public function consultarNoticiasPaginacion($cant_registros, $pagina)
    {
        $instruccion = "CALL sp_listar_noticias_paginacion(?, ?)";
        $stmt =  $this->_db->prepare($instruccion);
        $stmt->bind_param("ii", $cant_registros, $pagina);
        $stmt->execute();
        $resultados = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return  $resultados;
        $stmt->close();
        $this->_db->close();

    }

    public function obtenerTotalRegistros()
    {
        $instruccion = "CALL sp_obtener_total_noticias()";
        $stmt =  $this->_db->prepare($instruccion);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $totalRegistros = $resultado->fetch_assoc();
        return $totalRegistros['total_registros'];

    }
}
