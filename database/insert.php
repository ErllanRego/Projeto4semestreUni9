<?php 
    
    $host = "localhost";
    $dbname = "covidata_19";
    $user = "root";
    $pass = "";

    try{
        $conn = new PDO("mysql:host=$host",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $json = file_get_contents("https://restcountries.com/v2/all");

        $test = json_decode($json);
        
        for($i = 0;$i != 250;$i++){
            $name_country = $test[$i]->name;
            $flag = $test[$i]->flags->svg;
            
            $sql = "
                USE $dbname;
                INSERT INTO `countries`(`name`,`flag`)
                VALUES ('$name_country','$flag');
            ";
            
            $conn->exec($sql);
        }
    
    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "Ocorreu o erro: $error";   
    }

    $conn = null;