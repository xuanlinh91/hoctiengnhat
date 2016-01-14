<?php
include_once('share/header.php');
?>
    <div class="container gram-content">
        <div class="row">
            <div class="col-lg-8 panel panel-info gram-panel">
                <div class="panel-heading">
                    <h3><a href="<?php echo site_url('home')?>">Trang chủ</a> :: <?php echo $blog['TITLE'];?></h3>
                </div>
                <div class="blog-content">
                    <?php
                    if(isset($blog) && $blog != null){
                            echo($blog['CONTENT']);
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