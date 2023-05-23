<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $topics = $result["data"]['topics'];
    $catgories = $result["data"]['categories'];

    ?>

    <h1>liste topics</h1>

    <?php
    foreach ($topics as $topic) {

    ?>
        <p>
            <a href="index.php?ctrl=forum&action=listPostsTopic&id=<?= $topic->getId() ?>">


                <?= $topic->getTitle() . "**" . $topic->getUser()->getPseudo() ?>

            </a>
        </p>


    <?php
    }
    ?>
    <form action="index.php?ctrl=forum&action=ajouterTopic" method="post">

        <div>
            <input type="text" name="title" id="title" required>
            <select id="category" name="category">
                <?php foreach ($catgories as $catgorie) { ?>


                    <option value="<?= $catgorie->getId() ?>"><?= $catgorie->getNom() ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="ajouter topic" name="ajouterTopic">
        </div>
    </form>

</body>

</html>