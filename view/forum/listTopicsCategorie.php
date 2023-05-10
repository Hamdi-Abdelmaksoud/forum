<?php

$topics = $result['data']['topics'];
$category=$result['data']['category'];
?>
<p><?= $topic->getTitle() ?></p>
<?php
foreach ($posts as $post) { ?>
    <p><?= $post->getTexte() . ":" . $post->getPostDate() ?></p>
<?php
}