<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var backend\modules\elearning\models\search\LessonReadSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Lessons Read';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-read-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Lesson Read', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',

                    ['attribute' => 'lesson_id', 'label' => 'Student', 
                    'value' => function($model){
                        return $model->student->full_name;
                    }, 
                    // 'filter' => ArrayHelper::map(Subject::find()->all(), 'id', 'title'),
                  ],

                    ['attribute' => 'lesson_id', 'label' => 'Lesson', 
                    'value' => function($model){
                      if ($model->lesson) {
                        return $model->lesson->title;
                      }
                    }, 
                    // 'filter' => ArrayHelper::map(Subject::find()->all(), 'id', 'title'),
                  ],
                    'lesson_id',
                    'student_id',
                    'score',
                    'status',
                    // 'created_by',
                    // 'updated_by',
                    // 'created_at',
                    // 'updated_at',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
