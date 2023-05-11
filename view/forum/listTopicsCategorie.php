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
  {
    foreach ($topics as $topic) { ?>
        <ul>
            <li><a href="index.php?ctrl=forum&action=listPostsTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></li>
            <?php if($post !=Null){?>
            <ul><li><?=$post->getTexte()?></li></ul>
            <?php } ?>

        </ul>
<?php
    }
} ?>