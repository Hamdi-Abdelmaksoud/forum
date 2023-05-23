<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>list des topics</h1>

    <?php $topics = $result['data']['topics'];
    if ($topics != null) {
        foreach ($topics as $topic) { ?>
            <p>
                <a href="index.php?ctrl=forum&action=listPostsTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a>
                <!-- <a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>">supprimer</a> -->
            </p>

    <?php   }
    }

    ?>



</body>

</html>