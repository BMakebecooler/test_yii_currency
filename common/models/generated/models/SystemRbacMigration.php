<?php

namespace common\models\generated\models;

use Yii;

/**
 * This is the model class for table "system_rbac_migration".
 *
 * @property string $version
 * @property int|null $apply_time
 */
class SystemRbacMigration extends \common\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_rbac_migration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['version'], 'required'],
            [['apply_time'], 'integer'],
            [['version'], 'string', 'max' => 180],
            [['version'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'version' => 'Version',
            'apply_time' => 'Apply Time',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\generated\query\SystemRbacMigrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\generated\query\SystemRbacMigrationQuery(get_called_class());
    }
}
