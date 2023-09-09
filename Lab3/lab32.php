<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $precio1 = $_POST['precio1'];
    $precio2 = $_POST['precio2'];
    $precio3 = $_POST['precio3'];
    if (!empty($precio1) && (!empty($precio2)) && (!empty($precio3))) {
        $media = ($precio1 + $precio2 + $precio3) / 3;
        echo "<br/> DATOS RECIBIDOS";
        echo "<br/> Precio producto del establecimiento 1: " . $precio1 . " dolares";
        echo "<br/> Precio producto del establecimiento 2: " . $precio2 . " dolares";
        echo "<br/> Precio producto del establecimiento 3: " . $precio3 . " dolares";
        echo "<br/> El precio medio del producto es de :" . $media . " dolares";
    } else {
        if(empty($precio1)){
            echo "el precio del producto 1 no puede estar en blanco<br/>";
        }
        if(empty($precio2)){
            echo "el precio del producto 2 no puede estar en blanco<br/>";
        }
        if(empty($precio3)){
            echo "el precio del producto 3 no puede estar en blanco<br/>";
        }
    }
    echo "<br/> <a href=\"lab32.html\">nuevo calculo</a>";
} else { ?>
    <script>
        location.replace('lab32.html')
    </script>
<?php
}
?>