<?php
$posts = $result['data']['posts'];
$topic = $result['data']['topic'];
?>
<p><?= $topic->getTitle() ?></p>
<?php

if ($topic->getUser()->getId() === App\Session::getUser()->getId()) {
    if ($topic->getClosed()) {
?>
        <a href="index.php?ctrl=forum&action=veroullierTopic&id=<?= $topic->getId() ?>">veroullier le topic</a>
    <?php } else {
    ?>
        <a href="index.php?ctrl=forum&action=ouvrirTopic&id=<?= $topic->getId() ?>">ouvrir le topic</a>
    <?php }
}
if ($posts != NUll) {
    foreach ($posts as $post) {

    ?>
        <?php if ($post->getUser()->getId() === App\Session::getUser()->getId()) {
        ?>
            <p>
                <?= $post->getTexte() . ":" . $post->getPostDate() . "**" . $post->getUser()->getPseudo() ?>
                <button>Modifier</button>
                <a href="index.php?ctrl=forum&action=deletePost&idpost=<?= $post->getId() ?>&id=<?= $topic->getId() ?>">supprimer</a>
            </p>
        <?php
        } else { ?>
            <p>
                <?= $post->getTexte() . ":" . $post->getPostDate() ?>


    <?php   }
    }
}
    ?>
    <?php if ($topic->getClosed()) { ?>
            <form action="index.php?ctrl=forum&action=ajouterPost&id=<?= $_GET["id"] ?>" method="post">

                <div>
                    <textarea name="commentaire" id="commentaire" required></textarea>
                    <input type="submit" value="ajouter commentaire" name="ajouterCom">
                </div>
            </form>
        <?php } ?>