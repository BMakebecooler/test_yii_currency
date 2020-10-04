<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string|null $view
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Page extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'body', 'status'], 'required'],
            [['body'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['slug'], 'string', 'max' => 2048],
            [['title'], 'string', 'max' => 512],
            [['view'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body',
            'view' => 'View',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\PageQuery(get_called_class());
    }
}
