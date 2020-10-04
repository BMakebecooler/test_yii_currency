<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string|null $system_id
 * @property string|null $char_code
 * @property string|null $num_code
 * @property int|null $nominal
 * @property string|null $name
 * @property float|null $rate
 * @property int|null $date_added
 * @property int|null $date_updated
 */
class Currency extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nominal', 'date_added', 'date_updated'], 'integer'],
            [['rate'], 'number'],
            [['system_id'], 'string', 'max' => 32],
            [['char_code', 'num_code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 256],
            [['char_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system_id' => 'System ID',
            'char_code' => 'Char Code',
            'num_code' => 'Num Code',
            'nominal' => 'Nominal',
            'name' => 'Name',
            'rate' => 'Rate',
            'date_added' => 'Date Added',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\CurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\CurrencyQuery(get_called_class());
    }
}
