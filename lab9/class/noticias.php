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

    public function consultar_noticias()
    {
        $instruccion = "CALL sp_listar_noticias()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if ($resultado) {
            return $resultado;
            $consulta->close();
            $this->_db->close();
        } else {
            echo "fallo al consultar las noticias";
        }
    }

    public function consultar_noticias_filtro($campo,$valor)
    {
        $instruccion = "CALL sp_listar_noticias_filtro(?, ?)";
        $stmt =  $this->_db->prepare($instruccion);
        $stmt->bind_param("ss", $campo, $valor);
        $stmt->execute();
        $resultados = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if ($resultados) {
            return $resultados;
            $stmt->close();
            $this->_db->close();
        } else {
            echo "fallo al consultar las noticias";
        }
    }
}
