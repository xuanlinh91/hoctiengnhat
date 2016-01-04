<?php
include_once('share/header.php');
?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo base_url('images/banner1.jpg');?>" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>HocTiengNhat.Com</h1>
                        <p>Sản phẩm website học tiếng nhật miễn phí ở mức độ cơ bản dành cho các bạn mới làm quen với tiếng nhật, bao gồm 3 cấp độ phổ thông nhất N5, N4, N3
                            Hãy đăng ký với chúng tôi để nhận được các đầy đủ kiến thức và tài liệu học tập nhé!
                        </p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Đăng ký</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url('images/banner2.jpg');?>" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Luyện thi JLPT, NAT</h1>
                        <p>Ôn thi chứng chỉ JLPT cấp tốc, với giáo trình đặc biệt trong vòng 1 tháng</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem chi tiết</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url('images/banner3.jpg');?>" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Về chúng tôi</h1>
                        <p>Website được phát triển phi lợi nhuận nhằm hỗ trợ học tiếng Nhật cho người Việt, được phát triển bởi tác giả Nguyễn Xuân Linh</p>
                        <p><a class="btn btn-lg btn-primary" href="<?php echo site_url('about')?>" role="button">About</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="http://getbootstrap.com.vn/examples/carousel/#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="http://getbootstrap.com.vn/examples/carousel/#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo base_url('images/N5.png');?>" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                <h2></h2>
                <p>Giáo trình học tiếng Nhật sơ cấp dựa theo cuốn Minano Nihongo phổ biến nhất, phục vụ luyện thi cấp độ N5</p>
                <p><a class="btn btn-default" href="<?php echo site_url('n5'); ?>" role="button">Xem chi tiết »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo base_url('images/N4.png');?>" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                <h2></h2>
                <p>Giáo trình học tiếng Nhật sơ cấp dựa theo cuốn Minano Nihongo phổ biến nhất, phục vụ luyện thi cấp độ N4</p>
                <p><a class="btn btn-default" href="<?php echo site_url('n4'); ?>" role="button">Xem chi tiết »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo base_url('images/N3.png');?>" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                <h2></h2>
                <p>Giáo trình học tiếng Nhật sơ cấp dựa theo cuốn Minano Nihongo phổ biến nhất, phục vụ luyện thi cấp độ N3</p>
                <p><a class="btn btn-default" href="<?php echo site_url('n3'); ?>" role="button">Xem chi tiết »</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->
    <div class="container news">
        <?php
            for($i=0;$i<count($blog);$i++){
        ?>
                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-2">
                        <img class="featurette-image img-responsive" alt="500x500" src="<?php echo base_url($blog[$i]['THUMB']);?>">
                    </div>
                    <div class="col-md-8">
                        <h4 class="featurette-heading"><a href="<?php echo site_url('blog').'/'.$blog[$i]['ID'];?>"><?php echo $blog[$i]['TITLE'];?></a></h4>
                        <p class="lead"><?php $prv = mb_substr($blog[$i]['PREVIEW'],0,200); echo preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($prv));?></p>
                    </div>

                </div>
        <?php

            }
        ?>

    </div>


<?php
    include_once('share/footer.php');
?>