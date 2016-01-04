<?php
include_once('share/header.php');
if(isset($course) && $course != null){
    $cor = $course;
} else $cor = 'n5';
?>
<div class="container volca-content">
    <div class="row">
        <div class="col-lg-8 panel panel-info volca-panel">
            <div class="panel-heading">
                <h3><a href="<?php echo site_url('home')?>">Trang chủ</a> :: <a href="<?php echo site_url($cor)?>">Giáo trình <?php echo strtoupper($cor);?></a> ::
                    <a href="<?php echo site_url($cor.'/volca')?>">Từ vựng</a>
                    <?php
                    if(isset($lesson) && $lesson != null && isset($volca) && $volca != null) {
                        echo ':: Bài '.$lesson.'</h3>';
                    }
                    ?></h3>
            </div>
            <ul class="list-group">
                <?php
                if(isset($data_get) && $data_get != 0){
                ?>
                <?php
                for($i=0;$i<count($data_get);$i++){
                    ?>
                    <li class="list-group-item">
                        <div class="<?php echo $cor;?>-volca-lesson-title lesson-title">
                            <a href="<?php echo site_url($cor.'/volca/lesson/'.($data_get[$i]['lesson']));?>">Bài <?php echo $data_get[$i]['lesson'];?></a>
                        </div>
                        <div class="<?php echo $cor;?>-volca-preview">
                            <?php
                            $prv = $data_get[$i]['preview'];
                            echo nl2br($prv);
                            ?>
                        </div>

                    </li>

                    <?php
                }
                ?>
                <div class="pagination"><div class="page_link">
                        <?php
                        echo $this->pagination->create_links();
                        ?>
            </ul>
            <?php

            } elseif(isset($lesson) && $lesson != null && isset($volca) && $volca != null) {      ?>
            <li class="list-group-item">
                <?php
                    echo(nl2br(htmlspecialchars($volca['content'])));
                    if($volca['lesson'] < $max_id){?>
                        <div class="text-center next-lesson">
                            <a class="btn btn-info" href="<?php echo site_url($cor.'/volca/lesson/'.($volca['lesson']+1));?>">Bài tiếp theo</a>
                        </div>
                        <div class="fb-comments" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-colorscheme="light" data-width="100%"></div>
                        <?php
                    }
                }
                ?>
            </li>
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


