<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\modules\student_management\models\UserSubscription $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="user-subscription-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'user_id') ?>
    <?php echo $form->field($model, 'subscription_id') ?>
    <?php echo $form->field($model, 'student_id') ?>
    <?php echo $form->field($model, 'subject_id') ?>
    <?php // echo $form->field($model, 'fee') ?>
    <?php // echo $form->field($model, 'status') ?>
    <?php // echo $form->field($model, 'expiry_date') ?>
    <?php // echo $form->field($model, 'created_by') ?>
    <?php // echo $form->field($model, 'updated_by') ?>
    <?php // echo $form->field($model, 'created_at') ?>
    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
