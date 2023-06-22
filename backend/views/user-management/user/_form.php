<?php

use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use webvimark\extensions\BootstrapSwitch\BootstrapSwitch;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\User $model
 * @var yii\bootstrap\ActiveForm $form
 */
$rolesArray = ['user'=>'Student'];

if(Yii::$app->user->role =='student-admin')
$rolesArray = ['general-manager'  =>'General Manager', 'teacher'=>'Teacher', 'accounts-manager'=>'Accounts Manager',
    'teacher'=>'Teacher', 'user'=>'Student'];
else if(Yii::$app->user->role =='general-manager')
$rolesArray = ['teacher'=>'Teacher', 'user'=>'Student'
    ];
//if(Yii::$app->user->isSuperadmin or User::hasPermission('assignRolesToUsers')){
//    $rolesArray = array_merge($rolesArray, ['manager'=> 'manager']);
//}
?>

<div class="user-form">

	<?php $form = ActiveForm::begin([
		'id'=>'user',
		'layout'=>'horizontal',
		'validateOnBlur' => false,
	]); ?>

	<?= $form->field($model->loadDefaultValues(), 'status')
		->dropDownList(User::getStatusList()) ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

	<?php if ( $model->isNewRecord ): ?>

		<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

		<?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
	<?php endif; ?>


	<?php if ( User::hasPermission('bindUserToIp') ): ?>

		<?= $form->field($model, 'bind_to_ip')
			->textInput(['maxlength' => 255])
			->hint(UserManagementModule::t('back','For example: 123.34.56.78, 168.111.192.12')) ?>

	<?php endif; ?>

	<?php if ( User::hasPermission('editUserEmail') ): ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
		<?= $form->field($model, 'email_confirmed')->checkbox() ?>

	<?php endif; ?>


	
    
        <?php if ( User::hasPermission('assignRolesToUsers') ): ?>
    
        <div class="form-group">
            <?php 
                    $role = Yii::$app->request->post('user_role')? 
                            Yii::$app->request->post('user_role'): Yii::$app->request->get('user_role'); 
                    if($model->isNewRecord){
                        
                            $roleName =  ($role != "" ? 
                                 $role: '');
                    }else{
                        $roleName = $model->roles[0]->name !=""? $model->roles[0]->name : "" ;
                    }
            ?>        
                 <?php echo HTML::label('User Type ('.$roleName.')','user_role',['class'=>'control-label col-sm-3']); ?>
               
		
                <?php         echo HTML::radioList('user_role',$roleName
                        ,$rolesArray,['class'=> 'col-sm-6']);?>
				<?php if(Yii::$app->user->role == 'student-admin'): ?>		
				<?= $form->field($model, 'user_student_id')->textInput(['maxlength' => 5, 'autocomplete'=>'off']) ?>
				<?php endif;?>
        </div> 
    <div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<?php if ( $model->isNewRecord ): ?>
				<?= Html::submitButton(
					'<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Create'),
					['class' => 'btn btn-success']
				) ?>
			<?php else: ?>
				<?= Html::submitButton(
					'<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('back', 'Save'),
					['class' => 'btn btn-primary']
				) ?>
			<?php endif; ?>
		</div>
	</div>

	<?php endif; ?>

	<?php ActiveForm::end(); ?>

</div>

<?php BootstrapSwitch::widget() ?>