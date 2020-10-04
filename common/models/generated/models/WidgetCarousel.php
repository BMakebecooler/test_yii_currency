<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "widget_carousel".
 *
 * @property int $id
 * @property string $key
 * @property int|null $status
 *
 * @property WidgetCarouselItem[] $widgetCarouselItems
 */
class WidgetCarousel extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widget_carousel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['status'], 'integer'],
            [['key'], 'string', 'max' => 255],
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
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[WidgetCarouselItems]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\WidgetCarouselItemQuery
     */
    public function getWidgetCarouselItems()
    {
        return $this->hasMany(WidgetCarouselItem::className(), ['carousel_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\WidgetCarouselQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\WidgetCarouselQuery(get_called_class());
    }
}
