<?php
require_once('modelo.php');

class votos extends ModeloCredencialesBD
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listar_votos()
    {
        $instruccion = "CALL sp_listar_votos()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if ($resultado) {
            return $resultado;
            $consulta->close();
            $this->_db->close();
        } 
    }

    public function actualizar_votos($voto1,$voto2)
    {
        $instruccion = "CALL sp_actualizar_votos(?, ?)";
        $stmt =  $this->_db->prepare($instruccion);
        $stmt->bind_param("ss", $voto1, $voto2);
        $resultados = $stmt->execute();
        if ($resultados) {
            return $resultados;
            $stmt->close();
            $this->_db->close();
        }
    }
}
