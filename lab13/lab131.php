<?PHP
if (isset($_COOKIE['contador']))
{
    setcookie('contador', $_COOKIE['contador'] + 1 , time() + 365 * 24 * 60 * 60 );
    $mensaje = 'gracias por visitarnos. numero de visitas:' . $_COOKIE['contador'];
}
else
{
    setcookie('contador', 1 , time() + 365 * 24 * 60 * 60 );
    $mensaje = 'Bievenido a nuestro sitio web';
}
?>
<HTML XMLNS="http://www.w3.org/1999/xhtml" xml:lang="es" LANG="es">

<HEAD>
    <TITLE>Laboratorio 13</TITLE>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>

<BODY>
<h1>Contador de visitas con cookies</h1>
<h3><?php echo $mensaje; ?> </h3>
</BODY>

</HTML>