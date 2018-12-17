<?php
use backend\helpers\TemplateHelper;
use yii\helpers\Url;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <a href="<?=Url::toRoute(['users/profile'])?>" class="pull-left image">
            </a>
            <div class="pull-left info">
                <p>TEST</p>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget([
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => Yii::$app->menu->getItems(),
                'defaultIconHtml' => '<i class="fa fa-angle-right"></i>',
            ]
        ) ?>

    </section>

</aside>
