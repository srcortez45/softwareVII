<?php
require_once('modelo.php');
class usuarios extends modeloCredencialesBD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function validar_usuario($usr, $pwd)
    {
        $instruccion = "CALL sp_validar_usuario (?,?)";
        $consulta = $this->_db->prepare($instruccion);
        $consulta->bind_param("ss", $usr, $pwd);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $registro = $resultado->fetch_assoc();
        return $registro > 1;
    }
}
