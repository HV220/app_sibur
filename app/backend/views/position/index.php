<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var yii\web\View $this */
/* @var common\models\PositionSearch $searchModel */
/* @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Positions');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <?= Html::a(Yii::t('app', 'Create Position'), ['create'], ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>


                        <?php Pjax::begin(); ?>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'id',
                                'name',

                                ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                            ],
                            'summaryOptions' => ['class' => 'summary mb-2'],
                            'pager' => [
                                'class' => 'yii\bootstrap4\LinkPager',
                            ]
                        ]); ?>

                        <?php Pjax::end(); ?>

                    </div>
                    <!--.card-body-->
                </div>
                <!--.card-->
            </div>
            <!--.col-md-12-->
        </div>
        <!--.row-->
    </div>
<?php
