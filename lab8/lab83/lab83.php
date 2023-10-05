<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.3 - Manejo de Matrices - Orientado a objetos</title>
</head>

<body>
    <h1>Generador de Matriz Identidad</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Ingrese el valor de N (número par): <input type="number" name="n">
        <input type="submit" value="Generar Matriz">
    </form>

    <?php
    require_once 'class_lib.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $n = isset($_POST["n"]) ? intval($_POST["n"]) : 0;

        if ($n % 2 == 0 && $n > 0) {
            $matrizObjeto = new MatrizIdentidad($n);
            $matrizIdentidad = $matrizObjeto->generarMatriz();

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
