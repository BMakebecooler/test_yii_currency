<?php

use yii\db\Migration;

/**
 * Class m201003_220517_add_currency_table
 */
class m201003_220517_add_currency_table extends Migration
{

    const TABLE_NAME = '{{%currency}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'system_id' => $this->string(32),
            'char_code' => $this->string(3),
            'num_code' => $this->string(3),
            'nominal' => $this->integer()->unsigned(),
            'name' => $this->string(256),
            'rate' => $this->double()->unsigned(),
            'date_added' => $this->integer()->unsigned(),
            'date_updated' => $this->integer()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx_currency_char_code', self::TABLE_NAME, 'char_code', true);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_currency_char_code', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
        return true;
    }
}
