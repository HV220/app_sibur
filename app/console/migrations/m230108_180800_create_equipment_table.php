<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%manufacturer}}`
 * - `{{%device}}`
 */
class m230108_180800_create_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'manufacturer_id' => $this->integer()->notNull(),
            'device_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `manufacturer_id`
        $this->createIndex(
            '{{%idx-equipment-manufacturer_id}}',
            '{{%equipment}}',
            'manufacturer_id'
        );

        // add foreign key for table `{{%manufacturer}}`
        $this->addForeignKey(
            '{{%fk-equipment-manufacturer_id}}',
            '{{%equipment}}',
            'manufacturer_id',
            '{{%manufacturer}}',
            'id',
            'CASCADE'
        );

        // creates index for column `device_id`
        $this->createIndex(
            '{{%idx-equipment-device_id}}',
            '{{%equipment}}',
            'device_id'
        );

        // add foreign key for table `{{%device}}`
        $this->addForeignKey(
            '{{%fk-equipment-device_id}}',
            '{{%equipment}}',
            'device_id',
            '{{%device}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%manufacturer}}`
        $this->dropForeignKey(
            '{{%fk-equipment-manufacturer_id}}',
            '{{%equipment}}'
        );

        // drops index for column `manufacturer_id`
        $this->dropIndex(
            '{{%idx-equipment-manufacturer_id}}',
            '{{%equipment}}'
        );

        // drops foreign key for table `{{%device}}`
        $this->dropForeignKey(
            '{{%fk-equipment-device_id}}',
            '{{%equipment}}'
        );

        // drops index for column `device_id`
        $this->dropIndex(
            '{{%idx-equipment-device_id}}',
            '{{%equipment}}'
        );

        $this->dropTable('{{%equipment}}');
    }
}
