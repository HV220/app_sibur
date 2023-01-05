<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Class m230103_122606_mock_create_user
 */
class m230103_122606_mock_create_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (YII_ENV_DEV) {
            $auth = Yii::$app->authManager;

            $developerRole = $auth->createRole('Developer');

            $auth->add($developerRole);

            $permissions = $auth->getPermissions();

            foreach ($permissions as $permission) {
                $auth->addChild($developerRole, $permission);
            }

            $this->batchInsert(
                'user',
                ['email', 'auth_key', 'surname', 'name', 'password_hash', 'created_at', 'updated_at'],
                [
                    [
                        'test@mail.ru',
                        'test',
                        'surname',
                        'name',
                        '$2y$13$DlHGpyqt4gLQaTymkGoRR.gPDBKCTDTrB/xarORCVa4WkGJyCJuFC',
                        '0',
                        '0',
                    ],
                ]
            );

            $auth->assign($developerRole, $this->db->lastInsertID);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
