<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 3.3</title>
</head>

<body>
    <?php
    if (array_key_exists('enviar', $_POST)) {
        if ($_REQUEST['Apellido'] != "") {
            echo "el apellido ingresado es $_REQUEST[Apellido]";
        } else {
            echo "por favor coloque el apellido";
        }
        echo "<br/>";
        if ($_REQUEST['Nombre'] != "") {
            echo "el nombre ingresado es $_REQUEST[Nombre]";
        } else {
            echo "por favor coloque el nombre";
        }
        echo "<br/> <a href=\"lab33.php\">nuevo registro</a>";
    } else {
    ?>
    <form method="POST" action="lab33.php">
        Nombre: <input type="text" name="Nombre"><br/>
        Apellido: <input type="text" name="Apellido"><br/>
        <input type="submit" value="Enviar datos" name="enviar">
    </form>
    <?php
    }
    ?>
</body>

</html>