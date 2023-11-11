<?php
// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errores = array();
    // Recoger los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $repetirContrasena = $_POST["repetirContrasena"];
    $ip = $_POST["ip"];

    // Validar los datos (puedes agregar más validaciones según tus necesidades)

    function verificar_email($email, &$errores)
    {
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
            $errores[] = "Su correo no es valido.";
        }
    }

    function verificar_password_strength($password, &$errores)
    {
        if (!preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)) {
            $errores[] = "Su contraseña no cumple con los requisitos de seguridad.";
        }
    }

    function verificar_ip($ip, &$errores)
    {
        if (!preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" .
            "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip)) {
            $errores[] = "La dirección IP no es válida.";
        }
    }

    function validar_contrasena($contrasena, $repetirContrasena, &$errores)
    {
        // Validar que las contraseñas coincidan
        if ($contrasena != $repetirContrasena) {
            $errores[] = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        }
    }

    verificar_email($email, $errores);
    verificar_password_strength($contrasena, $errores);
    validar_contrasena($contrasena, $repetirContrasena, $errores);
    verificar_ip($ip, $errores);

    // Verificar si hay errores
    if (count($errores) > 0) {
        // Mostrar los errores
        echo "Errores de validación:<br>";
        foreach ($errores as $error) {
            echo "- $error<br>";
        }
    } else {
        // Aquí puedes realizar el proceso de registro en tu base de datos o hacer lo que necesites con los datos.
        // En este ejemplo, simplemente mostramos los datos recogidos.
        echo "Registro exitoso:<br>";
        echo "Nombre: $nombre<br>";
        echo "Apellido: $apellido<br>";
        echo "Email: $email<br>";
        echo "Contraseña: $contrasena<br>";
        echo "IP: $ip";
    }
}
?>
