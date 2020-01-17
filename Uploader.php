<?php
$url = "https://fepruebas.amovil.co:8080/api/";
$ruta = $url . "integration/upload/";


$file = '' . $_SERVER['DOCUMENT_ROOT'] . '/delta/Ejemplo JSON.zip';
$mime = mime_content_type($file);
$info = pathinfo($file);
$name = $info['basename'];
$output = new CURLFile($file, $mime, $name);
$data = array(
    "data" => $output,
);


$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Authorization: Token 018e25f173773fc89f455c99e92af664a10f76f5',
        'Content-Type: multipart/form-data',
    )
);


curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

curl_close($ch);
echo $result;
