<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Japanese Practice</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/jp/js/bootstrap.js"></script>
    <script src="/jp/js/lib.js"></script>
    <script src="/jp/js/main.js"></script>
    <script type="text/javascript" src="/jp/js/jquery.mmenu.min.all.js"></script>
    <?php echo link_tag('favicon.png', 'shortcut icon', 'image/ico'); ?>
    <?php echo link_tag('css/bootstrap.css');?>
    <?php echo link_tag('css/demo.css');?>
    <?php echo link_tag('css/style.css');?>
    <?php echo link_tag('css/jquery.mmenu.all.css');?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
</head>
<body>
<script type="text/javascript">
    var site_url = '<?php echo site_url();?>';
</script>

<div id="page">
    <div class="header">
        <a href="#menu"></a>
        Japanese Practice
    </div>
    <nav id="menu">
        <ul>
            <li><a href="<?php echo site_url('hiragana');?>">Home</a></li>
            <li><a href="<?php echo site_url('hiragana');?>">Hiragana</a></li>
            <li><a href="#">Katakana</a>
            <li><a href="#">Kanji</a></li>
            <li><a href="<?php echo site_url('game');?>">Game</a>
                <ul>
                    <li><a href="<?php echo site_url('game/chonchu_start');?>">Game chọn chữ</a></li>
                    <li><a href="#about/team/sales">Game nối chữ</a></li>
                    <li><a href="#about/team/development">Tự viết</a></li>
                </ul>
            </li>
            <li><a href="#about">About us</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</div>
