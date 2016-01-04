<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo link_tag('favicon.png', 'shortcut icon', 'image/ico'); ?>

    <title>Nhật ngữ online</title>

    <!-- Bootstrap core CSS -->
    <?php echo link_tag('css/bootstrap.css');?>

    <?php echo link_tag('css/style.css');?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script type="text/javascript" src="/hoctiengnhat/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src="/hoctiengnhat/js/ie-emulation-modes-warning.js"><style type="text/css"></style>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script type="text/javascript" src="/hoctiengnhat/js/ie10-viewport-bug-workaround.js">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- Custom styles for this template -->

    <style id="holderjs-style" type="text/css"></style><link rel="stylesheet" id="coToolbarStyle" href="chrome-extension://nppllibpnmahfaklnpggkibhkapjkeob/toolbar/styles/placeholder.css" type="text/css"><script type="text/javascript" id="cosymantecbfw_removeToolbar">(function () {				var toolbarElement = {},					parent = {},					interval = 0,					retryCount = 0,					isRemoved = false;				if (window.location.protocol === 'file:') {					interval = window.setInterval(function () {						toolbarElement = document.getElementById('coFrameDiv');						if (toolbarElement) {							parent = toolbarElement.parentNode;							if (parent) {								parent.removeChild(toolbarElement);								isRemoved = true;								if (document.body && document.body.style) {									document.body.style.setProperty('margin-top', '0px', 'important');								}							}						}						retryCount += 1;						if (retryCount > 10 || isRemoved) {							window.clearInterval(interval);						}					}, 10);				}			})();</script><script type="text/javascript" id="waxCS">var WAX = function () { var _arrInputs; return { getElement: function (i) { return _arrInputs[i]; }, setElement: function(i){ _arrInputs=i; } } }(); function waxGetElement(i) { return WAX.getElement(i); } function coSetPageData(t, d){ if('wax'==t) { WAX.setElement(d);} }</script><script type="text/javascript" id="waxCS">var WAX = function () { var _arrInputs; return { getElement: function (i) { return _arrInputs[i]; }, setElement: function(i){ _arrInputs=i; } } }(); function waxGetElement(i) { return WAX.getElement(i); } function coSetPageData(t, d){ if('wax'==t) { WAX.setElement(d);} }</script></head><button id="javascript-popup-blocker-notify" style="display: none;"></button>
<!-- NAVBAR
================================================== -->
<body>
<!--    faceook comment sdk -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1649709245298408',
                xfbml      : true,
                version    : 'v2.5'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<!--het facebook comment sdk-->

    <div class="navbar-wrapper">
        <div class="container">

            <div class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url('home');?>"><img alt="Brand name" src="/hoctiengnhat/images/logo.gif" /></a>
                        <a class="navbar-brand" href="<?php echo site_url('home');?>">Nhật ngữ online</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="<?php echo site_url('n5');?>" class="dropdown-toggle" data-toggle="dropdown">Giáo trình N5<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('n5/gram');?>">Ngữ pháp</a></li>
                                        <li><a href="<?php echo site_url('n5/volca');?>">Từ vựng</a></li>
                                        <li><a href="<?php echo site_url('n5/kanji');?>">Chữ hán</a></li>
                                    </ul>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo site_url('n4');?>" class="dropdown-toggle" data-toggle="dropdown">Giáo trình N4<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('n4/gram');?>">Ngữ pháp</a></li>
                                    <li><a href="<?php echo site_url('n4/volca');?>">Từ vựng</a></li>
                                    <li><a href="<?php echo site_url('n4/kanji');?>">Chữ hán</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo site_url('n3');?>" class="dropdown-toggle" data-toggle="dropdown">Giáo trình N3<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('n3/gram');?>">Ngữ pháp</a></li>
                                    <li><a href="<?php echo site_url('n3/volca');?>">Từ vựng</a></li>
                                    <li><a href="<?php echo site_url('n3/kanji');?>">Chữ hán</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo site_url('n3');?>" class="dropdown-toggle" data-toggle="dropdown">Tài liệu - Đề thi<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('n5/gram');?>">Đề thi N5</a></li>
                                    <li><a href="<?php echo site_url('n5/volca');?>">Đề thi N4</a></li>
                                    <li><a href="<?php echo site_url('n5/kanji');?>">Đề thi N3</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo site_url('n3');?>" class="dropdown-toggle" data-toggle="dropdown">Phần bổ sung<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('n5/gram');?>">Trò chơi</a></li>
                                    <li><a href="<?php echo site_url('n5/volca');?>">Phụ lục</a></li>
                                </ul>
                            </li>
                            <li >
                                <a href="<?php echo site_url('about');?>">Giới thiệu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
