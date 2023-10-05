<?php
class ManejoArreglo
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['arregloPares'])) {
            $_SESSION['arregloPares'] = array();
        }
    }

    public function procesarNumero($numero)
    {
        if (is_numeric($numero)) {
            if ($numero % 2 == 0) {
                $_SESSION['arregloPares'][] = intval($numero);
            } else {
                echo "<script>alert('Valor impar, vuelta a intentar');</script>";
            }
        }
    }

    public function limpiarSesion()
    {
        $_SESSION['arregloPares'] = array();
        session_unset();
        session_destroy();
    }

    public function obtenerArregloPares()
    {
        return $_SESSION['arregloPares'];
    }
}
?>
