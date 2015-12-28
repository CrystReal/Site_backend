<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Тикеты
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/"> Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li><a href="#"> Тикеты</a></li>
        </ul>
        <!--END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        ErrInfo::errorSummaryText((isset($model)) ? $model : null);
        $this->widget('bootstrap.widgets.TbGridView', array(
            'type' => 'striped',
            'dataProvider' => $dataProvider,
            'id' => 'ticketsListGrid',
            'ajaxUpdate' => false,
            'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'id'
                ),
                array(
                    'name' => 'userId',
                    'type' => "raw",
                    'value' => '$data->user->id .": ". $data->user->getUserLink()'
                ),
                array(
                    'name' => 'subject',
                    'type' => "raw",
                    'value' => 'CHtml::encode($data->subject)'
                ),
                [
                    'name' => 'status',
                    'type' => 'raw',
                    'filter' => $model->getStatusDropdown(),
                    'value' => '$data->getStatusLabel()'
                ],
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{view}{delete}',
                ),
            ),
        ));
        ?>
    </div>
</div>