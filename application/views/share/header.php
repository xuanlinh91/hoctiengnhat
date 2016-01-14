<?php
$list_of_errors = $this->session->userdata('list_of_errors');
$error_flag = $this->session->userdata('error_flag_code');
$error_mess_code = $this->session->userdata('error_mess_code');
$type_mess_code = $this->session->userdata('type_mess_code');
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo link_tag('favicon.png', 'shortcut icon', 'image/ico'); ?>

    <title><?php if(!empty($this->page_title)) { echo $this->page_title; } else { echo DEFAULT_HOME_TITLE; } ?></title>
    <script src="/hoctiengnhat/js/jquery.min.js"></script>
    <script type="text/javascript" src="/hoctiengnhat/js/jquery.mmenu.min.all.js"></script>
    <?php echo link_tag('css/jquery.mmenu.all.css');?>

    <!-- Bootstrap core CSS -->
    <?php echo link_tag('css/bootstrap.css');?>

    <?php echo link_tag('css/style.css');?>
            <script type="text/javascript" src="/hoctiengnhat/js/ie-emulation-modes-warning.js"><style type="text/css"></style>

                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script type="text/javascript" src="/hoctiengnhat/js/ie10-viewport-bug-workaround.js">


            <style id="holderjs-style" type="text/css"></style><link rel="stylesheet" id="coToolbarStyle" href="chrome-extension://nppllibpnmahfaklnpggkibhkapjkeob/toolbar/styles/placeholder.css" type="text/css"><script type="text/javascript" id="cosymantecbfw_removeToolbar">(function () {				var toolbarElement = {},					parent = {},					interval = 0,					retryCount = 0,					isRemoved = false;				if (window.location.protocol === 'file:') {					interval = window.setInterval(function () {						toolbarElement = document.getElementById('coFrameDiv');						if (toolbarElement) {							parent = toolbarElement.parentNode;							if (parent) {								parent.removeChild(toolbarElement);								isRemoved = true;								if (document.body && document.body.style) {									document.body.style.setProperty('margin-top', '0px', 'important');								}							}						}						retryCount += 1;						if (retryCount > 10 || isRemoved) {							window.clearInterval(interval);						}					}, 10);				}			})();</script><script type="text/javascript" id="waxCS">var WAX = function () { var _arrInputs; return { getElement: function (i) { return _arrInputs[i]; }, setElement: function(i){ _arrInputs=i; } } }(); function waxGetElement(i) { return WAX.getElement(i); } function coSetPageData(t, d){ if('wax'==t) { WAX.setElement(d);} }</script><script type="text/javascript" id="waxCS">var WAX = function () { var _arrInputs; return { getElement: function (i) { return _arrInputs[i]; }, setElement: function(i){ _arrInputs=i; } } }(); function waxGetElement(i) { return WAX.getElement(i); } function coSetPageData(t, d){ if('wax'==t) { WAX.setElement(d);} }</script></head><button id="javascript-popup-blocker-notify" style="display: none;"></button>
<!-- NAVBAR
================================================== -->
<body>
<?php
$this->session->unset_userdata('list_of_errors');
$this->session->unset_userdata('error_flag_code');
$this->session->unset_userdata('error_mess_code');
$this->session->unset_userdata('type_mess_code');
?>

<!--login fom-->
<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content">
            <a class="close login-close"><span class="glyphicon glyphicon-remove-circle"></span></a>
            <h3>Sign in</h3>
            <?php echo form_open('login/do_login', array('class' => 'form-horizontal')); ?>
            <input type="hidden" name="link_back" id="link_back" class="form-control" value="abcd">
            <label for="username">
                Username:
                <input type="text" name="username" id="username" placeholder="Username" required="required" />
            </label>
            <label for="password">
                Password:
                <input type="password" name="password" id="password" placeholder="Password" required="required" />
            </label>
            <button type="submit" class="btn btn-submit">Sign in</button> Or
            <a class="btn btn-info" href="<?php echo site_url('login/register')?>">Sign up</a>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end login form-->
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
<script type="text/javascript">
    var site_url = '<?php echo site_url();?>';
</script>

<script type="text/javascript">
    var configs = {
        base_url: "<?php echo base_url(); ?>",
        site_url: "<?php echo site_url(); ?>",
        <?php if (isset($list_of_errors) && gettype($list_of_errors) == 'string' && strlen($list_of_errors) > 4) 	{
            echo 'listOfErrors: ' . json_encode($list_of_errors) . ',';
        } else {
            echo 'listOfErrors: [],';
        } ?>

        <?php if (isset($error_flag_code) && !empty($error_flag_code)) 	{
            echo 'errorFlag: ' . $error_flag_code . ',';
        } else {
            echo 'errorFlag: 0,';
        } ?>

        <?php if (isset($error_mess_code) && !empty($error_mess_code)) 	{
            echo 'errorMess: ' . json_encode(strip_tags($error_mess_code, '<a>')) . ',';
        } else {
            echo 'errorMess: "",';
        } ?>

        <?php if (isset($type_mess_code) && !empty($type_mess_code)) 	{
            echo 'typeMess: "' . $type_mess_code . '"';
        } else {
            echo 'typeMess: "none"';
        } ?>

    };

</script>

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
                                <li><a href="<?php echo site_url('blog/docs/list/n5');?>">Đề thi N5</a></li>
                                <li><a href="<?php echo site_url('blog/docs/list/n4');?>">Đề thi N4</a></li>
                                <li><a href="<?php echo site_url('blog/docs/list/n3');?>">Đề thi N3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo site_url('n3');?>" class="dropdown-toggle" data-toggle="dropdown">Phần bổ sung<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('game');?>">Trò chơi</a></li>
                                <li><a href="<?php echo site_url('blog/more');?>">Phụ lục</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo site_url('about');?>">Giới thiệu</a>
                        </li>
                        <li>
                            <?php
                            if(isset($this->session->userdata['username_user']) && $this->session->userdata['is_user_login'] == true){?>
                        <li class="dropdown">
                            <a href="<?php echo site_url('n3');?>" class="dropdown-toggle" data-toggle="dropdown"><?php  echo $this->session->userdata['username_user'];?> <span class="glyphicon glyphicon-user"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('user/index');?>">Tài khoản</a></li>
                                <li><a href="<?php echo site_url('user/cash');?>">Nạp tiền</a></li>
                                <li><a href="<?php echo site_url('login/logout');?>">Đăng xuất</a></li>
                            </ul>
                        </li>
                        <?php

                        } else {
                            ?>
                            <a class="btn btn-default overlayLink" id="link_back_btn" style="padding-top: 10px; height: 40px; margin-top: 5px;" href="">Đăng nhập</a>

                            <?php
                        }
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
