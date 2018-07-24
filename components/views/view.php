<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<?php foreach ($news->getModels() as $new): ?>
    <div class="post">
        <?php if (isset($new->description_image)): ?>
            <a href="/" class="post_img">
                <div class="latest_post">Latest Post</div>
                <img src="images/pic1.png"/>
            </a>
        <?php endif; ?>
        <a href="/" class="post_img">
            <div class="latest_post">Latest Post</div>
            <img src="images/pic1.png"/>
        </a>
        <div class="post_date">
            <span class="date">
                <?= Yii::$app->formatter->asDate(strtotime($new->date), 'php:d') ?>
            </span>
            <span class="month">
                <?= strtolower(Yii::$app->formatter->asDate(strtotime($new->date), 'php:M')) ?>
            </span>
            <span class="year">
                <?= Yii::$app->formatter->asDate(strtotime($new->date), 'php:Y') ?>
            </span>
        </div>
        <div class="post_content">
            <h3><?= $new->name ?></h3>
            <span class="tags_comments">By <?= $new->userCreate; ?> / Tags: Movie, Celebrities / Comments: 0</span>
            <p>
                <?= HtmlPurifier::process($new->description); ?>
            </p>
            <a href="/" class="white_btn">Read more</a>
        </div>
        <div class="share">
            <p>Share on:</p>
            <a href="/" class="facebook"></a>
            <a href="/" class="tweeter"></a>
            <a href="/" class="google"></a>
        </div>
    </div>
<?php endforeach; ?>
<?= Html::a('More news', 'javascript:void(0)', ['class' => 'more_news', 'page' => '2', 'onClick' => '
                $.get("?moreNewsPage="+$(this).attr("page"), function(data) {
                  $.pjax.reload({container:"#news"});
                });
            ']) ?>

