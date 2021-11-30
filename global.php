<?php
    include_once("header.php");
    require_once("global_data.php");
?>
<div class="content-box">
    <div class="image-box">
        <img style="width:500px;height:250px;" src="img/planet.jpg" alt="A small planet image">
    </div>
    <div class="data-box">
        <div class="data-p"><h1>Population:<br><?php print_r($global->population) ?></h1></div>
        <div class="data-c"><h1>Cases:<br><?php print_r($global->confirmed) ?></h1></div>
        <div class="data-d"><h1>Deaths:<br><?php print_r($global->deaths) ?></h1></div>
    </div>
</div>

<?php 
    include_once("bottom.php");
?>