<?php

/**
 * @var yii\web\View $this
 * @var backend\modules\elearning\models\LessonContent $model
 */

$this->title = 'Create Lesson Content';
$this->params['breadcrumbs'][] = ['label' => 'Lesson Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-content-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
