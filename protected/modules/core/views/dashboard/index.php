<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                Центр управления вселенной
            </h3>
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Главная</a>
                </li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div id="dashboard">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-group"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $count = Users::model()->count("active=1"); ?>
                        </div>
                        <div class="desc">
                            <?php echo AlexBond::doPlural($count, "Юзверь", "Юзверя", "Юзверей") ?>
                        </div>
                    </div>
                    <a class="more" href="<?php echo $this->createUrl("/users/users/index"); ?>">
                        Просмотреть всех <i class="m-fa fa-swapright m-fa fa-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo SupportTickets::model()->getCountNeedAnswer();; ?>
                        </div>
                        <div class="desc">
                            Новых запросов в СТП
                        </div>
                    </div>
                    <a class="more" href="<?php echo $this->createUrl("/support/support/index"); ?>">
                        Просмотреть запросы <i class="m-fa fa-swapright m-fa fa-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div
                            class="number"><?php //echo(Orders::model()->countByAttributes(array("status" => OrderStatuses::WAIT_FOR_PAYMENT)) + Orders::model()->countByAttributes(array("status" => OrderStatuses::PAYED))) ?></div>
                        <div class="desc">New Orders</div>
                    </div>
                    <a class="more" href="<?php echo $this->createUrl("/orders/orders/index"); ?>">
                        View more <i class="m-fa fa-swapright m-fa fa-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            $0
                        </div>
                        <div class="desc">Total Profit</div>
                    </div>
                    <a class="more" href="<?php echo $this->createUrl("/orders/orders/index"); ?>">
                        View more <i class="m-fa fa-swapright m-fa fa-white"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php //echo Products::model()->count("price>0"); ?>
                        </div>
                        <div class="desc">
                            Products
                        </div>
                    </div>
                    <a class="more" href="<?php echo $this->createUrl("/store/products/index"); ?>">
                        View more <i class="m-fa fa-swapright m-fa fa-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-diamond"></i>
                    </div>
                    <div class="details">
                        <div
                            class="number">0
                        </div>
                        <div class="desc">Diamonds</div>
                    </div>
                    <a class="more" href="<?php echo $this->createUrl("/rapnet/diamonds/index"); ?>">
                        View more <i class="m-fa fa-swapright m-fa fa-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php //echo Newsletter::model()->count(); ?></div>
                        <div class="desc">Emails in list</div>
                    </div>
                    <a class="more" href="<?php echo $this->createUrl("/newsletter/mails/list"); ?>">
                        View more <i class="m-fa fa-swapright m-fa fa-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
