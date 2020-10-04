<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "widget_carousel_item".
 *
 * @property int $id
 * @property int $carousel_id
 * @property string|null $base_url
 * @property string|null $path
 * @property string|null $asset_url
 * @property string|null $type
 * @property string|null $url
 * @property string|null $caption
 * @property int $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property WidgetCarousel $carousel
 */
class WidgetCarouselItem extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widget_carousel_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carousel_id'], 'required'],
            [['carousel_id', 'status', 'order', 'created_at', 'updated_at'], 'integer'],
            [['base_url', 'path', 'asset_url', 'url', 'caption'], 'string', 'max' => 1024],
            [['type'], 'string', 'max' => 255],
            [['carousel_id'], 'exist', 'skipOnError' => true, 'targetClass' => WidgetCarousel::className(), 'targetAttribute' => ['carousel_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carousel_id' => 'Carousel ID',
            'base_url' => 'Base Url',
            'path' => 'Path',
            'asset_url' => 'Asset Url',
            'type' => 'Type',
            'url' => 'Url',
            'caption' => 'Caption',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Carousel]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\WidgetCarouselQuery
     */
    public function getCarousel()
    {
        return $this->hasOne(WidgetCarousel::className(), ['id' => 'carousel_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\WidgetCarouselItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\WidgetCarouselItemQuery(get_called_class());
    }
}
