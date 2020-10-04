<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "user_token".
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $token
 * @property int|null $expire_at
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class UserToken extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'token'], 'required'],
            [['user_id', 'expire_at', 'created_at', 'updated_at'], 'integer'],
            [['type'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'token' => 'Token',
            'expire_at' => 'Expire At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\UserTokenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\UserTokenQuery(get_called_class());
    }
}
