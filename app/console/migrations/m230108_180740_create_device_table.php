<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%device_type}}`
 * - `{{%status}}`
 * - `{{%manufacturer}}`
 */
class m230108_180740_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'manufacturer_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            '{{%idx-device-type_id}}',
            '{{%device}}',
            'type_id'
        );

        // add foreign key for table `{{%device_type}}`
        $this->addForeignKey(
            '{{%fk-device-type_id}}',
            '{{%device}}',
            'type_id',
            '{{%device_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `status_id`
        $this->createIndex(
            '{{%idx-device-status_id}}',
            '{{%device}}',
            'status_id'
        );

        // add foreign key for table `{{%status}}`
        $this->addForeignKey(
            '{{%fk-device-status_id}}',
            '{{%device}}',
            'status_id',
            '{{%status}}',
            'id',
            'CASCADE'
        );

        // creates index for column `manufacturer_id`
        $this->createIndex(
            '{{%idx-device-manufacturer_id}}',
            '{{%device}}',
            'manufacturer_id'
        );

        // add foreign key for table `{{%manufacturer}}`
        $this->addForeignKey(
            '{{%fk-device-manufacturer_id}}',
            '{{%device}}',
            'manufacturer_id',
            '{{%manufacturer}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%device_type}}`
        $this->dropForeignKey(
            '{{%fk-device-type_id}}',
            '{{%device}}'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            '{{%idx-device-type_id}}',
            '{{%device}}'
        );

        // drops foreign key for table `{{%status}}`
        $this->dropForeignKey(
            '{{%fk-device-status_id}}',
            '{{%device}}'
        );

        // drops index for column `status_id`
        $this->dropIndex(
            '{{%idx-device-status_id}}',
            '{{%device}}'
        );

        // drops foreign key for table `{{%manufacturer}}`
        $this->dropForeignKey(
            '{{%fk-device-manufacturer_id}}',
            '{{%device}}'
        );

        // drops index for column `manufacturer_id`
        $this->dropIndex(
            '{{%idx-device-manufacturer_id}}',
            '{{%device}}'
        );

        $this->dropTable('{{%device}}');
    }
}
