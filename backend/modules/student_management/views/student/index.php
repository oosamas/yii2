<?php

use app\models\Subject;
use backend\modules\student_management\models\Grade;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var backend\modules\student_management\models\search\StudentSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['attribute' => 'parent_id', 'label' => 'Parent',
                     'value' => function($model){
                      return $model->parent->username;},
                    ],
                    'full_name',
                    ['attribute' => 'grade_id', 'label' => 'Grade', 
                    'value' => function($model){
                        return $model->grade->description;
                    },
                    'filter' => ArrayHelper::map(Grade::find()->all(), 'id', 'title'),],

                //'points', //OSB: add points to student class
                    // 'grade_id',
                    // 'live_support', //OSB: add live support
                    ['attribute' => 'status', 'value' => function($model){return $model->status == 1 ? 'Active' : 'Inactive';}],
                    // 'created_by',
                    // 'updated_by',
                    // 'updated_at',
                    'created_at:date',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
