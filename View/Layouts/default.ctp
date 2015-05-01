<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>INTRA Portal System</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" id ="blooo">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <a class="navbar-brand"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><?php echo $this->html->link($this->Session->read('Auth.User.username'),array('controller' => 'Users', 'action' => 'view')); ?></li>

                <li><?php echo $this->html->link('Logout',array('controller' => 'Users', 'action' => 'logout')); ?></li>

            </ul>
            <form class="navbar-form navbar-right">
<!--                <input type="text" class="form-control" placeholder="Search...">-->
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <img src="http://intra.davidmchugh.ie/dcu.png">
                <li><a href="#"><?php echo $this->html->link('Overview',array('controller' => 'Users', 'action' => 'index')); ?><span class="sr-only">(current)</span></a></li>
                <li><a href="#"><?php echo $this->html->link('Profile',array('controller' => 'Profiles', 'action' => 'index')); ?></a></li>
                <li><a href="#"><?php echo $this->html->link('Positions',array('controller' => 'Positions', 'action' => 'index')); ?></a></li>
                <li><a href="#"><?php echo $this->html->link('Applications',array('controller' => 'Applicants', 'action' => 'index')); ?></a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header"></h2>
            <div class="table-responsive">
                <div id="content">
                    <?php echo $this->Session->flash(); ?>
<!--                    <img src="http://davidmchugh.ie/mod.png">-->
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<style>
    #blooo
    {
        background-color: #102650;
    }
    body{background: #eee ;}

</style>