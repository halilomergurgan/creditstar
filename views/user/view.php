<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;;
$formatter = \Yii::$app->formatter;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$dataProvider = new ActiveDataProvider([
		'query' => $model->getLoans(),
		'pagination' => [
				'pageSize' => 20,
		],
]);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
    <div class="col-md-2">
    <br>
    <h4>Currently to be Paid: </h4>
    </div>
    <div class="col-md-4">
    <h2><?php echo $formatter->asCurrency($totalAmount,'EUR');?></h2>
    </div>
    <div class="col-md-offset-2 col-md-4 text-center textRed">
    <h1><?= $age;?></h1>
    <small>User's Age</small>
    </div>
    </div>
    <br>

    <?= GridView::widget([
    	'dataProvider' => $dataProvider,
    	'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'user_id',
            'amount',
            'interest',
            'duration',
            'start_date',
            'end_date',
            'campaign',
            'status:boolean',
            [
             'class' => 'yii\grid\ActionColumn',
             'controller'=>'loan'
    		],
        ],
    	'rowOptions'=>function($model){
    	if($model->campaign== 7){
    		return ['class' => 'redRow'];
    	}
    	if($model->campaign== 6){
    		return ['class' => 'yellowRow'];
    	}
    	if($model->campaign== 3){
    		return ['class' => 'disabledRow'];
    	}
    },
    ]); ?>
</div>

