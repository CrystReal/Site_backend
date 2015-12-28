<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            <?php if ($model->isNewRecord) echo "Создание анонса"; else echo "Редактирование анонса"; ?>
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->createUrl("index"); ?>">Аннонсер</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">
                    <?php if ($model->isNewRecord) echo "Создание анонса"; else echo "Редактирование анонса"; ?>
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        ErrInfo::errorSummaryText($model);
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                /**
                 * @var $form TbActiveForm
                 */
                echo $form->textFieldRow($model, "title");
                echo $form->textFieldRow($model, "text");
                echo $form->textFieldRow($model, "order");
                echo $form->dropDownListRow($model, "active", array(0 => "Выключен", 1 => "Включен"));
                ?>
            </div>
        </div>
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Сохранить')); ?>
        </div>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>