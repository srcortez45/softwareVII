<?PHP
if (isset($_COOKIE['contador'])) {
    setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
    $mensaje = 'gracias por visitarnos. numero de visitas:' . $_COOKIE['contador'];
} else {
    setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
    $mensaje = 'Bievenido a nuestro sitio web';
}
?>
<HTML XMLNS="http://www.w3.org/1999/xhtml" xml:lang="es" LANG="es">

<HEAD>
    <TITLE>Laboratorio 13</TITLE>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>

<BODY>
    <h1>Creacion de cookies</h1>
    <h2>La cookie "User" tendra solo 5 minutos de duracion</h2>

    <?php

    if (isset($_COOKIE['user'])) {
        print("<br/> Hola <B>" . $_COOKIE['user'] . "</B> Gracias por visitar nuestro sitio web");
    } else {
    ?>
    <form action="lab142.php" method="post">
        <br>Hola, primera vez que te vemos por nuestro sitio web como te llamas?
        <input type="text" name="visitante" id="">
        <input type="submit" value="Gracias por identificarte" name="enviar">
    </form>
    <?php
    }
    ?>
    <br> <a href="lab133.php">Continuar</a>

</BODY>


</HTML>