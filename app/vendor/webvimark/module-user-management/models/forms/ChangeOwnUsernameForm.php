<?php
namespace webvimark\modules\UserManagement\models\forms;

use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\base\Model;
use Yii;

class ChangeOwnUsernameForm extends Model
{

	/**
	 * @var string
	 */
	public $username;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['username'], 'required'],
            [['username'], 'string', 'max' => 255],
			['username', 'validateUsername'],
		];
	}

	public function attributeLabels()
	{
		return [
			'username' => UserManagementModule::t('back', 'Username'),
		];
	}


	/**
	 * Validates current password
	 */
	public function validateUsername()
	{
        $exists = User::findOne(['username' => $this->username]);
		if( $exists )
        {
            $this->addError('username', 'Ez a felhasználónév már foglalt.');
            return false;
        }
	}
}
