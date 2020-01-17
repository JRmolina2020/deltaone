<?php


class Login
{
    public $username;
    public $password;
    public $url;
    public $urlU;
    public $ruta;
    public $token;

    // Constructor
    public function __construct()
    {
        $this->username = 'delta@amovil.co';
        $this->password = 'Delta2019$';
        $this->url = 'https://fepruebas.amovil.co:8080/api/auth/token/';
        $this->urlU = 'https://fepruebas.amovil.co:8080/api/';
        $this->ruta = $this->urlU . "integration/upload/";
    }

    public function auth()
    {
        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',

        );

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=" . $this->username . "&password=" . $this->password . ";");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        //obteniendo el token
        $result = json_decode($result, true);
        $token = $result['token'];
        //pasando el token
        $this->token = $token;
        $this->Uploader();
    }
    public function Uploader()
    {
        $token = "Token" . " " . $this->token;
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
                'Authorization:' . $token,
                'Content-Type: multipart/form-data',
            )
        );
        curl_setopt($ch, CURLOPT_URL, $this->ruta);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        echo $result;
    }
}
