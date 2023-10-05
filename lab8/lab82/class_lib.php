<?php
class ManejoArreglo
{
    private $arreglo;

    public function __construct()
    {
        $this->arreglo = array();
        $this->llenarArreglo();
    }

    private function llenarArreglo()
    {
        for ($i = 0; $i < 20; $i++) {
            $valor = rand(1, 100);

            while (in_array($valor, $this->arreglo)) {
                $valor = rand(1, 100);
            }

            $this->arreglo[] = $valor;
        }
    }

    public function obtenerArreglo()
    {
        return $this->arreglo;
    }

    public function encontrarElementoMayor()
    {
        $elementoMayor = max($this->arreglo);
        $posicionElementoMayor = array_search($elementoMayor, $this->arreglo);
        return array('elemento' => $elementoMayor, 'posicion' => $posicionElementoMayor);
    }
}
?>
