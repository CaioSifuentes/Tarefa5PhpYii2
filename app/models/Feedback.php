<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $email
 * @property string|null $feedback
 * @property int|null $idade
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'feedback'], 'string'],
            [['idade'], 'default', 'value' => null],
            [['idade'], 'integer'],
            [['email'], 'email','checkDNS'=> true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'E-mail',
            'feedback' => 'Feedback',
            'idade' => 'Idade',
        ];
    }
}
