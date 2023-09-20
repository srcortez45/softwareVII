<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["archivo"])) {
        $archivo = $_FILES["archivo"];

        // Verificar si se subió correctamente
        if ($archivo["error"] === UPLOAD_ERR_OK) {
            $nombre_temporal = $archivo["tmp_name"];
            $nombre_archivo = $archivo["name"];

            // Mover el archivo temporal a una ubicación permanente
            $directorio_destino = "uploads/";
            $ruta_destino = $directorio_destino . $nombre_archivo;

            if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
                echo "El archivo se ha subido correctamente a $ruta_destino.";
            } else {
                echo "Hubo un error al mover el archivo.";
            }
        } else {
            echo "Error al subir el archivo. Código: " . $archivo["error"];
        }
    } else {
        echo "No se recibió ningún archivo.";
    }
}
?>