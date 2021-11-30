<?php
    $json = file_get_contents("https://covid-api.mmediagroup.fr/v1/cases");

    $data = json_decode($json);

    $global = $data->Global->All;
   
?>