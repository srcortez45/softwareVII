<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 1.6</title>
</head>

<body>

    <?php
    define('TAM', 4);
    function potencia($v1,$v2){
        return pow($v1,$v2);
    }

    echo "<table border = 1>";
    for ($n1 = 1; $n1 <= TAM; $n1++) {
        echo "<tr>";
        for ($n2=1;$n2<TAM;$n2++){
            echo "<td>".potencia($n1,$n2)."</td>";
        }
        echo "</tr>";
    }
    echo "</table>"
    ?>
</body>

</html>