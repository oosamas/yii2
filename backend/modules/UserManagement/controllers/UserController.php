<?php

namespace backend\modules\UserManagement\controllers;

use webvimark\components\AdminDefaultController;
use Yii;
//use webvimark\modules\UserManagement\models\User;
use backend\modules\UserManagement\models\Parentuser as User;
use backend\modules\UserManagement\models\UserProfile ;
use backend\modules\UserManagement\models\search\UserSearch;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AdminDefaultController
{
	/**
	 * @var User
	 */
	public $modelClass = 'backend\modules\UserManagement\models\Parentuser';

	/**
	 * @var UserSearch
	 */
	public $modelSearchClass = 'backend\modules\UserManagement\models\search\UserSearch';
        
        /**
	 * Lists all models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = $this->modelSearchClass ? new $this->modelSearchClass : null;

		if ( $searchModel )
		{
			$queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
                !isset($queryParams["UserSearch"]["status"]) || ($queryParams["UserSearch"]["status"] == "")?
                $queryParams["UserSearch"]["status"] = 1: $queryParams["UserSearch"]["status"] ; 
                $queryParams["UserSearch"]["company_id"] = 
                         !Yii::$app->user->isSuperadmin ? Yii::$app->user->profile->company->id
                         : ""; //$queryParams["UserSearch"]["company_id"] ;

                $dataProvider = $searchModel->search($queryParams);
		}
		else
		{
			$modelClass = $this->modelClass;
			$dataProvider = new ActiveDataProvider([
				'query' => $modelClass::find(),
			]);
		}

		return $this->renderIsAjax('index', compact('dataProvider', 'searchModel'));
	}

        
	/**
	 * @return mixed|string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new User(['scenario'=>'newUser']);

		//if ( $model->load(Yii::$app->request->post()) && $model->save() )
		if ( $model->load(Yii::$app->request->post()) && $model->save() )
		{
                    $model->assignRole($model->id, $_POST['user_role']);
                    try{              
                    $userProfile = new UserProfile;
                    $userProfile->user_id = $model->id;
                    $userProfile->full_name = $model->username;
                    $userProfile->save();

                    } catch (PDOException $e) {
                        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
                    } catch (Exception $e) {
                      echo "General Error: The user could not be added.<br>".$e->getMessage();
                    }
                        return $this->redirect(['view',	'id' => $model->id]);
		}

		return $this->renderIsAjax('create', compact('model'));
	}

	/**
	 * @param int $id User ID
	 *
	 * @throws \yii\web\NotFoundHttpException
	 * @return string
	 */
	public function actionChangePassword($id)
	{
		$model = User::findOne($id);

		if ( !$model )
		{
			throw new NotFoundHttpException('User not found');
		}

		$model->scenario = 'changePassword';

		if ( $model->load(Yii::$app->request->post()) && $model->save() )
		{
			return $this->redirect(['view',	'id' => $model->id]);
		}

		return $this->renderIsAjax('changePassword', compact('model'));
	}

}
