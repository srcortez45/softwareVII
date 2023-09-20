<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["archivo"])) {
        $archivo = $_FILES["archivo"];

        // Verificar si se subió correctamente
        if ($archivo["error"] === UPLOAD_ERR_OK) {
            $nombre_temporal = $archivo["tmp_name"];
            $nombre_archivo = $archivo["name"];
            $tamaño_maximo_mb = 5; // Cambia esto al tamaño máximo que desees en MB
            $extensiones_permitidas = array("jpg", "jpeg", "gif", "png");

            // Obtener la extensión del archivo
            $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

            // Verificar si la extensión es válida
            if (in_array($extension, $extensiones_permitidas)) {
                // Verificar el tamaño del archivo
                if ($archivo["size"] <= $tamaño_maximo_mb * 1024 * 1024) { // Convertir MB a bytes
                    // Mover el archivo temporal a una ubicación permanente
                    $directorio_destino = "uploads/";
                    $ruta_destino = $directorio_destino . $nombre_archivo;

                    if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
                        echo "El archivo se ha subido correctamente a $ruta_destino.";
                    } else {
                        echo "Hubo un error al mover el archivo.";
                    }
                } else {
                    echo "El archivo excede el tamaño máximo permitido ({$tamaño_maximo_mb} MB).";
                }
            } else {
                echo "El archivo no es un formato válido. Se permiten solo archivos con extensiones .jpg, .jpeg, .gif y .png.";
            }
        } else {
            echo "Error al subir el archivo. Código: " . $archivo["error"];
        }
    } else {
        echo "No se recibió ningún archivo.";
    }
}
?>