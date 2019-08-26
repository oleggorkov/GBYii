<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'body',
            [
                'attribute' => 'start_date',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'start_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDate($model->start_date, 'php:d.m.Y');
                }
            ],
            [
                'attribute' => 'end_date',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'end_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDate($model->end_date, 'php:d.m.Y');
                }
            ],
//            'end_date:datetime',
//            [
//                'attribute' => 'authorEmail',
//                'value' => function (\app\models\Activity $model) {
//                    return $model->author->email.' '.$model->author->id;
//                }
//            ],
            [
                'attribute' => 'username',
                'value' => function (\app\models\Activity $model) {
                    return $model->author->username;
                }
            ],
//            'author_id',
            'cycle:boolean',
            'main:boolean',
            [
                'attribute' => 'created_at',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y');
                }
            ],
            [
                'attribute' => 'updated_at',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'updated_at',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->updated_at, 'php:d.m.Y');
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
