<?php

$topics = $result['data']['topics'];
$category=$result['data']['category'];
?>
<h3><?= $category->getNom() ?></h3>
<?php
if($topics ==null)
{
    echo "pas de topic dans cette catégorie";
}
else{
foreach ($topics as $topic) { ?>
<ul>
    <li><a href="index.php?ctrl=forum&action=listPostsTopic&id=<?=$topic->getId()?>"><?= $topic->getTitle() ?></li>
    </ul>
<?php
}}?>