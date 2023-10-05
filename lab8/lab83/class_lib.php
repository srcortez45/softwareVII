<?php
class MatrizIdentidad
{
    private $n;

    public function __construct($n)
    {
        $this->n = $n;
    }

    public function generarMatriz()
    {
        $matriz = array();
        for ($i = 0; $i < $this->n; $i++) {
            $fila = array();
            for ($j = 0; $j < $this->n; $j++) {
                if ($i == $j) {
                    $fila[] = 1;
                } else {
                    $fila[] = 0;
                }
            }
            $matriz[] = $fila;
        }
        return $matriz;
    }
}
?>
