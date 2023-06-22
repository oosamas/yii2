<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\modules\student_management\models\UserSubscription $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="user-subscription-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'user_id')->textInput() ?>
                <?php echo $form->field($model, 'subscription_id')->textInput() ?>
                <?php echo $form->field($model, 'student_id')->textInput() ?>
                <?php echo $form->field($model, 'subject_id')->textInput() ?>
                <?php echo $form->field($model, 'fee')->textInput() ?>
                <?php echo $form->field($model, 'status')->textInput() ?>
                <?php echo $form->field($model, 'expiry_date')->textInput() ?>
                <?php // echo $form->field($model, 'created_by')->textInput() ?>
                <?php // echo $form->field($model, 'updated_by')->textInput() ?>
                <?php //echo $form->field($model, 'created_at')->textInput() ?>
                <?php //echo $form->field($model, 'updated_at')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
