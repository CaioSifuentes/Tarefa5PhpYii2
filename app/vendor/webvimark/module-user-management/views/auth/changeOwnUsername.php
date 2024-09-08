<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var \webvimark\modules\UserManagement\models\forms\ChangeOwnUsernameForm $model
 */

$this->title = 'Felhasználónév módosítása';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-own-password">

	<h2 class="lte-hide-title"><?= $this->title ?></h2>

	<div class="panel panel-default">
		<div class="panel-body">

			<div class="user-form">

				<?php $form = ActiveForm::begin([
					'id'=>'user',
					'layout'=>'horizontal',
					'validateOnBlur'=>false,
				]); ?>

				<?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

                <hr/>

                <?= Html::submitButton(
                    '<i class="fas fa-arrow-right"></i> ' . UserManagementModule::t('back', 'Save'),
                    ['class' => 'btn btn-primary']
                ) ?>

				<?php ActiveForm::end(); ?>

			</div>
		</div>
	</div>

</div>
