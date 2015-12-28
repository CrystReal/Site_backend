<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0
Version: 1.5.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Панелько</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/static/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="/static/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/ion.rangeslider/css/ion.rangeSlider.Metronic.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet"
          type="text/css"/>
    <link href="/static/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
    <link href="/static/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/static/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/static/css/custom.css" rel="stylesheet" type="text/css"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="/">
            <img src="/static/img/logo.png" alt="logo" class="img-responsive"/>
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="/static/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown" id="header_inbox_bar">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <i class="fa fa-question-circle"></i>
                    <?php $count = SupportTickets::model()->getCountNeedAnswer();
                    if ($count > 0) {
                        echo '<span class="badge">' . $count . '</span>';
                    }
                    ?>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <li>
                        <p>
                            <?php
                            if ($count > 0) {
                                echo $count . " " . AlexBond::doPlural($count, "запрос требует", "запроса требуют", "запросов требуют") . " ответа";
                            } else {
                                echo "Пока все хорошо.";
                            }
                            ?>
                        </p>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list scroller" style="height: 250px;">
                            <?php
                            $last = SupportTickets::model()->findAll(['order' => 'status ASC, dateCreated ASC', 'limit' => 10]);
                            if ($last)
                                foreach ($last as $item) {
                                    ?>
                                    <li>
                                        <a href="<?php echo $this->createUrl("/support/support/view", ["id" => $item->id]) ?>">
                                        <span
                                            class="photo"><?php echo Users::model()->getAvatar($item->user->username, 40) ?></span>
									<span class="subject">
									<span class="from"><?php echo $item->user->username ?></span>
									<span
                                        class="time"><?php echo AlexBond::time_since(time() - $item->dateCreated) ?></span>
									</span>
									<span class="message">
									<?php echo CHtml::encode($item->subject); ?>
									</span>
                                        </a>
                                    </li>
                                <?php
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="external">
                        <a href="<?php echo $this->createUrl("/support/support/index") ?>">Просмотреть все запросы <i
                                class="m-icon-swapright"></i></a>
                    </li>
                </ul>
            </li>
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo Users::model()->getAvatar(Yii::app()->user->model->username, 29) ?>
                    <span
                        class="username"><?php echo Yii::app()->user->model->username ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->createUrl("/personal/auth/logout"); ?>"><i class="fa fa-key"></i>
                            Выход</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <?php echo $this->renderPartial("application.views.partial.sidebar_menu"); ?>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <?php echo $content; ?>
        </div>
        <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer-inner">
            2006-<?php echo date("Y"); ?> &copy; UPDG.
        </div>
        <div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="/static/plugins/respond.min.js"></script>
    <script src="/static/plugins/excanvas.min.js"></script>
    <![endif]-->
    <script src="/static/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="/static/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="/static/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/static/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"
            type="text/javascript"></script>
    <script src="/static/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/static/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/static/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="/static/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/static/plugins/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/static/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/static/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="/static/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <script src="/static/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="/static/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/static/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="/static/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
    <script src="/static/plugins/bootstrap-inputlengthalert/bootstrap-inputlengthalert.js"></script>
    <script src="/static/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/static/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="/static/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript"
            src="/static/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.ru.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/static/scripts/app.js" type="text/javascript"></script>
    <script src="/static/scripts/index.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            App.init(); // initlayout and core plugins
            if (jQuery().datepicker) {
                $('.date-picker').datepicker({
                    autoclose: true,
                    language: "ru"
                });
                $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
            }
        });
    </script>
    <!-- END JAVASCRIPTS -->
    <!-- END BODY -->
</html>