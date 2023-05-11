<?php

$categories=$result['data']['categories'];

?>
<div>
<h3>Categories</h3>
<?php
if(isset($_SESSION['message']))//si la ctégorie existe déja
{?>
    <p id="message" style="color:white;width: 200px;background-color:red;"><?=$_SESSION['message']?></p>
    <script>
    setTimeout(function() {
        var message = document.getElementById('message');
        message.parentNode.removeChild(message);
    }, 2000); // Supprimer le message après 2 secondes (2000 ms)
</script>
<?php
    unset($_SESSION['message']);
}
if($categories != Null)
{
    foreach($categories as $categorie)
    {
        ?>
        <p><a href="index.php?ctrl=forum&action=listTopicsCategorie&id=<?=$categorie->getid()?>"><?=$categorie->getNom()?></a></p>
        <?php
    }
}
else
{
    echo "<p> pas de catégories pour l'instant</p>";
}
?>    
 <form action="index.php?ctrl=forum&action=ajoutCategory" method="post">

<div>
    <input type="text" name="nom" id="nom" required>

<input type="submit" value="ajouter category" name="ajouterCategory">
</div>
</form>
</div>