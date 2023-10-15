<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <form id="filtroForm" method="post" action="lab92.php">
        <br/>
        Filtrar por:<select name="campo">
        <option value="texto">Descripcion</option>
        <option value="titulo">Titulo</option>
        <option value="categoria">Categoria</option>
        </select>
        <input type="text" required name="valor">
        <input type="submit" name="ConsultarFiltro" value="Filtrar Datos">
    </form>
    <?php

    require_once("class/noticias.php");
    $obj_noticia = new noticia();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $campo = $_POST["campo"];
        $valor = $_POST["valor"];
        
        $noticias = $obj_noticia->consultar_noticias_filtro($campo,$valor);
    }else{
        $noticias = $obj_noticia->consultar_noticias();
    }


    $nfilas = count($noticias);

    if ($nfilas > 0) {
    ?>
        <table>
            <tr>
                <th>Titulo</th>
                <th>Texto</th>
                <th>Categoria</th>
                <th>Fecha</th>
                <th>Imagen</th>
            </tr>
            <?php
            foreach ($noticias as $noticia) {
                print("<tr>\n");
                print("<td>" . $noticia['titulo'] . "</td>");
                print("<td>" . $noticia['texto'] . "</td>");
                print("<td>" . $noticia['categoria'] . "</td>");
                print("<td>" . date("j/n/Y", strtotime($noticia['fecha'])) . "</td>");
                if ($noticia['imagen'] != "") {
                    print("<td><a target='_blank' href='img/". $noticia['imagen'] . "'><img border='0' src='img/iconotexto.gif'></a></td>\n");
                } else {
                    print("<td>&nbsp;</td>");
                }
                print("</tr>");
            }
            ?>
        </table>
    <?php
    } else {
        print("no hay noticias");
    }

    ?>
<script>
   document.getElementById("filtroForm").addEventListener("submit", function(event) {
    event.preventDefault();
    this.submit();
});
</script>
</body>


</html>