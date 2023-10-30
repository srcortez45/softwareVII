<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" href="librerias/jquery.dataTables.min.css">
    <script src="librerias/jquery-3.1.1.js"></script>
    <script src="librerias/jquery.dataTables.min.js"></script>
</head>

<body>

    <?php

    require_once("class/noticias.php");

    $obj_noticia = new noticia();
    $noticias = $obj_noticia->consultar_noticias();
    $nfilas = count($noticias);

    if ($nfilas > 0) {
    ?>
        <table id="grid" class="display" cellspacing="0">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>Categoria</th>
                    <th>Fecha</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <?php
            foreach ($noticias as $noticia) {
                print("<tbody>");
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
                print("</tbody>");
                print("</tr>");
            }
            ?>
        </table>
    <?php
    } else {
        print("no hay noticias");
    }

    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#grid').DataTable({
                "lengthMenu": [5, 10, 20, 501],
                "order": [
                    [0, "asc"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No existen resultados en su busqueda",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Buscado entre _MAX_ registros en total)",
                    "search": "Buscar: ",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }

            });
            $("*").css("font-family", "arial").css('font-size', '12px');
        });
    </script>
</body>

</html>