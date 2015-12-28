<div class="btn-group">
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
        Действия <i class="fa fa-angle-down"></i>
    </button>
    <ul class="dropdown-menu" role="menu" style="right: 0; left: auto">
        <li><a href="<?php echo $this->createUrl("update", ["id" => $data->id]); ?>" style="padding: 6px 13px 6px 13px">Редактировать профиль</a></li>
        <li><a href="<?php echo $this->createUrl("logs/joins", ["id" => $data->id]); ?>" style="padding: 6px 13px 6px 13px">Лог входа</a></li>
        <li><a href="<?php echo $this->createUrl("bans/user", ["id" => $data->id]); ?>" style="padding: 6px 13px 6px 13px">Нарушения и наказания</a></li>
    </ul>
</div>