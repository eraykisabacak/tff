<?php


try{
    $db = new PDO('mysql:host=localhost;dbname=tffdb','root','12345678');
} catch(PDOException $e){
   echo $e->getMessage();
}


?>