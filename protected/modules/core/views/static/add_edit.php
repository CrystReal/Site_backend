<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            <?php echo $h1; ?>
        </h3>
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Главная</a>
            </li>
            <li>
                <a href="#">Статика</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#"><?php echo $h1; ?></a></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        ErrInfo::errorSummaryText((isset($base_model)) ? $base_model : null);
        ?>


        <form action="" method="post" enctype="multipart/form-data">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><i class="icon-home"></i>Основное</a></li>
                <li><a href="#seo" data-toggle="tab"><i class="icon-cog"></i>SEO</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Родитель:</label>
                            <?php if ($base_model->candelete != 1) echo CHtml::dropDownList('StaticPages[parent]', $base_model->parent, StaticPages::model()->getArrayDropDown($base_model->id), array("class" => "form-control"));
                            else echo 'Корень';?>
                        </div>
                        <div class="col-md-3">
                            <label>Это категория?</label>
                            <?php echo CHtml::dropDownList('StaticPages[iscat]', $base_model->iscat, array(0 => 'No', 1 => 'Yes'), array("class" => "form-control")); ?>
                        </div>
                        <div class="col-md-3">
                            <label>URL:</label>
                            <?php if ($base_model->candelete != 1) echo CHtml::activeTextField($base_model, 'alias', array('class' => "text mid form-control"));
                            else echo $base_model->alias;?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Название:</label>
                            <?php echo CHtml::activeTextField($base_model, 'header', array('class' => "text mid form-control")); ?>
                        </div>
                        <div class="col-md-3">
                            <label>Использовать шаблон?</label>
                            <?php echo CHtml::dropDownList('StaticPages[isInContent]', $base_model->isInContent, array(1 => 'Yes', 0 => 'No'), array("class" => "form-control")); ?>
                        </div>
                        <div class="col-md-3">
                            <label>Тип:</label>
                            <?php
                            $a = array(0 => 'Regular page', 1 => 'Main', 2 => 'Catalog');
                            if ($base_model->candelete != 1) echo CHtml::dropDownList('StaticPages[type]', $base_model->type, array(0 => 'Regular page'), array("class" => "form-control"));
                            else echo $a[$base_model->type];?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Контент:</label>
                            <?php $this->widget('application.extensions.ckeditor.CKEditor', array('model' => $base_model, 'attribute' => 'data', 'language' => 'en', 'editorTemplate' => 'my', 'onLoad' => false, 'htmlOptions' => array("style" => "box-sizing: border-box;-moz-box-sizing: border-box; -webkit-box-sizing: border-box; width: 100%; height: 400px;", "class"=>"form-control"))); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>CSS:</label>
                            <?php echo CHtml::activeTextArea($base_model, 'css', array('rows' => '10', 'class' => "col-md-12 form-control")); ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="seo">

                    <div class="row">
                        <div class="col-md-12">
                            <label>Title:</label>
                            <?php echo CHtml::activeTextField($base_model, 'meta_title', array("class" => "form-control")); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Description:</label>
                            <?php echo CHtml::activeTextField($base_model, 'meta_desc', array("class" => "form-control")); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Keywords:</label>
                            <?php echo CHtml::activeTextField($base_model, 'meta_keywords', array("class" => "form-control")); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Robots:</label>
                            <?php echo CHtml::activeTextField($base_model, 'meta_robots', array("class" => "form-control")); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Author:</label>
                            <?php echo CHtml::activeTextField($base_model, 'meta_author', array("class" => "form-control")); ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <br/>
                    <input type="submit" class="btn btn-primary" value="<?php echo $submit; ?>">
                </div>
            </div>
        </form>
    </div>
</div>