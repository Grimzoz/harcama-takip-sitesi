<?php
$host   = "localhost";
$dbname = "hesap";
$name   = "root";
$pass  = "";

@session_start();
@ob_start();

try {

    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$name","$pass");

}
catch (PDOException $mesaj){

    echo $mesaj->getmessage();

}

?>
