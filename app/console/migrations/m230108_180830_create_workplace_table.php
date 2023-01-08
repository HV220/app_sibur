<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%workplace}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%status}}`
 * - `{{%equipment}}`
 */
class m230108_180830_create_workplace_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%workplace}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'equipement_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `status_id`
        $this->createIndex(
            '{{%idx-workplace-status_id}}',
            '{{%workplace}}',
            'status_id'
        );

        // add foreign key for table `{{%status}}`
        $this->addForeignKey(
            '{{%fk-workplace-status_id}}',
            '{{%workplace}}',
            'status_id',
            '{{%status}}',
            'id',
            'CASCADE'
        );

        // creates index for column `equipement_id`
        $this->createIndex(
            '{{%idx-workplace-equipement_id}}',
            '{{%workplace}}',
            'equipement_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-workplace-equipement_id}}',
            '{{%workplace}}',
            'equipement_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%status}}`
        $this->dropForeignKey(
            '{{%fk-workplace-status_id}}',
            '{{%workplace}}'
        );

        // drops index for column `status_id`
        $this->dropIndex(
            '{{%idx-workplace-status_id}}',
            '{{%workplace}}'
        );

        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-workplace-equipement_id}}',
            '{{%workplace}}'
        );

        // drops index for column `equipement_id`
        $this->dropIndex(
            '{{%idx-workplace-equipement_id}}',
            '{{%workplace}}'
        );

        $this->dropTable('{{%workplace}}');
    }
}
