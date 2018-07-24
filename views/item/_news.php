<?php
use app\components\LatestItem;
use yii\helpers\Html;

 if (!empty($moreitems)) { ?>
<?php echo LatestItem::widget(['news' => $moreitems]); ?>
<?php } ?>