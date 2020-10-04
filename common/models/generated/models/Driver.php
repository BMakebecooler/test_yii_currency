<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "driver".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $birthday
 *
 * @property Bus[] $buses
 * @property DriverBus[] $driverBuses
 */
class Driver extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 32],
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
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'birthday' => 'Birthday',
        ];
    }

    /**
     * Gets query for [[Buses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\BusQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Bus::className(), ['id' => 'bus_id'])->viaTable('driver_bus', ['driver_id' => 'id']);
    }

    /**
     * Gets query for [[DriverBuses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\DriverBusQuery
     */
    public function getDriverBuses()
    {
        return $this->hasMany(DriverBus::className(), ['driver_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\DriverQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\DriverQuery(get_called_class());
    }
}
