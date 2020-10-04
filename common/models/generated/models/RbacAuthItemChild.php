<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "rbac_auth_item_child".
 *
 * @property string $parent
 * @property string $child
 *
 * @property RbacAuthItem $child0
 * @property RbacAuthItem $parent0
 */
class RbacAuthItemChild extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbac_auth_item_child';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64],
            [['parent', 'child'], 'unique', 'targetAttribute' => ['parent', 'child']],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => RbacAuthItem::className(), 'targetAttribute' => ['parent' => 'name']],
            [['child'], 'exist', 'skipOnError' => true, 'targetClass' => RbacAuthItem::className(), 'targetAttribute' => ['child' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parent' => 'Parent',
            'child' => 'Child',
        ];
    }

    /**
     * Gets query for [[Child0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\RbacAuthItemQuery
     */
    public function getChild0()
    {
        return $this->hasOne(RbacAuthItem::className(), ['name' => 'child']);
    }

    /**
     * Gets query for [[Parent0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\RbacAuthItemQuery
     */
    public function getParent0()
    {
        return $this->hasOne(RbacAuthItem::className(), ['name' => 'parent']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\RbacAuthItemChildQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\RbacAuthItemChildQuery(get_called_class());
    }
}
