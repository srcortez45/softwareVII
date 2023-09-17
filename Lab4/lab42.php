<?php
    // Función para calcular el factorial de un número
    function calcularFactorial($numero) {
        if ($numero < 0) {
            return "No se puede calcular el factorial de un número negativo.";
        } elseif ($numero == 0 || $numero == 1) {
            return 1;
        } else {
            $factorial = 1;
            for ($i = 2; $i <= $numero; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        }
    }

    // Verifica si se ha enviado un número desde el formulario
    if (isset($_POST['numero'])) {
        $numero = intval($_POST['numero']);
        $resultado = calcularFactorial($numero);
        echo "El factorial de $numero es: $resultado";
    } else {
        echo "Por favor, ingresa un número válido.";
    }
    ?>