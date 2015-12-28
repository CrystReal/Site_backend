<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            <?php if ($model->isNewRecord) echo "Создание блока"; else echo "Редактирование блока"; ?>
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->createUrl("index"); ?>">Блоки</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">
                    <?php if ($model->isNewRecord) echo "Создание блока"; else echo "Редактирование блока"; ?>
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
                echo $form->textFieldRow($model, "name");
                echo $form->dropDownListRow($model, "key", $model->getKeys());
                echo $form->dropDownListRow($model, "active", array(0 => "Выключен", 1 => "Включен"));
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <label>Text:</label>
                        <?php $this->widget('application.extensions.ckeditor.CKEditor', array('model' => $model, 'attribute' => 'content', 'language' => 'en', 'editorTemplate' => 'my', 'onLoad' => false, 'htmlOptions' => array("style" => "box-sizing: border-box;-moz-box-sizing: border-box; -webkit-box-sizing: border-box; width: 100%; height: 400px;", "class" => "form-control"))); ?>
                    </div>
                </div>
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