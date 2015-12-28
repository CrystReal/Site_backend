<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            <?php if ($model->isNewRecord) echo "Создание новости"; else echo "Редактирование новости"; ?>
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->createUrl("index"); ?>">Новости</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">
                    <?php if ($model->isNewRecord) echo "Создание новости"; else echo "Редактирование новости"; ?>
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
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-home"></i>Основное</a></li>
            <li><a href="#seo" data-toggle="tab"><i class="fa fa-cog"></i>SEO</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        /**
                         * @var $form TbActiveForm
                         */
                        echo $form->textFieldRow($model, "header");
                        echo $form->textFieldRow($model, "link");
                        echo $form->textFieldRow($model, "cdate", array("class" => "date-picker", "data-date-format" => "dd-mm-yy"));
                        ?>
                        <div class="form-group "><label class="control-label col-md-3"
                                                        for="News_image">Изображение</label>

                            <div class="col-md-9"><input name="image" id="News_image"
                                                                                   type="file"></div>
                        </div><?php                        echo $form->dropDownListRow($model, "active", array(0 => "Выключен", 1 => "Включен"));
                        echo $form->dropDownListRow($model, "author", Users::model()->getAdminsArray());
                        echo $form->textAreaRow($model, "short_data", ["rows" => 3]);
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Text:</label>
                                <?php $this->widget('application.extensions.ckeditor.CKEditor', array('model' => $model, 'attribute' => 'data', 'language' => 'en', 'editorTemplate' => 'my', 'onLoad' => false, 'htmlOptions' => array("style" => "box-sizing: border-box;-moz-box-sizing: border-box; -webkit-box-sizing: border-box; width: 100%; height: 400px;", "class" => "form-control"))); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="seo">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        echo $form->textFieldRow($model, "meta_title");
                        echo $form->textFieldRow($model, "meta_desc");
                        echo $form->textFieldRow($model, "meta_keywords");
                        echo $form->textFieldRow($model, "meta_robots");
                        echo $form->textFieldRow($model, "meta_autor");
                        ?>
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