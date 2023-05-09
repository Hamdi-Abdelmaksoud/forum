<?php
$posts = $result['data']['posts'];
$topic = $result['data']['topic'];
?>
<p><?= $topic->getTitle() ?></p>
<?php
foreach ($posts as $post) { ?>
    <p><?= $post->getTexte() . ":" . $post->getPostDate() ?></p>
<?php
}
?>
<form action="index.php?ctrl=forum&action=ajouterPost&id=<?= $_GET["id"] ?>" method="post">
    <h3>commenter</h3>
    <div>
        <textarea name="commentaire" id="commentaire" required></textarea>
        <input type="submit" value="ajouter commentaire" name="ajouterCom">
    </div>
</form>