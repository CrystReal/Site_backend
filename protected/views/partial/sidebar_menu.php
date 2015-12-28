<ul class="page-sidebar-menu">
    <li>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    </li>
    <li class="<?php isActiveController("dashboard"); ?>">
        <a href="/">
            <i class="fa fa-home"></i>
            <span class="title">Сводка</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="<?php isActiveController("support"); ?>">
        <a href="<?php echo $this->createUrl("/support/support/index"); ?>">
            <i class="fa fa-question"></i>
            <span class="title">Тех. поддержка</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="<?php isActiveController("news"); ?>">
        <a href="<?php echo $this->createUrl("/core/news/index"); ?>">
            <i class="fa fa-rss-square"></i>
            <span class="title">Новости</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="<?php isActiveController("static"); ?>">
        <a href="<?php echo $this->createUrl("/core/static/index"); ?>">
            <i class="fa fa-paperclip"></i>
            <span class="title">Статика</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="<?php isActiveController("blocks"); ?>">
        <a href="<?php echo $this->createUrl("/core/blocks/index"); ?>">
            <i class="fa fa-puzzle-piece"></i>
            <span class="title">Блоки</span>
            <span class="selected"></span>
        </a>
    </li>
    <?php if (Yii::app()->user->model->rang == 1) { ?>
        <li class="<?php isActiveController("announcer"); ?>">
            <a href="<?php echo $this->createUrl("/core/announcer/index"); ?>">
                <i class="fa fa-bullhorn"></i>
                <span class="title">Анонсер</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="<?php isActiveController("servers"); ?>">
            <a href="<?php echo $this->createUrl("/core/servers/index"); ?>">
                <i class="fa fa-cloud"></i>
                <span class="title">Сервера</span>
                <span class="selected"></span>
            </a>
        </li>
    <?php } ?>
    <li class="<?php isActiveController("settings"); ?>">
        <a href="<?php echo $this->createUrl("/core/settings/index"); ?>">
            <i class="fa fa-cog"></i>
            <span class="title">Настройки</span>
            <span class="selected"></span>
        </a>
    </li>
</ul>

<?php
function isActiveModule($name)
{
    if (isset(Yii::app()->controller->module) && $name == Yii::app()->controller->module->getName())
        echo " active ";
}

function isActiveController($name)
{
    if (isset(Yii::app()->controller) && $name == Yii::app()->controller->id)
        echo " active ";
}

function isActiveModuleAndController($module, $controller)
{
    if (isset(Yii::app()->controller->module) && $module == Yii::app()->controller->module->getName() && isset(Yii::app()->controller) && $controller == Yii::app()->controller->id)
        echo " active ";
}