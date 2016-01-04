<?php
    include_once('share/header.php');
    $cor = 'n5';
    if(isset($course) && $course != null){
        $cor = $course;
    }
?>




    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container content marketing n5-content">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <h2>Ngữ Pháp</h2>
            <p>Ngữ pháp tiếng nhật <?php echo strtoupper($cor);?> theo giáo trình Minano Nihongo</p>
            <p><a class="btn btn-default" href="<?php echo site_url($cor.'/gram')?>" role="button">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <h2>Từ Vựng</h2>
            <p>Từ vựng tiếng nhật <?php echo strtoupper($cor);?> tương ứng theo giáo trình Minano Nihongo</p>
            <p><a class="btn btn-default" href="<?php echo site_url($cor.'/volca')?>" role="button">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <h2>Chữ Hán</h2>
            <p>Bao gồm chữ hán sử dụng trong <?php echo strtoupper($cor);?> và các ví dụ sử dụng </p>
            <p><a class="btn btn-default" href="<?php echo site_url($cor.'/kanji')?>" role="button">View details »</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


<?php
include_once('share/footer.php');
?>