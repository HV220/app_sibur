<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230101_122604_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey()->comment('ИД'),
            'email' => $this->string()->notNull()->unique()->comment('Электронная почта'),
            'auth_key' => $this->string(32)->notNull()->comment('Ключ аунтификации'),
            'surname' => $this->string()->notNull()->comment('Фамилия'),
            'name' => $this->string()->notNull()->comment('Имя'),
            'patronymic' => $this->string()->comment('Отчество'),
            'position_id' => $this->integer()->notNull()->comment('Должность'),
            'status' => $this->smallInteger()->notNull()->defaultValue(10)->comment('Статус'),
            'verification_token' => $this->string()->defaultValue(null)->comment('Токен верификации'),
            'password_hash' => $this->string()->notNull()->comment('Хэш пароля'),
            'password_reset_token' => $this->string()->unique()->comment('Токен сброса пароля'),
            'created_at' => $this->integer()->notNull()->comment('Создано'),
            'updated_at' => $this->integer()->notNull()->comment('Обновлено'),
        ]);

        $this->createTable('{{%position}}', [
            'id' => $this->primaryKey()->comment('ИД'),
            'name' => $this->string()->notNull()->comment('Должность'),
        ]);

        $this->addForeignKey('FK_user_position', 'user', 'position_id', 'position', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_user_position', 'user');
        $this->dropTable('{{%position}}');
        $this->dropTable('{{%user}}');
    }
}
