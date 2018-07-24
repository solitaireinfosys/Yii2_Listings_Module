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

    <div class="row">       
        <div class="container-fluid" id="more_items_data">              
            <?php
                if($total_item > 0) { 
                    foreach ($items as $item) 
                    {?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3"> 
                        <b><strong><?= $item['author_name']; ?></strong></p>
                        <img src="<?= $item['image_url']; ?>" alt="Item image" style="height:200px; width: 100%;"/>

                </div>    
            <?php } } ?>
        </div>
    </div>
    <?php echo Html::a('', ['item/index?page='], ['class' => 'more_item', 'data-page' => $nextPage]); ?> 
</div>