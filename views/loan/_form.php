<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Loan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'interest')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>
	<?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::classname(), [
    	'dateFormat' => 'yyyy-MM-dd',
	]) ?>
	<?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::classname(), [
    	'dateFormat' => 'yyyy-MM-dd',
	]) ?>

    <?= $form->field($model, 'campaign')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
