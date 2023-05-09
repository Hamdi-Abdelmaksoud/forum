<?php

$topics = $result["data"]['topics'];
    
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){

    ?>
    <p><a href="index.php?ctrl=forum&action=listPostsTopic&id=<?=$topic->getId()?>"><?=$topic->getTitle()?></a> </p>
    <?php
}


  
?>