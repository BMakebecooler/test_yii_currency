<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "timeline_event".
 *
 * @property int $id
 * @property string $application
 * @property string $category
 * @property string $event
 * @property string|null $data
 * @property int $created_at
 */
class TimelineEvent extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timeline_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application', 'category', 'event', 'created_at'], 'required'],
            [['data'], 'string'],
            [['created_at'], 'integer'],
            [['application', 'category', 'event'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'application' => 'Application',
            'category' => 'Category',
            'event' => 'Event',
            'data' => 'Data',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\TimelineEventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\TimelineEventQuery(get_called_class());
    }
}
