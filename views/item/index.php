<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
   
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'search-form','method'=>'GET']); ?>
                <?= $form->field($model, 'search') ?>
            <div class="form-group">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
<div id="container"></div>
<script type="text/x-handlebars-template" id="waterfall-tpl">
{{#result}}
    <div class="item">
        <div class="main-img">
            <div class="img-wrap">
                <img src="{{author_image_url}}" alt="Item image" class="img-responsive" />
            </div>
            <div class="author-name">
                <h4>{{author_name}}</h4>
            </div>
        </div>
            <img src="{{image_url}}" alt="Item image"  class="img-responsive" />
            <div class="content">
                <p class="word-wrap-break">{{description}}</p>  
                <hr class="horizantal">  
                <p>
                    <span>{{comment_count}}</span>
                    <span class="float-right"> {{created_time}}</span>
                </p>    
            </div>
        </div>       
{{/result}}
</script>