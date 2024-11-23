<?php
// URL base de JSONPlaceholder
$base_url = "https://jsonplaceholder.typicode.com/posts";

// Verificar si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Crear el payload
    $payload = json_encode([
        'title' => $title,
        'body' => $description,
        'userId' => 1
    ]);

    // Inicializar cURL
    $ch = curl_init($base_url);

    // Configurar cURL para enviar datos POST
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json; charset=UTF-8',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);

    // Manejar errores de cURL
    if (curl_errno($ch)) {
        echo "Error en la solicitud: " . curl_error($ch);
    } else {
        echo "Respuesta de la API: " . $response;
    }

    // Cerrar cURL
    curl_close($ch);
} else {
    echo "Método no permitido";
}
?>
