<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "key_storage_item".
 *
 * @property string $key
 * @property string $value
 * @property string|null $comment
 * @property int|null $updated_at
 * @property int|null $created_at
 */
class KeyStorageItem extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'key_storage_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['value', 'comment'], 'string'],
            [['updated_at', 'created_at'], 'integer'],
            [['key'], 'string', 'max' => 128],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'key' => 'Key',
            'value' => 'Value',
            'comment' => 'Comment',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\KeyStorageItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\KeyStorageItemQuery(get_called_class());
    }
}
