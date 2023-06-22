<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\modules\student_management\models\Student $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    ['attribute' => 'parent_id', 'label' => 'Parent Name',
                     'value' => $model->parent->userProfile->full_name],
                    'full_name',
                    'email:email',
                    'details',
                    ['attribute' => 'grade.description', 'label' => 'Grade'],
                    // ['attribute' => 'points', 'label' => 'Points'], //OSB: add points to student class
                    ['attribute' => 'status', 'value' => $model->status == 1 ? 'Active' : 'Inactive'],
                    // 'created_by',
                    // 'updated_by',
                    // 'updated_at',
                    // 'created_at',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
