<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Simple Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {{ stylesheet_link('bootstrap/css/bootstrap.min.css') }}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    {{ stylesheet_link('dist/css/AdminLTE.min.css') }}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {{ stylesheet_link('dist/css/skins/_all-skins.min.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        {{  partial('layouts/common/header') }}

        {{ partial('layouts/common/sidebar') }}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {% block content_header %}{% endblock %}
            {% block content %}{% endblock %}
        </div><!-- /.content-wrapper -->
        {{ partial('layouts/common/sidebar-control') }}
        {{ partial('layouts/common/footer') }}
    </div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
{{ javascript_include('plugins/jQuery/jQuery-2.1.4.min.js') }}
<!-- Bootstrap 3.3.5 -->
{{ javascript_include('bootstrap/js/bootstrap.min.js') }}
<!-- Slimscroll -->
{{ javascript_include('plugins/slimScroll/jquery.slimscroll.min.js') }}
<!-- FastClick -->
{{ javascript_include('plugins/fastclick/fastclick.min.js') }}
<!-- AdminLTE App -->
{{ javascript_include('dist/js/app.min.js') }}
<!-- AdminLTE for demo purposes -->
{{ javascript_include('dist/js/demo.js') }}
</body>
</html>
