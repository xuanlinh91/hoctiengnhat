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
                    <li class="active"><i class="icon-file-alt"></i> List Grammar</li>
                    <a href="<?php echo site_url('admin/course/create_grammar')?>" class="btn btn-primary"  style="float:right;">Add New Grammar Lesson</a>
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->



        <div class="table-responsive">
            <table class="table table-hover tablesorter">
                <thead>
                <tr>
                    <th class="header">ID<i class="fa fa-sort"></th>
                    <th class="header">Preview<i class="fa fa-sort"></th>
                    <th class="header">Course<i class="fa fa-sort"></th>
                    <th class="header">Lesson<i class="fa fa-sort"></th>
                    <th class="header">Edit<i class="fa fa-sort"></th>
                    <th class="header">Delete<i class="fa fa-sort"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($data_gram) && $data_gram != null){
                    foreach($data_gram as $val){
                        ?>

                        <tr>
                            <td><?php echo $val['id']; ?></td>
                            <td><?php echo $val['preview']; ?></td>
                            <td><?php echo strtoupper($val['course']); ?></td>
                            <td><?php echo $val['lesson']; ?></td>
                            <td><a class="btn btn-info" href="<?php echo site_url('admin/course/edit_grammar').'/'.$val['id']?>">Edit</a></td>
                            <td><a class="btn btn-danger cms_delete" href="<?php echo site_url('admin/course/delete_grammar').'/'.$val['id']?>">Delete</a></td>
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