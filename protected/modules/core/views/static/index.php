<?php
function getTree($id, $level, $alias)
{
    $base = StaticPages::model()->findAll('parent=' . $id);
    if (count($base) > 0) {
        $s_text = '';
        for ($i = 0; $i < $level; $i++) {
            $s_text .= "|—";
        }
        foreach ($base as $item) {
            if ($item->iscat == 0)
                echo '<tr><td>' . $s_text . '<a href="' . Yii::app()->createUrl("/core/static/edit", array("id" => $item->id)) . '">' . $item->header . '</a> <span style="color:gray">(<a href="' . Yii::app()->params['frontendUrl'] . '/' . $item->id . '-' . urlencode($item->alias) . '" target="_blank" style="color:gray">открыть на сайте</a>)</span></td>';
            else
                echo '<tr><td>' . $s_text . '<a href="' . Yii::app()->createUrl("/core/static/edit", array("id" => $item->id)) . '" style="color:#000">' . $item->header . '</a></td>';

            if ($item->candelete == 0) {
                echo '<td><a href="' . Yii::app()->createUrl("/core/static/delete", array("id" => $item->id)) . '" onClick="return confirm(\'Are you sure you want to delete this page?\\nAll children of a parent to change the item up.\');">Удалить</a></td>';
            } else {
                echo '<td></td>';
            }
            echo '        </tr> ';
            getTree($item->id, $level + 1, $alias . "/" . $item->alias);
        }
    }

}

?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Статика
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li class="btn-group">
                <a class="btn green" href="<?php echo $this->createUrl("add"); ?>">Добавить</a>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li><a href="#">Статика</a></li>
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
                    <td>&nbsp;</td>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($pages as $item) {
                    if ($item->iscat == 0)
                        echo '<tr><td><a href="/core/static/edit/id/' . $item->id . '">' . $item->header . '</a> <span style="color:gray">(<a href="' . Yii::app()->params['frontendUrl'] . '/' . $item->id . '-' . urlencode($item->alias) . '" target="_blank" style="color:gray">открыть на сайте</a>)</span></td>';
                    else
                        echo '<tr><td><a href="/core/static/edit/id/' . $item->id . '" style="color:#000" title="Category">' . $item->header . '</a></td>';

                    if ($item->candelete == 0 AND $item->type != 1) {
                        echo '<td><a href="/core/static/delete/id/' . $item->id . '" onClick="return confirm(\'Are you sure you want to delete this page?\\nAll children of a parent to change the item up.\');">Удалить</a></td>';
                    } else {
                        echo '<td>---</td>';
                    }
                    echo '        </tr> ';
                    getTree($item->id, 1, $item->alias);
                }
                ?>


                </tbody>
            </table>

        <?php
        } else {
            echo '<h3>Да твоже мать! Какого нет страниц?!</h3>';
        }
        ?>
    </div>
</div>