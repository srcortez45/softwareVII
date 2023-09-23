<?php
final class ClaseBase
{
    public function test()
    {
        echo "ClaseBase::test() llamada\n";
    }
    // Aquí da igual si se declara el método como
    // final o no
    final public function moreTesting()
    {
        echo "ClaseBase::moreTesting() llamada\n";
    }
}
// no se puede extender una clase marcada como final
class ClaseHijo extends ClaseBase
{
    
}
