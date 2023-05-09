<?php
$posts=$result['data']['posts'];
foreach($posts as $post)
{?>
<p><?=$post->getTexte().":".$post->getPostDate()?></p>
<?php
    
}

?>
