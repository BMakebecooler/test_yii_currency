<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "driver_bus".
 *
 * @property int $id
 * @property int|null $driver_id
 * @property int|null $bus_id
 *
 * @property Bus $bus
 * @property Driver $driver
 */
class DriverBus extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'driver_bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['driver_id', 'bus_id'], 'integer'],
            [['driver_id', 'bus_id'], 'unique', 'targetAttribute' => ['driver_id', 'bus_id']],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['bus_id' => 'id']],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'driver_id' => 'Driver ID',
            'bus_id' => 'Bus ID',
        ];
    }

    /**
     * Gets query for [[Bus]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\BusQuery
     */
    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['id' => 'bus_id']);
    }

    /**
     * Gets query for [[Driver]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\DriverQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'driver_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\DriverBusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\DriverBusQuery(get_called_class());
    }
}
