<?php

/* @var View $this */

/* @var Position|ActiveRecord $model */

use common\models\Position;
use yii\bootstrap5\ActiveForm;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\View;

?>

<div class="position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
