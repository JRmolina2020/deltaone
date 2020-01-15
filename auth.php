<?php


 class Login{
    public $username;
    public $password;
    public $url;
    public $token;

     // Constructor
     public function __construct(){
        $this->username = 'delta@amovil.co';
        $this->password = 'Delta2019$';
        $this->url = 'https://fepruebas.amovil.co:8080/api/auth/token/';

    }


    public function auth(){
        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        
            );
        
        curl_setopt ($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=".$this->username."&password=".$this->password.";");
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_POST, 1);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        //obteniendo el token
        $result = json_decode($result, true); 
        $token = $result['token'];
        //pasando el token
        $this->token = $token;
        $this->store();
       
        }
        public function store(){
         echo $this->token;
        }
}
?>
