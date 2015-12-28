<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Игроки
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/"> Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li><a href="#"> Игроки</a></li>
        </ul>
        <!--END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        ErrInfo::errorSummaryText((isset($model)) ? $model : null);
        $controller = $this;
        $this->widget('bootstrap.widgets.TbGridView', array(
            'type' => 'striped',
            'dataProvider' => $dataProvider,
            'id' => 'usersListGrid',
            'ajaxUpdate' => false,
            'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'id',
                    'htmlOptions' => [
                        "style" => "width: 50px"
                    ]
                ),
                array(
                    'name' => 'username',
                ),
                array(
                    'name' => 'registerDate',
                    'filter' => false
                ),
                [
                    'name' => 'rang',
                    'type' => 'raw',
                    'filter' => $model->getRangOptions(),
                    'value' => '$data->getRangString()'
                ],
                [
                    'name' => 'vip',
                    'type' => 'raw',
                    'filter' => $model->getVipOptions(),
                    'value' => '$data->getVipString()'
                ],
                [
                    'name' => 'active',
                    'type' => 'raw',
                    'filter' => $model->getBooleanOptions(),
                    'value' => '$data->getStatusLabel()'
                ],
                array(
                    'type' => 'raw',
                    'value' => function ($data, $row) use ($controller) {
                            return $controller->renderPartial('partial/_tableActions', ["data" => $data], true);
                        }
                ),
            ),
        ));
        ?>
    </div>
</div>