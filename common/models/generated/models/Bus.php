<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $avg_speed
 *
 * @property DriverBus[] $driverBuses
 * @property Driver[] $drivers
 */
class Bus extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['avg_speed'], 'integer'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'avg_speed' => 'Avg Speed',
        ];
    }

    /**
     * Gets query for [[DriverBuses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\DriverBusQuery
     */
    public function getDriverBuses()
    {
        return $this->hasMany(DriverBus::className(), ['bus_id' => 'id']);
    }

    /**
     * Gets query for [[Drivers]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\DriverQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(Driver::className(), ['id' => 'driver_id'])->viaTable('driver_bus', ['bus_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\BusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\BusQuery(get_called_class());
    }
}
