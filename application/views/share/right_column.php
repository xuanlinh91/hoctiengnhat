<div class="r_col" id="ad">
    <img width="360px" src="<?php echo base_url('images/ad.gif');?>" />
</div>
<hr>
<div class="r_col" id="new_blog">
    <h4>Blog mới nhất</h4>
    <ul>
        <?php
            for($i=0;$i<count($r_blog);$i++){
                echo '<a href="'.site_url('blog').'/'.$r_blog[$i]['ID'].'"><li>'. $r_blog[$i]['TITLE']. '</li></a>';
            }
        ?>
    </ul>
</div>
<hr>
<?php
    if(isset($lesson) && $lesson != null){
        ?>
        <div class="r_col" id="lienquan">
            <h4>Bài liên quan </h4>
            <ul>
                <?php
                $hientai = isset($gram) ? $gram['lesson'] : $volca['lesson'];
                $tenlink = isset($gram) ? 'Ngữ pháp cơ bản '.strtoupper($cor) : 'Từ vựng '.strtoupper($cor);
                $link = isset($gram) ? 'gram' : 'volca';
                $start = ($hientai-2) < $min_id ? $min_id : ($hientai-2);
                $end = ($hientai+3) > $max_id ? $max_id : ($hientai+3);
                for($i=$start;$i<$end;$i++){
                    echo '<a href="'.site_url($cor.'/'.$link.'/lesson').'/'.$i.'"><li><i class="fa fa-user"></i> '.$tenlink.' :: Bài '.$i.'</li></a>';
                }
                ?>
            </ul>
        </div>
        <hr>
        <?php
    }
?>
<div class="r_col" id="more">
    <h4>Tài liệu tham khảo</h4>
    <ul>

    </ul>
</div>
<hr>
<div class="r_col" id="course">
    <h4>Danh sách giáo trình</h4>
    <ul>
        <li><a href="<?php echo site_url('n5');?>">Giáo trình N5</a></li>
        <li><a href="<?php echo site_url('n4');?>">Giáo trình N4</a></li>
        <li><a href="<?php echo site_url('n3');?>">Giáo trình N3</a></li>
    </ul>
</div>
<hr>