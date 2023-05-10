<?php

$categories=$result['data']['categories'];

?>
<div>
<h3>Categories</h3>
<?php
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

</div>