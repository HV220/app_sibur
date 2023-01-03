<?php

use yii\db\Migration;

class m230103_122605_create_rbac_user extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'user/index' => 'Страница user - просмотр',
            'user/create' => 'Страница user - создание',
            'user/update' => 'Страница user - изменение',
            'user/delete' => 'Страница user - удаление',
        ];

        foreach ($permissions as $permission => $description) {
            if (!$auth->getPermission($permission)) {
                $permission = $auth->createPermission($permission);
                $permission->description = $description;
                $auth->add($permission);
            }
        }
    }

    public function safeDown()
    {
        return true;
    }
}
