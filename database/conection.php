<?php
    try{
        $host = "localhost";
        $user = "root";
        $dbname = "covidata_19";
        $pass = "";

        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "
            CREATE DATABASE IF NOT EXISTS $dbname;
            USE $dbname;
            CREATE TABLE countries(
                id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                name VARCHAR(100) UNIQUE,
                flag VARCHAR(100) UNIQUE
            )
        ";

        $conn->exec($sql);
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "Ocorreu o erro na conexão: $error";   
    }

    $conn = null;

?>

