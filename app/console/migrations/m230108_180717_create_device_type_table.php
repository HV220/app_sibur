<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device_type}}`.
 */
class m230108_180717_create_device_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device_type}}');
    }
}
