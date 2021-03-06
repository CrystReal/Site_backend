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
    <title>Error</title>
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
    <!-- BEGIN THEME STYLES -->
    <link href="/static/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/static/css/pages/error.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-404-3">
<div class="page-inner">
    <img src="/static/img/pages/earth.jpg" class="img-responsive" alt="">
</div>
<div class="container error-404">
    <h1><?php echo $error['code']; ?></h1>

    <h2>Хьюстон, у нас, блять, пиздец!</h2>

    <p>
        <?php if ($error['code'] == '404') { ?>
            Страница не найдена.
        <?php } else { ?>
            <?php echo $error['message']; ?>
        <?php } ?>
    </p>

    <p>
        <a href="/">На главную</a>
        <br>
    </p>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/static/plugins/respond.min.js"></script>
<script src="/static/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/static/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/static/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/static/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/static/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script src="/static/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/static/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/static/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/static/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="/static/scripts/app.js"></script>
<script>
    jQuery(document).ready(function () {
        App.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>