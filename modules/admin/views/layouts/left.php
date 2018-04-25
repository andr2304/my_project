<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Управление', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'users-code-o', 'url' => ['/gii'], 'visible' => Yii::$app->user->can('admin')],
                    ['label' => 'Пользователи', 'url' => ['/admin/user'],'active' => Yii::$app->controller->id == 'user'],
                    ['label' => 'Заказы', 'url' => ['/admin/order'],'active' => Yii::$app->controller->id == 'order'],
                    [
                        'label' => 'Продукты',
                        'items' => [
                            ['label' => 'Категории', 'url' => ['/admin/categories'],'active' => Yii::$app->controller->id == 'categories'],
                            ['label' => 'Продукты', 'url' => ['/admin/products'],'active' => Yii::$app->controller->id == 'products'],
                            ['label' => 'Meтки', 'url' => ['/admin/tags'],'active' => Yii::$app->controller->id == 'tags'],
                            [
                                'label' => 'Атрибуты',
                                'items' => [
                                    ['label' => 'Атрибуты', 'url' => ['/admin/attributes'],'active' => Yii::$app->controller->id == 'attributes'],
                                    ['label' => 'Значения', 'url' => ['/admin/values'],'active' => Yii::$app->controller->id == 'values'],
                                ]
                            ],
                            ]
                    ],
                    ['label' => 'Комментарии', 'url' => ['/admin/comment']],
                    ['label' => 'Роли', 'url' => ['/rbac/default/index'], 'visible' => Yii::$app->user->can('admin')],
                ],
            ]
        ) ?>

    </section>

</aside>
