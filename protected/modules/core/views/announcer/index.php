<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Анонсер
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li class="btn-group">
                <a class="btn green" href="<?php echo $this->createUrl("create") ?>">Добавить</a>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li><a href="#">Анонсер</a></li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        ErrInfo::errorSummaryText((isset($base_model)) ? $base_model : null);
        ?>

        <?php
        $pages = $base_model;
        //print_r($direction);
        if (count($pages) > 0) {
            ?>

            <table class="table table-hover">

                <thead>
                <tr>
                    <th>Название</th>
                    <th>Порядок</th>
                    <td>&nbsp;</td>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($pages as $item) {
                    echo '<tr ' . ($item->active == 0 ? "class='danger'" : "") . '>';
                    echo '<td><a href="' . $this->createUrl("update", array("id" => $item->id)) . '">' . $item->title . '</a></td>';
                    echo "<td>" . $item->order . "</td>";
                    echo '<td><a href="' . $this->createUrl("delete", array("id" => $item->id)) . '" onClick="return confirm(\'Are you sure you want to remove the item?\');">Удалить</a></td>';
                    echo '</tr>';
                }
                ?>


                </tbody>
            </table>

        <?php
        } else {
            echo '<h3>Нет анонсов</h3>';
        }
        ?>
    </div>
</div>