<?php

$categories=$result['data']['categories'];

?>
<div>
<h3>Categories</h3>
<?php
if(isset($_SESSION['message']))
{
    echo "<p>".$_SESSION['message']."</p>";
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