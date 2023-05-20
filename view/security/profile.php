<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="/security/profile.php"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()->getPseudo()?></a>
                            <a href="index.php?ctrl=forum&action=listTopics">la liste des topics</a>
                            <a href="index.php?ctrl=forum&action=listCategories">la liste des categories</a>
                            <a href="index.php?ctrl=security&action=deconnexion">Déconnexion</a>
<a href="index.php?ctrl=forum&action=findUserTopics&id=<?=$session->getUser()->getId()?>">mes topics</a>
</body>
</html> 