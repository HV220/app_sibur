<?php

declare(strict_types=1);

use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var yii\web\View $this */
/* @var common\models\User $model */
/* @var yii\bootstrap5\ActiveForm $form */
?>

<div class="user-form">
    <?php
    $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'roles')
        ->widget(
            Select2::class,
            [
                'name' => 'kv_theme_bootstrap_2',
                'data' => $model->structureRoles(array_keys((Yii::$app->authManager->getRoles()))),
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'value' => $model->structureRoles($model->roles),
                    'multiple' => true,
                    'autocomplete' => 'off',
                    'selected' => true
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]
        ) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    ActiveForm::end() ?>

</div>
