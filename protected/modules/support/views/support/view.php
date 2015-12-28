<?php
/**
 * @var $model SupportTickets
 * @var $comment SupportTicketsComments
 */
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Тикет #<?php echo $model->id; ?>
        </h3>
        <ul class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo $this->createUrl("index"); ?>">Тикеты</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">
                    Тикет #<?php echo $model->id; ?>
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h2><?php echo CHtml::encode($model->subject) ?></h2>
        <table class=" table table-bordered table-striped">
            <?php
            foreach ($model->comments as $comment) {
                ?>
                <tr <?php if ($comment->isAnswer) echo "class='success'" ?>>
                    <td style="width: 150px;">
                        <?php
                        echo Users::model()->getAvatar($comment->user->username, "150");
                        ?>
                        <p class="text-center">
                            <?php
                            echo $comment->user->username;
                            ?>
                        </p>

                        <p class="text-center">
                            <?php
                            echo $comment->user->getBadges();
                            ?>
                        </p>

                        <p class="text-center">
                            <?php
                            echo date("j.n.Y G:i", $comment->datePosted);
                            ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php
                            if ($comment->isAnswer) {
                                echo $comment->content;
                            } else {
                                echo nl2br(CHtml::encode($comment->content));
                            }
                            ?>
                        </p>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="<?php echo $this->createUrl("comment", ["id" => $model->id]); ?>" method="post">
            <div class="form-group">
                <label for="status">Закрываем запрос?</label>
                <select class="form-control" name="toClose" id="status">
                    <option value="0">Не закрывать</option>
                    <option value="1">Закрыть</option>
                </select>
            </div>
            <div class="form-group">
                <label for="text">Коментарий</label>
                <textarea class="form-control" rows="5" name="content" id="text"></textarea>
            </div>
            <div class="form-actions text-center">
                <br>
                <input type="submit" class="btn btn-primary" value="Ответить">
                <br>
                <br>
            </div>
        </form>
    </div>
</div>