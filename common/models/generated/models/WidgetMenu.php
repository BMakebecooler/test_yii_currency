<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "widget_menu".
 *
 * @property int $id
 * @property string $key
 * @property string $title
 * @property string $items
 * @property int $status
 */
class WidgetMenu extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widget_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'title', 'items'], 'required'],
            [['items'], 'string'],
            [['status'], 'integer'],
            [['key'], 'string', 'max' => 32],
            [['title'], 'string', 'max' => 255],
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
            'items' => 'Items',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\WidgetMenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\WidgetMenuQuery(get_called_class());
    }
}
