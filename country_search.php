<?php
    include_once("header.php");
    
    $country_name = $_GET['country_name'];

    $json = file_get_contents("https://covid-api.mmediagroup.fr/v1/cases?country=$country_name");
    
    $data =json_decode($json);
    $country = $data->All;

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql_flag = "SELECT flag FROM countries WHERE name = :country_name";

        $stmt = $conn->prepare($sql_flag);

        $stmt->bindParam(":country_name",$country_name);

        $stmt->execute();
      
        $flag = $stmt->fetch();

    }catch(PDOException $e){
        echo "error" . $e->getMessage();
    }
?>
<div class="content-box">
    <div class="image-box">
        <img style="width:500px;height:250px;" src="<?= $flag['flag'] ?>" alt="The flag of the country">
    </div>
    <div><h1><?= $country->country?></h1></div>
    <div class="data-box">
        <div class="data-p"><h1>Population:<br><?= $country->population?></h1></div>
        <div class="data-c"><h1>Cases:<br><?= $country->confirmed?></h1></div>
        <div class="data-d"><h1>Deaths:<br><?= $country->deaths?></h1></div>
    </div>
</div>
<?php

include_once("bottom.php");