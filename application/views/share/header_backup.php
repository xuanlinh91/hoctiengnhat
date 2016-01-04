<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nhật ngữ online</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/hoctiengnhat/js/bootstrap.js"></script>
<!--    <script src="/hoctiengnhat/js/lib.js"></script>-->
<!--    <script src="/hoctiengnhat/js/main.js"></script>-->
    <script type="text/javascript" src="/hoctiengnhat/js/jquery.mmenu.min.all.js"></script>
    <?php echo link_tag('favicon.png', 'shortcut icon', 'image/ico'); ?>
    <?php echo link_tag('css/bootstrap.css');?>
    <?php echo link_tag('css/style.css');?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
</head>
<body>
<script type="text/javascript">
    var site_url = '<?php echo site_url();?>';
    $('.carousel').carousel({
        interval: 3000
    })
</script>

<div id="menu">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('home');?>"><img alt="Brand name" src="/hoctiengnhat/images/logo.gif" /></a>
                <a class="navbar-brand" href="<?php echo site_url('home');?>">Nhật ngữ online</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('n5');?>">Giáo trình N5</a></li>
                    <li><a href="<?php echo site_url('course/n4');?>">Giáo trình N4</a></li>
                    <li><a href="<?php echo site_url('course/n3');?>">Giáo trình N3</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mở rộng<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>

<!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
<!--    <ol class="carousel-indicators">-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--    </ol>-->
<!---->
<!--    <div class="carousel-inner" role="listbox">-->
<!--        <div class="item active">-->
<!--            <img src="../../../images/slider/1.jpg" alt="...">-->
<!--            <div class="carousel-caption">-->
<!--                ...-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--            <img src="../../../images/slider/2.jpg" alt="...">-->
<!--            <div class="carousel-caption">-->
<!--                ...-->
<!--            </div>-->
<!--        </div>-->
<!--        ...-->
<!--    </div>-->
<!---->
<!--    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">-->
<!--        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
<!--        <span class="sr-only">Previous</span>-->
<!--    </a>-->
<!--    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">-->
<!--        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
<!--        <span class="sr-only">Next</span>-->
<!--    </a>-->
<!--</div>-->
