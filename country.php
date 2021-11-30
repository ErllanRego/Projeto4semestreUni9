<?php
    include_once("header.php");

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $countries = [];

        $query = "SELECT * FROM countries";

        $stmt = $conn->prepare($query);

        $stmt->execute();
      
        $countries = $stmt->fetchAll();

    }catch(PDOException $e){
        echo "error" . $e->getMessage();
    }

    $conn = NULL;
?>
<div class="content-box">
    <form action="country_search.php" method="GET">
        <div>
            <select name="country_name" id="country_name">
                <?php foreach($countries as $country):?>
                    <option value="<?=$country['name'] ?>"><?=$country['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit">Search By Country</button>
        </div>
        
    </form>
</div>

<?php
    include_once("bottom.php");
?>