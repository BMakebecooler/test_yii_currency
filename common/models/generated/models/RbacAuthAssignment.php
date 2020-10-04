<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "rbac_auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property RbacAuthItem $itemName
 */
class RbacAuthAssignment extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbac_auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => RbacAuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ItemName]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\RbacAuthItemQuery
     */
    public function getItemName()
    {
        return $this->hasOne(RbacAuthItem::className(), ['name' => 'item_name']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\RbacAuthAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\RbacAuthAssignmentQuery(get_called_class());
    }
}
