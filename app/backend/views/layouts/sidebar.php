<?php

declare(strict_types=1);

/* @var View $this */

/* @var false|string $assetDir */

use hail812\adminlte\widgets\Menu;
use yii\web\View;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/index.php" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="formular" class="brand-image img-circle elevation-3"
             style="opacity: .8;">
        <span class="brand-text font-weight-light">Формуляр</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <?php
            echo Menu::widget([
                'items' => [
                    [
                        'label' => 'Главная страница',
                        'icon' => 'tachometer-alt',
                    ],
                    [
                        'label' => 'Объекты',
                        'icon' => 'tachometer-alt',
                    ],
                    [
                        'label' => 'История',
                        'icon' => 'tachometer-alt',
                    ],
                    [
                        'label' => 'Уведомления',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-danger">New</span>',
                    ],
                    [
                        'label' => 'Документация',
                        'icon' => 'tachometer-alt',
                    ],
                    [
                        'label' => 'Поддержка',
                        'icon' => 'tachometer-alt',
                    ],
                    ['label' => 'Админка', 'header' => true, 'visible' => Yii::$app->user->can('Developer')],
                    [
                        'label' => 'Пользователи',
                        'url' => ['user/index'],
                        'icon' => 'tachometer-alt',
                        'visible' => Yii::$app->user->can('user/index')
                    ],
                    ['label' => 'Профиль', 'header' => true],
                    [
                        'label' => 'Login',
                        'url' => ['site/login'],
                        'icon' => 'sign-in-alt',
                        'visible' => Yii::$app->user->isGuest
                    ],
                    [
                        'label' => 'Logout',
                        'url' => ['site/logout'],
                        'icon' => 'sign-in-alt',
                        'visible' => !Yii::$app->user->isGuest
                    ],
                    // todo вывести данные пользователя
                ],
            ]); ?>
</aside>
