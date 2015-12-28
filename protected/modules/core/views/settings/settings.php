<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Settings
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Settings</a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        ErrInfo::errorSummaryText((isset($model)) ? $model : null);
        ?>


        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

            <?php
            foreach ($model as $item) {
                ?>
                <div class="form-group  "><label class="col-md-3 control-label required"
                                                   for="<?php echo $item->alias . "_id"; ?>"><?php echo $item->name; ?>
                        <span
                            class="required">*</span></label>

                    <div class="col-md-9"><input name="Settings[<?php echo $item->id; ?>]"
                                                 id="<?php echo $item->alias . "_id"; ?>"
                                                 type="text"
                                                 value="<?php echo $item->value; ?>" class="form-control"></div>
                </div>
            <?php
            }
            ?>

            <div class="form-actions">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </form>
    </div>
</div>