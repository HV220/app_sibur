<?php

/* @var yii\web\View $this */
/* @var common\models\Position $model */

$this->title = Yii::t('app', 'Create Position');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?=$this->render('_form', [
                            'model' => $model
                        ]) ?>
                    </div>
                </div>
            </div>
            <!--.card-body-->
        </div>
        <!--.card-->
    </div>
<?php
