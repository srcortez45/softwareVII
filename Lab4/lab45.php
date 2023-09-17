<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.5 - Manejo de Matrices</title>
</head>
<body>
    <h1>Generador de Matriz Identidad</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Ingrese el valor de N (número par): <input type="number" name="n">
        <input type="submit" value="Generar Matriz">
    </form>

    <?php
    // Función para generar la matriz identidad de orden N
    function generarMatrizIdentidad($n) {
        $matriz = array();
        for ($i = 0; $i < $n; $i++) {
            $fila = array();
            for ($j = 0; $j < $n; $j++) {
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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $n = isset($_POST["n"]) ? intval($_POST["n"]) : 0;

        if ($n % 2 == 0 && $n > 0) {
            $matrizIdentidad = generarMatrizIdentidad($n);

            echo "<h2>Matriz Identidad de Orden $n:</h2>";
            echo "<table border='1'>";
            foreach ($matrizIdentidad as $fila) {
                echo "<tr>";
                foreach ($fila as $elemento) {
                    echo "<td>$elemento</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Ingrese un valor de N válido (número par y mayor que cero).</p>";
        }
    }
    ?>
</body>
</html>
