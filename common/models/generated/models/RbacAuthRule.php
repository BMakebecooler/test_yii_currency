<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "rbac_auth_rule".
 *
 * @property string $name
 * @property resource|null $data
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property RbacAuthItem[] $rbacAuthItems
 */
class RbacAuthRule extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbac_auth_rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[RbacAuthItems]].
     *
     * @return \yii\db\ActiveQuery|\common\models\generated\query\RbacAuthItemQuery
     */
    public function getRbacAuthItems()
    {
        return $this->hasMany(RbacAuthItem::className(), ['rule_name' => 'name']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\RbacAuthRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\RbacAuthRuleQuery(get_called_class());
    }
}
