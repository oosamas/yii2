<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\modules\student_management\models\Notes $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="notes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'student_id') ?>
    <?php echo $form->field($model, 'slug') ?>
    <?php echo $form->field($model, 'title') ?>
    <?php echo $form->field($model, 'body') ?>
    <?php // echo $form->field($model, 'view') ?>
    <?php // echo $form->field($model, 'category_id') ?>
    <?php // echo $form->field($model, 'thumbnail_base_url') ?>
    <?php // echo $form->field($model, 'thumbnail_path') ?>
    <?php // echo $form->field($model, 'status') ?>
    <?php // echo $form->field($model, 'created_by') ?>
    <?php // echo $form->field($model, 'updated_by') ?>
    <?php // echo $form->field($model, 'published_at') ?>
    <?php // echo $form->field($model, 'created_at') ?>
    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
