<?php

$topics = $result['data']['topics'];
$category=$result['data']['category'];
?>
<h3><?= $category->getNom() ?></h3>
<?php
foreach ($topics as $topic) { ?>
<ul>
    <li><?= $topic->getTitle() ?></li>
    </ul>
<?php
}