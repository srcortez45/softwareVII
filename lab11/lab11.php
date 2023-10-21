<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 11</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

    <?php

    require_once("class/noticias.php");
    $obj_noticia = new noticia();
    $elementosPorPagina = 5;
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    $totalRegistros = 0;
    $totalRegistros = $obj_noticia->obtenerTotalRegistros();
    $totalPaginas = ceil($totalRegistros / $elementosPorPagina);

    $inicio = ($pagina - 1) * $elementosPorPagina;
    $noticias = $obj_noticia->consultarNoticiasPaginacion($inicio, $elementosPorPagina);
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
                    print("<td><a target='_blank' href='" . $noticia['imagen'] . "'><img border='0' src='img/iconotexto.gif'></a></td>\n");
                } else {
                    print("<td>&nbsp;</td>");
                }
                print("</tr>");
            }
            ?>
        </table>

    <?php
        // Agregar controles de paginación (anterior y siguiente) si es necesario
        if ($totalPaginas > 1) {
            echo "<br>";
            if ($pagina > 1) {
                echo '<a href="?pagina=' . ($pagina - 1) . '">Anterior</a> ';
            }

            if ($pagina < $totalPaginas) {
                echo '<a href="?pagina=' . ($pagina + 1) . '">Siguiente</a>';
            }
        }
    } else {
        print("no hay noticias<br>");
        echo '<a href="?pagina=1">Anterior</a> ';
    }

    ?>

</body>

</html>