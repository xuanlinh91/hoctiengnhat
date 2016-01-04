<?php
$this->load->view('admin/vwHeader');
?>
    <!--
    Author : Abhishek R. Kaushik
    Downloaded from http://devzone.co.in
    -->

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Course <small>Manage Course Module</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/course')?>"><i class="icon-dashboard"></i> Course</a></li>
                    <li class="active"><i class="icon-file-alt"></i> List Kanji</li>
                    <a href="<?php echo site_url('admin/course/create_kanji')?>" class="btn btn-primary"  style="float:right;">Add New Character</a>
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->



        <div class="table-responsive">
            <table class="table table-hover tablesorter">
                <thead>
                <tr>
                    <th class="header">ID<i class="fa fa-sort"></th>
                    <th class="header">Hán tự<i class="fa fa-sort"></th>
                    <th class="header">Âm HV<i class="fa fa-sort"></th>
                    <th class="header">Nghĩa<i class="fa fa-sort"></th>
                    <th class="header">Âm On<i class="fa fa-sort"></th>
                    <th class="header">Âm Kun<i class="fa fa-sort"></th>
                    <th class="header">Course<i class="fa fa-sort"></th>
                    <th class="header">Action<i class="fa fa-sort"></th>
                    <th class="header">Delete<i class="fa fa-sort"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($data_kanji) && $data_kanji != null){
                    foreach($data_kanji as $val){
                        ?>

                        <tr>
                            <td><?php echo $val['ID']; ?></td>
                            <td><?php echo $val['CHAR']; ?></td>
                            <td><?php echo $val['AMHV']; ?></td>
                            <td><?php echo $val['NGHIA']; ?></td>
                            <td><?php echo $val['ON']; ?></td>
                            <td><?php echo $val['KUN']; ?></td>
                            <td><?php echo $val['COURSE']; ?></td>
                            <td><a class="btn btn-info" href="<?php echo site_url('admin/course/edit_kanji').'/'.$val['ID']?>">Edit</a></td>
                            <td><a class="btn btn-danger cms_delete" href="<?php echo site_url('admin/course/delete_kanji').'/'.$val['ID']?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            echo $this->pagination->create_links();
            ?>

        </div>


    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>