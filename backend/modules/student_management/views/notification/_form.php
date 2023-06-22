<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\modules\student_management\models\Notification $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="notification-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'client_id')->textInput() ?>
                <?php echo $form->field($model, 'parent_id')->textInput() ?>
                <?php echo $form->field($model, 'parent_type')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'medium')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'to_number')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'from_text')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'contents')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'status')->dropdownList(['1' => 'Active', '0' => 'Inactive']) ?>
                <?php // echo $form->field($model, 'created_by')->textInput() ?>
                <?php // echo $form->field($model, 'updated_by')->textInput() ?>
                <?php // echo $form->field($model, 'created_at')->textInput() ?>
                <?php // echo $form->field($model, 'updated_at')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
