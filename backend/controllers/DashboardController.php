<?php

namespace backend\controllers;

use backend\models\search\TimelineEventSearch;
use webvimark\components\AdminDefaultController;
use Yii;
use yii\web\Controller;

/**
 * Description of DashboardController
 *
 * @author Analyst
 */
class DashboardController extends AdminDefaultController
{
  public $layout = 'common';
  //    public $freeAccess = true;
  protected $courseArray = array();
  /**
   * Lists all TimelineEvent models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new TimelineEventSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->sort = [
      'defaultOrder' => ['created_at' => SORT_DESC]
    ];
    $intake = \backend\modules\studentms\models\Intake::find()->admission()->one();
    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,  'intake' => $intake
    ]);
  }

  public function actionApplicationReports()
  {
    $searchModel = new TimelineEventSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->sort = [
      'defaultOrder' => ['created_at' => SORT_DESC]
    ];
    $intake = \backend\modules\studentms\models\Intake::find()->admission()->one();
    return $this->render('application-reports', ['reports' => $this->getReport($intake->id),   'intake' => $intake]);
  }

  public function actionDataReports()
  {

    $dataReport = $this->dataReport();
    $applicationDataReport = $this->applicationDataReport();
    return $this->render('data-reports', ['dataReport' => $dataReport, 'applicationDataReport' => $applicationDataReport]);
  }

  protected function getReport($intake = null,  $month = null, $year = null)
  {
    $reportTypes = ['proposed_programme', 'ethnicity', 'campus_location', 'mode_of_study', 'nationality', 'gender'];

    foreach ($reportTypes as  $reportType) {

      $report[$reportType] = \frontend\modules\studentms\models\ApplicationDetail::find()
        ->select('intake_id, ' . $reportType . ',  count(application_id) application_count')
        ->andWhere(['not', [$reportType => null]])
        ->andWhere(['intake_id' => $intake])
        //                ->andWhere(['MONTH(DATE)' => $month, 'Year(DATE)' => $year] )
        //                ->andWhere(['hospital_id' => Yii::$app->user->hospital->id, 'status'=>1] )
        ->groupBy($reportType)->orderBy(['application_count' => SORT_DESC])->all();
    }
    return $report;
  }

  protected function dataReport()
  {

    $data = array();
    $courseArray = array();

    $studentObj = \backend\modules\studentms\models\Student::find();

    foreach (\backend\modules\studentms\models\Course::findAll(['status' => 1]) as $course) {
      $courseArray[$course->id]['title'] = $course->title;
    }
    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      ->where(['status' => 1])->groupBy('course_id')
      ->all()  as $course) {
      $courseArray[$course->course_id]['student_count'] = $course->student_count;
    }
    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      ->where(['status' => 1, 'gender' => 'male'])->groupBy('course_id')
      ->all()  as $course) {
      $courseArray[$course->course_id]['male_count'] = $course->student_count;
    }
    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      ->where(['status' => 1, 'gender' => 'female'])->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['female_count'] = $course->student_count;
    }
    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      ->leftJoin('application_detail as app', 'student.application_id = app.application_id')
      ->where(['student.status' => 1, 'app.applicant_type' => 0])
      ->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['ukstudent_count'] = $course->student_count;
    }
    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      ->leftJoin('application_detail as appd', 'student.application_id = appd.application_id')
      ->where(['student.status' => 1, 'appd.applicant_type' => 1])
      ->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['overseastudent_count'] = $course->student_count;
    }
    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      //                ->leftJoin('application_detail as appe', 'student.application_id = appe.application_id')
      ->where(['student.status' => 1])
      ->andWhere(['in', 'ethinicity', [10, 13, 14, 16, 19]])
      ->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['whitestudent_count'] = $course->student_count;
    }

    foreach (\backend\modules\studentms\models\Student::find()->select(['COUNT(student.id) as student_count', 'course_id'])
      ->leftJoin('student_information as ust_info', 'student.id = ust_info.student_id')
      ->where(['student.status' => 1,])
      ->andWhere(['>', 'ust_info.date_of_birth', '2000-01-01'])
      ->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['tw_count'] = $course->student_count;
    }

    foreach (\backend\modules\studentms\models\Student::find()->select(['COUNT(student.id) as student_count', 'course_id'])
      ->leftJoin('student_information as st_info', 'student.id = st_info.student_id')
      ->where(['student.status' => 1,])
      ->andWhere(['<', 'st_info.date_of_birth', '2000-01-01'])
      ->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['twplus_count'] = $course->student_count;
    }

    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      //                ->leftJoin('application_detail as appe', 'student.application_id = appe.application_id')
      ->where(['student.status' => 1])
      ->andWhere(['not in', 'ethinicity', [10, 13, 14, 16, 19]])
      ->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['otherstudent_count'] = $course->student_count;
    }

    foreach ($studentObj->select(['COUNT(student.id) as student_count', 'course_id'])
      ->leftJoin('application_detail as appdis', 'student.application_id = appdis.application_id')
      ->where(['student.status' => 1,])
      ->andWhere(['!=', 'appdis.disablity_health_condition', NULL])
      ->groupBy('course_id')->all()  as $course) {
      $courseArray[$course->course_id]['disable_count'] = $course->student_count;
    }





    return $courseArray;
  }


  protected function applicationDataReport()
  {

    $data = array();
    $courseArray = array();

    $intake = \backend\modules\studentms\models\Intake::find()->admission()->one();

    $applicationObj = \frontend\modules\studentms\models\ApplicationDetail::find();


    foreach (\backend\modules\studentms\models\Course::findAll(['status' => 1]) as $course) {
      $courseArray[$course->id]['title'] = $course->title;
    }

    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id])->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['application_count'] = $course->application_count;
    }

    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id, 'status' => 0])->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['pending_count'] = $course->application_count;
    }
    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id, 'status' => 0])->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['pending_count'] = $course->application_count;
    }

    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id, 'status' => 1])->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['approved_count'] = $course->application_count;
    }
    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id, 'status' => 5])
      //->andWhere(['IS NOT', 'agreement_consent', NULL ])
      ->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['inprogress_count'] = $course->application_count;
    }
    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id, 'status' => 4])->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['deffered_count'] = $course->application_count;
    }
    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id, 'status' => 10])->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['enrolled_count'] = $course->application_count;
    }

    foreach ($applicationObj->select(['COUNT(application_id) as application_count', 'proposed_programme'])
      ->where(['intake_id' => $intake->id, 'status' => -10])->groupBy('proposed_programme')
      ->all()  as $course) {
      $courseArray[$course->proposed_programme]['withdrawn_count'] = $course->application_count;
    }



    return $courseArray;
  }
}
