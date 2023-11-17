<?php

namespace backend\controllers;
use backend\modules\elearning\models\LessonRead;
use common\models\User;
use backend\models\search\TimelineEventSearch;
use backend\modules\student_management\models\Student;
use backend\modules\UserManagement\models\UserProfile;
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
    $studentReport=[];
    $searchModel = new TimelineEventSearch();
    $studentReport['studentLive']= $this->getLiveStudentReport();
    $studentReport['studentActive'] = $this->getActiveStudent();
    $studentReport['userActive'] = $this->getTotalUsers();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->sort = [
      'defaultOrder' => ['created_at' => SORT_DESC]
    ];
    
    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      'studentReport' => $studentReport,
    ]);
  }

  public function getLiveStudentReport()
  {
    // get a count of students that read a lesson
    // lesson_read stamps date and studentid and many lesson id
    // where date is the same, show me, students that read a lesson
    // select students from lesson_read where date= today
  //   SELECT COUNT(student_id) FROM `lesson_read` WHERE date="2023-10-17";
    
  //   $count = Yii::$app->db->createCommand('SELECT COUNT(student_id) FROM lesson_read WHERE date=:date')
  //  ->bindValue(':date', '2023-10-17')
  //  ->queryScalar();

    $query = LessonRead::find();
    $query->where(['date' => date("Y-m-d")]); // 2023-10-17
    $count = $query->count('student_id');
    return $count;

  }
  public function getActiveStudent()
  {
    $query = Student::find();
    $query->where(['status'=> 1]);
    $count= $query->count('id');
    return $count;
  }
  public function getTotalUsers()
  {
    $query = User::find();
    $query->where(['status'=> 1]);
    $count= $query->count('id');
    return $count;
  }
}
