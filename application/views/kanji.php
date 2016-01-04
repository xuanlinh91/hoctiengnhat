<?php
include_once('share/header.php');
?>
    <div class="container gram-content">
        <div class="row">
            <div class="col-lg-8 panel panel-info gram-panel">
                <div class="panel-heading">
                    <h3><a href="<?php echo site_url('home')?>">Trang chủ</a> :: <a href="<?php echo site_url($course)?>">Giáo trình <?php echo(strtoupper($course));?></a> ::
                        <a href="<?php echo site_url($course.'/gram')?>">Chữ Hán <?php echo strtoupper($course);?></a></h3>
                </div>
                <table class="table table-bordered kanji-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th width="80px" class="text-center">Chữ Hán</th>
                            <th>Âm HV</th>
                            <th>Nghĩa</th>
                            <th>Âm On</th>
                            <th>Âm Kun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($kanji) && $kanji != null){
                                for($i=0;$i<count($kanji);$i++){
                                    echo '<tr>';
                                        echo '<td>'.$kanji[$i]['ID'].'</td>';
                                        echo '<td class="kanji-col text-center">'.$kanji[$i]['CHAR'].'</td>';
                                        echo '<td>'.$kanji[$i]['AMHV'].'</td>';
                                        echo '<td>'.$kanji[$i]['NGHIA'].'</td>';
                                        echo '<td>'.$kanji[$i]['ON'].'</td>';
                                        echo '<td>'.$kanji[$i]['KUN'].'</td>';
                                    echo '</tr>';
                                }
                            }

                        ?>
                    </tbody>
                </table>
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