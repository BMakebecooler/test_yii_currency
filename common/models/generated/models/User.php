<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_hash
 * @property string|null $oauth_client
 * @property string|null $oauth_client_user_id
 * @property string $email
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $logged_at
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 * @property UserProfile $userProfile
 */
class User extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'access_token', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'logged_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 40],
            [['password_hash', 'oauth_client', 'oauth_client_user_id', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'password_hash' => 'Password Hash',
            'oauth_client' => 'Oauth Client',
            'oauth_client_user_id' => 'Oauth Client User ID',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'logged_at' => 'Logged At',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\ArticleQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Articles0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\ArticleQuery
     */
    public function getArticles0()
    {
        return $this->hasMany(Article::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[UserProfile]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\UserProfileQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\UserQuery(get_called_class());
    }
}
