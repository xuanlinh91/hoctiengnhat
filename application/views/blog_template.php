<?php
include_once('share/header.php');
?>
    <div class="container gram-content">
        <div class="row">
            <div class="col-lg-8 panel panel-info gram-panel">
                <div class="panel-heading">
                    <h3><a href="<?php echo site_url('home')?>">Trang chủ</a> :: <?php echo isset($blog['TITLE']) ? $blog['TITLE'] : "";
                        if ( $blog['FEE'] != NULL && (!isset($pay) || $pay == null)) {?>
                            <span class="glyphicon glyphicon-ok" />
                        <?php }?></h3>
                </div>

                <?php
                if (isset($error) && $error != null) {
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $error;?>
                    </div>

                    <?php
                }
                ?>
                <?php
                if (isset($login) && $login != null) {
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> Bạn vui lòng <a href="<?php echo site_url('login/do_login')?>" class="alert-link">đăng nhập</a> để sử dụng chức năng này
                    </div>

                    <?php
                }
                ?>
                <?php
                if (isset($pay) && $pay != null) {
                    ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Bạn vui lòng <a href="<?php echo site_url('blog/paid/'.$id_paid.'/blog')?>" class="alert-link paid-btn">thanh toán</a> để sử dụng chức năng này. <strong>(1000 gold)</strong>
                    </div>
                    <?php
                }
                ?>


                <div class="blog-content">
                    <?php
                    if(isset($blog) && $blog != null){
                            echo isset($blog['CONTENT']) ? $blog['CONTENT'] : "";
                    }?>
                </div>
                <div class="fb-comments" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-colorscheme="light" data-width="100%"></div>
            </div>
            <div class="col-lg-4">
                <?php
                include_once('share/right_column.php');
                ?>
            </div>
        </div>
    </div>
<?php
include_once('share/footer.php');
?>