<?php

$topics = $result['data']['topics'];
$category = $result['data']['category'];
$post = $result['data']['firstPost'];
?>
<h3><?= $category->getNom() ?></h3>
<?php
if ($topics == null)
 {
    echo "pas de topic dans cette catégorie";
 }
  else 
  {?>
      <ul>
    <?php foreach ($topics as $topic) { ?>
            <li><a href="index.php?ctrl=forum&action=listPostsTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle()?></a>
            <?=$topic->getUser()->getPseudo() ?></li>
            
            <?php } ?>

        </ul>
<?php
    }
 ?>