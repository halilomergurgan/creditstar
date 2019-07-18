<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'user_id',
            'amount',
            'interest',
            'duration',
            'campaign',

            ['class' => 'yii\grid\ActionColumn'],
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
    <p>
        <?= Html::a('Create Loan', ['create'], ['class' => 'button-orange button-large']) ?>
    </p>

