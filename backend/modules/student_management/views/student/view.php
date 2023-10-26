<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

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
                    'value' => function($model){
                      if ($model->parent) {
                        return $model->parent->userProfile->firstname." ".$model->parent->userProfile->lastname;
                      }
                      // else {
                      //   return $model->parent->username;
                      // }
                    }, 
                    // 'value' => 
                    //  $model->parent->userProfile->firstname." ".$model->parent->userProfile->lastname
                    
                     //  'value' => $model->parent->username
                  ],
                    'full_name',
                    // 'email:email',
                    // ['attribute' => 'parent_id', 'label' => 'Email',
                    //  'value' => $model->parent->email],
                    // 'details',
                    ['attribute' => 'grade.title', 'label' => 'Grade'],
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
    <div class="card">
        <div class="card-header">
          <h2>Student Progress Report</h2>
        </div>
        <div class="card-body">
          <?php
           $query = \backend\modules\elearning\models\LessonRead::find();
$query->where(['student_id'=>$model->id]);
        
$dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => ['pageSize' => Yii::$app->request->cookies->getValue('_grid_page_size', 1000),
                ],
    'sort'=>['defaultOrder'=>['id'=>SORT_DESC,]],
]);
?>
        <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',

                  //   ['attribute' => 'lesson_id', 'label' => 'Student', 
                  //   'value' => function($model){
                  //       return $model->student->full_name;
                  //   }, 
                  //   // 'filter' => ArrayHelper::map(Subject::find()->all(), 'id', 'title'),
                  // ],

                    ['attribute' => 'lesson_id', 'label' => 'Lesson', 
                    'value' => function($model){
                      if ($model->lesson) {
                        return $model->lesson->title;
                      }
                    }, 
                    // 'filter' => ArrayHelper::map(Subject::find()->all(), 'id', 'title'),
                  ],
                    'lesson_id',
                    // 'student_id',
                    'score',
                    'date:date',
                    // 'status',
                    // 'created_by',
                    // 'updated_by',
                    // 'created_at',
                    // 'updated_at',
                    
                    // ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
    </div>

</div>
