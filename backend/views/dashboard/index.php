<?php
/**
 * @author Jawwad Ahmed <jawwad.software@gmail.com>
 * @var yii\web\View $this
 */

use rmrevin\yii\fontawesome\FAS;
use miloschuman\highcharts\Highcharts;
use yii\data\ActiveDataProvider;

use yii\grid\GridView;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;



$this->title = Yii::t('backend', 'MIHE Student Management Dashboard');
$icons = [
    'user' => FAS::icon('user', ['bg-blue'])
];

$formatter = Yii::$app->formatter;
?>

<?php \yii\widgets\Pjax::begin() ?>


<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                  <h3><?php echo backend\modules\studentms\models\Student::find()->where(['status'=>1])->count();?></h3>

                <p>Live Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/studentms/student?StudentStudentSearch[status]=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <h3><?php echo frontend\modules\studentms\models\ApplicationDetail::find()->where(['intake_id'=>$intake->id])->count(); ?></h3>

                <p >Applications (<?php echo $intake->title;?>)</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!--<a href="/studentms/application-detail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
              <a href="/dashboard/application-reports" class="small-box-footer">Reports <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <?php
                  $totalDue = \backend\modules\studentms\models\StudentFee::find()->select(['amount'=>'SUM(amount)'])->where(['!=', 'status', -10])->one()->amount;
                  $totalPaid = \backend\modules\studentms\models\StudentFeePayment::find()->select(['amount'=>'SUM(amount)'])->one()->amount;
                  
                  ?>
                  <h3>£<?php echo $formatter->asDecimal($totalDue-$totalPaid);?></h3>

                <p>Fee Receivable</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/studentms/student-fee" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                  <h3><?php echo backend\modules\studentms\models\Course::find()->where(['status'=>1])->count()?></h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/studentms/course" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-dark">
              <div class="inner">
                  <h3><?php echo backend\modules\studentms\models\ModuleDetail::find()->where(['status'=>1])->count();?></h3>

                <p>Modules</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/studentms/module-detail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                  <h3><?php echo \backend\modules\studentms\models\StudentModules::find()->where(['status'=>1])->count(); ?></h3>

                  <p>Module Enrollments</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!--<a href="/studentms/application-detail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
              <a href="/studentms/student-modules" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-navy">
              <div class="inner">
                  
                  <h5>Attendance</h5>
                  <br />
                <p>Today: XXX</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/studentms/student-attendance" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-gray">
              <div class="inner">
                  <h3><?php echo backend\modules\assessmentms\models\Assessment::find()->where(['status'=>1])->count()?></h3>

                <p>Assessments</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/assessmentms/assessment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Recent Applications</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                    <?php
                        $searchModel = new backend\modules\studentms\models\search\ApplicationDetailSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $dataProvider->pagination->pageSize = 5;
//                        $dataProvider->pagination = false;
                    ?>
                  <?php echo GridView::widget([
                'layout' => "{items}\n",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    [ 'attribute' =>'application_id', 'label'=>'ID'],  
                   
//                    'title',
                    ['attribute' =>'forename', 'format'=>'html', 'value'=> function ($model){return Html::a($model->forename, '/studentms/application-detail/view?id='.$model->application_id);}],
//                    'surname',
//                     'gender',
                    
                    ['attribute' => 'proposed_programme',
                    'value'=> function($model){return substr($model->programme->title,0,15);},
                    'filter' =>   Html::dropdownList(
                    'ApplicationDetailSearch[proposed_programme]',$_GET['ApplicationDetailSearch']['proposed_programme'],
                        ArrayHelper::map( //Yii::$app->user->isSuperadmin?
                            \backend\modules\studentms\models\Course::find()
                                ->select(['id', 'title'])
                                ->where('status != 0' )->orderBY(['title'=>SORT_ASC])->all(),
//                                :
//                            Yii::$app->user->school->studentClasses, 
                                'id','title')
                               , ['class'=>'form-control', 'prompt'=>'Select Programme']
                        ),
                         'headerOptions' => ['style' => 'width:7%'],    
                    ],
//                    'date_of_birth',
//                    [ 'attribute' =>'nationality', 'label'=>'Nationality'],
                    [ 'attribute' =>'ethnicity', 'label'=>'Ethnicity', 'value' =>function($model){
                        return substr($model->ethnicityList[$model->ethnicity],0, 10);}],
//                    [ 'attribute' =>'require_visa', 'label'=>'Visa'],

//                    [ 'attribute' =>'campus_location', 'label'=>'Campus', 'value' =>function($model){
//                        return substr($model->campusLocationList[$model->campus_location], 0, 9);}],    

                    [
                        'attribute' => 'status',
                        'format'=>'applicationlabel',    
//                        'value' => function($model) { return $model->status == '1' ? 
//                                        "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>In Active</span>";},
                        'filter' =>   Html::dropdownList(
                        'ApplicationDetailSearch[status]',$_GET['ApplicationDetailSearch']['status'],
                        [ '0' => 'Pending', '5' => 'In Progress', '1' => 'Approved',
                    '-10'=> 'Rejected', '10' => 'Enrolled' ],        
                        ['class'=>'form-control', 'prompt'=>'Select Status']
                        ),
                         'contentOptions' => ['style' => 'width:50px; text-align:center']                       
                    ],        
                     'created_at:date',
                ],
            ]); ?>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <!--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>-->
                <a href="/studentms/application-detail" class="btn btn-sm btn-secondary float-right">View All Applications</a>
              </div>
              <!-- /.card-footer -->
            </div>
        
    </div>
    <div class="col-md-6">
    
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Visa Expiry</h3>

                <div class="card-tools">Next 8 weeks
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                    
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                    <?php
                        $query = backend\modules\studentms\models\Student::find()->where(['status' => 1])
                                ->andWhere(['<', 'visa_expiry', date('Y-m-d', strtotime('+ 8 weeks')) ])
                                 ->andWhere('visa_expiry is not  NULL')
                                ->orderBy(['visa_expiry'=>SORT_ASC]);

                        $provider = new ActiveDataProvider([
                            'query' => $query,
                            'pagination' => [
                                'pageSize' => 10,
                            ],
                            'sort' => [
                                'defaultOrder' => [
                                    'created_at' => SORT_DESC,
                                    'first_name' => SORT_ASC, 
                                ]
                            ],
                        ]);
                    ?>
                  <?php echo GridView::widget([
                'layout' => "{items}\n",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $provider,
//                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    ['attribute' =>'first_name',  'label'=>'Student', 'format'=>'html', 'value'=> function ($model){return Html::a($model->first_name, '/studentms/student/view?id='.$model->id);}],
                    [ 'attribute' =>'visa_expiry', 'label'=>'Expire On', 'format'=>'date'], 
                    // ['label'=>"in Days", 'format'=>'html', 'contentOptions'=>[],
                    // 'value'=> function($model) use ($formatter){
                    //     $date1=date_create($model->visa_expiry);
                    //     $date2 = date_create(date('Y-m-d'));$diff =date_diff($date1,$date2);
                    //     return ($diff->format("%a") > 15)?  "<h6><span class='badge badge-warning'>".$diff->format("%a days")."</span></h6>":
                    //          "<h5><span class='badge badge-danger'>".$diff->format("%a days")."</span><h5>"
                    //         ;}],

                ],
            ]); ?>
                </div>
                
              </div>
              <!-- /.card-body -->
              
              <!-- /.footer -->
            </div>
        
    </div>
</div>
<?php \yii\widgets\Pjax::end() ?>