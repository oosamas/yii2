<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Subject;
use backend\modules\student_management\models\Grade;

/**
 * @var yii\web\View $this
 * @var backend\modules\elearning\models\search\LessonTestSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Lesson Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-test-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Lesson Test', ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['attribute' => 'subject_id', 'label' => 'Subject', 
                    'value' => function($model){
                        return $model->subject->title;
                    }, 
                    'filter' => ArrayHelper::map(Subject::find()->all(), 'id', 'title'),],
                    'chapter_id',
                    'lesson_id',
                    'title',
                    // 'content:ntext',
                    // 'status',
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
