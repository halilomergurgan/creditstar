<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'first_name:ntext',
            'last_name:ntext',
            'email:ntext',
             'personal_code',
             'phone',
             'active:boolean',
             'dead:boolean',
             'lang:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    	'rowOptions'=>function($model){
    		if($model->dead == 1){
    			return ['class' => 'redRow'];
    		}
    		if($model->active == 0){
    			return ['class' => 'yellowRow'];
    		}
        },
    ]); ?>
</div>
<p>
        <?= Html::a('Create User', ['create'], ['class' => 'button-orange button-large']) ?>
</p>
