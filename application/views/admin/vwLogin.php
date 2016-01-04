<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--
    Code By Abhishek R. Kaushik
    http://devzone.co.in/
    -->
    <title>HocTiengNhat.Com Admin Panel</title>
    <!-- Bootstrap core CSS -->
    <?php echo link_tag('css/bootstrap.css');?>
    <?php echo link_tag('css/signin.css');?>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        $(function() {

            if (localStorage.chkbx && localStorage.chkbx != '') {
                $('#remember_me').attr('checked', 'checked');
                $('#username').val(localStorage.usrname);
                $('#pass').val(localStorage.pass);
            } else {
                $('#remember_me').removeAttr('checked');
                $('#username').val('');
                $('#pass').val('');
            }

            $('#remember_me').click(function() {

                if ($('#remember_me').is(':checked')) {
                    // save username and password
                    localStorage.usrname = $('#username').val();
                    localStorage.pass = $('#pass').val();
                    localStorage.chkbx = $('#remember_me').val();
                } else {
                    localStorage.usrname = '';
                    localStorage.pass = '';
                    localStorage.chkbx = '';
                }
            });
        });

    </script>

</head>

<body>

<div class="container">
    <?php
    if(isset($error) && $error !='')
    {
        ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
        <?php
    }
    ?>
    <form class="form-signin panel" method="post" action="<?php echo site_url(); ?>/admin/home/do_login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus>
        <input type="password" id="pass" class="form-control" placeholder="Password" name="password">
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="remember_me">Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div> <!-- /container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>