<?php
include_once('share/header.php');
if(isset($course) && $course != null){
    $cor = $course;
}
?>
    <div class="container gram-content">
        <div class="row">
            <div class="col-lg-8 panel panel-info gram-panel">
                <div class="panel-heading">
                    <h3><a href="<?php echo site_url('home')?>">Trang chủ</a> :: <a href="<?php echo site_url($cor)?>">Giáo trình <?php echo(strtoupper($course));?></a> ::
                        <a href="<?php echo site_url($cor.'/gram')?>">Ngữ pháp cơ bản</a>
                        <?php
                        if(isset($lesson) && $lesson != null && isset($gram) && $gram != null) {
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
                            <div class="<?php echo $cor;?>-gram-lesson-title lesson-title">
                                <a href="<?php echo site_url($cor.'/gram/lesson/'.($data_get[$i]['lesson']));?>">Bài <?php echo $data_get[$i]['lesson'];?></a>
                            </div>
                            <div class="<?php echo $cor;?>-gram-preview">
                                <?php
                                $prv = $data_get[$i]['preview'];
                                echo nl2br(htmlspecialchars($prv));
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

                } elseif(isset($lesson) && $lesson != null && isset($gram) && $gram != null) {      ?>
                <li class="list-group-item">
                    <?php
                        echo(nl2br(htmlspecialchars($gram['content'])));
                        if($gram['lesson'] < $max_id){?>
                            <div class="text-center next-lesson">
                                <a class="btn btn-info" href="<?php echo site_url($cor.'/gram/lesson/'.($gram['lesson']+1));?>">Bài tiếp theo</a>
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