<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegionClass */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Регионы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'type',
            //'country_id',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
