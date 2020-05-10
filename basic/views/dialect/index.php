<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DialectClass */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Диалекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dialect-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            //'lang_id',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>