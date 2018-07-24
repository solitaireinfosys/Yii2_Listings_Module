<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="">              
<?php
    if(count($news) > 0) { 
        foreach ($news as $item) 
        {?>
     <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
        <b><strong><?= $item['author_name']; ?></strong></p>
        <img src="<?= $item['image_url']; ?>" alt="Item image" style="height:200px; width: 100%;"/>

    </div>     
<?php } } ?>
</div>
