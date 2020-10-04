<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "widget_text".
 *
 * @property int $id
 * @property string $key
 * @property string $title
 * @property string $body
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class WidgetText extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widget_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'title', 'body'], 'required'],
            [['body'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['key', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'title' => 'Title',
            'body' => 'Body',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\WidgetTextQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\WidgetTextQuery(get_called_class());
    }
}
