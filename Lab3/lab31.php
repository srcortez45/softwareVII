<html>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $diametro = $_POST['diam'];
        $altura = $_POST['altu'];
        $radio = $diametro / 2;
        $PI = 3.141593;
        $volumen = $PI * $radio * $altura;
        echo "<br/> El volumen del cilindro es " . $volumen . " metros cubicos";
        echo "<br/> <a href=\"lab31.html\">nuevo calculo</a>";
    } else { ?>
        <script>location.replace('lab31.html')</script>
    <?php
    }
    ?>
</body>

</html>