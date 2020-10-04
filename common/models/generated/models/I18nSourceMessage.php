<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "i18n_source_message".
 *
 * @property int $id
 * @property string|null $category
 * @property string|null $message
 *
 * @property I18nMessage[] $i18nMessages
 */
class I18nSourceMessage extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'i18n_source_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'message' => 'Message',
        ];
    }

    /**
     * Gets query for [[I18nMessages]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\I18nMessageQuery
     */
    public function getI18nMessages()
    {
        return $this->hasMany(I18nMessage::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\I18nSourceMessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\I18nSourceMessageQuery(get_called_class());
    }
}
