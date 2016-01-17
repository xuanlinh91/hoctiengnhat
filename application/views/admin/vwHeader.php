<?php
$list_of_errors = $this->session->userdata('list_of_errors');
$error_flag_code = $this->session->userdata('error_flag_code');
$error_mess_code = $this->session->userdata('error_mess_code');
$type_mess_code = $this->session->userdata('type_mess_code');
?>
<?php echo doctype('html5'); ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="abhishek@devzone.co.in">

    <title><?php if(!empty($this->page_title)) { echo $this->page_title; } else { echo DEFAULT_PAGE_TITLE; } ?></title>

    <!-- Bootstrap core CSS -->
    <?php echo link_tag('css/bootstrap.css');?>
    <?php echo link_tag('css/admin.css');?>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <!-- Add custom CSS here -->
    <?php echo link_tag('css/arkadmin.css');?>
    <!-- JavaScript -->
    <script src="/hoctiengnhat/js/jquery-1.10.2.js"></script>
    <script src="/hoctiengnhat/js/bootstrap.js"></script>
    <script src="/hoctiengnhat/js/admin.js"></script>
    <script src="/hoctiengnhat/js/das.js"></script>
    <script src="/hoctiengnhat/tinymce/tinymce.min.js"></script>



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


</head>

<body>
    <?php
        $this->session->unset_userdata('list_of_errors');
        $this->session->unset_userdata('error_flag_code');
        $this->session->unset_userdata('error_mess_code');
        $this->session->unset_userdata('type_mess_code');
    ?>

<div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" target="_blank" href="<?php echo base_url(); ?>">HocTiengNhat.Com</a>
        </div>
        <?php
        // Define a default Page
        $pg = isset($page) && $page != '' ?  $page :'dash'  ;
        ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <?php if ($this->session->userdata('is_publisher_login')  || $this->session->userdata('is_admin_login')) {?><li <?php echo  $pg =='cms' ? 'class="active"' : '' ?>><a href="<?php echo site_url('admin/cms/blog_list');?>"><span class="glyphicon glyphicon-book"></span> Manage Content</a></li><?php }?>
                <?php if ($this->session->userdata('is_admin_login')) {?><li <?php echo  $pg =='user' ? 'class="active"' : '' ?>><a href="<?php echo site_url('admin/user/user_list');?>"><span class="glyphicon glyphicon-user"></span> Manage User</a></li><?php }?>
                <?php if ($this->session->userdata('is_admin_login')) {?><li <?php echo  $pg =='publisher' ? 'class="active"' : '' ?>><a href="<?php echo site_url('admin/publisher/publisher_list');?>"><span class="glyphicon glyphicon-user"></span> Manage Publisher</a></li><?php }?>
                <?php if ($this->session->userdata('is_admin_login')) {?><li <?php echo  $pg =='course' ? 'class="active"' : '' ?>><a href="<?php echo site_url('admin/course');?>"><span class="glyphicon glyphicon-th-list"></span> Manage Course</a></li><?php }?>
                <?php if ($this->session->userdata('is_admin_login')) {?><li <?php echo  $pg =='category' ? 'class="active"' : '' ?>><a href="<?php echo site_url('admin/category');?>"><span class="glyphicon glyphicon-th"></span> Manage Category</a></li><?php }?>
                <?php if ($this->session->userdata('is_publisher_login') || $this->session->userdata('is_admin_login')) {?><li <?php echo  $pg =='profile' ? 'class="active"' : '' ?>><a href="<?php echo site_url('admin/home/profile');?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li><?php }?>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('admin/home/profile')?>"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="<?php echo site_url('admin/home/change_password')?>"><i class="fa fa-gear"></i> Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('admin/home/logout');?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
