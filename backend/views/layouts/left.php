<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => Yii::t('ui', 'Главная страница'), 'url' => ['/site/index'], 'icon' => 'home'],
                    [
                        'label' => Yii::t('ui', "Справочники"),
                        'icon' => 'folder',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('ui', 'Ученики'), 'icon' => 'file', 'url' => ['/catalog/pupil/index']],
                            ['label' => Yii::t('ui', 'Учителя'), 'icon' => 'file', 'url' => ['/catalog/teacher/index']],
                            ['label' => Yii::t('ui', 'Предметы'), 'icon' => 'file', 'url' => ['/catalog/subject/index']],
                            ['label' => Yii::t('ui', 'Комнаты'), 'icon' => 'file', 'url' => ['/catalog/room/index']],
                        ],
                    ],
                    ['label' => Yii::t('ui', 'Clients'), 'url' => ['/catalog/client/index'], 'icon' => 'users'],
                    [
                        'label' => Yii::t('ui', 'Оплата'),
                        'icon' => 'money',
                        'url' => ['/catalog/payment/index'],
                        'items' => [
                            ['label' => Yii::t('ui', 'Все'), 'icon' => 'file', 'url' => ['/catalog/payment/index']],
                            ['label' => Yii::t('ui', 'Доход'), 'icon' => 'plus', 'url' => ['/catalog/payment/index?PaymentSearch%5Bname%5D=&PaymentSearch%5Bamount%5D=&PaymentSearch%5Bdate%5D=&PaymentSearch%5Btype%5D=1&PaymentSearch%5Bstatus%5D=']],
                            ['label' => Yii::t('ui', 'Исход'), 'icon' => 'minus', 'url' => ['/catalog/payment/index?PaymentSearch%5Bname%5D=&PaymentSearch%5Bamount%5D=&PaymentSearch%5Bdate%5D=&PaymentSearch%5Btype%5D=0&PaymentSearch%5Bstatus%5D=']],
                        ]
                    ],
                    ['label' => Yii::t('ui', 'Уведомление'), 'icon' => 'file', 'url' => ['/catalog/notification/index']],
                    [
                        'label' => Yii::t('ui', "Группы"),
                        'icon' => 'folder',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('ui', 'Все'), 'icon' => 'file', 'url' => ['/group/group/index']],
                            ['label' => Yii::t('ui', 'В ожидании'), 'icon' => 'file', 'url' => ['/group/group/pending-list']],
                            ['label' => Yii::t('ui', 'В процессе'), 'icon' => 'file', 'url' => ['/group/group/index']],
                            ['label' => Yii::t('ui', 'Законченный'), 'icon' => 'file', 'url' => ['/group/group/index?GroupSearch%5Bname%5D=&GroupSearch%5Bstart_hour%5D=&GroupSearch%5Bend_hour%5D=&GroupSearch%5Baction%5D=9&GroupSearch%5Btype%5D=&GroupSearch%5Bstatus%5D=']],
                        ],
                    ],
                ],
            ]
        ) ?>


    </section>

</aside>
