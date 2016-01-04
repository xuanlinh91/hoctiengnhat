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
                <h1>Category <small>Manage Category Module</small></h1>
                <ol class="breadcrumb">
                    <li><a href="category"><i class="icon-dashboard"></i> Category</a></li>
                    <li class="active"><i class="icon-file-alt"></i> List Category</li>
                    <a href="<?php echo site_url('admin/category/create')?>" class="btn btn-primary"  style="float:right;">Add New Category</a>
                    <div style="clear: both;"></div>

                </ol>
            </div>
        </div><!-- /.row -->



        <div class="table-responsive">
            <table class="table table-hover tablesorter">
                <thead>
                <tr>
                    <th class="header">ID <i class="fa fa-sort"></i></th>
                    <th class="header">CATEGORY <i class="fa fa-sort"></i></th>
                    <th class="header">PARENT <i class="fa fa-sort"></i></th>
                    <th class="header">Action<i class="fa fa-sort"></i></th>
                    <th class="header">Delete<i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach($cate as $val){
                    ?>

                    <tr>
                        <td><?php echo $val['ID']; ?></td>
                        <td><?php echo $val['CATEGORY']; ?></td>
                        <td><?php echo $val['PARENT']; ?></td>
                        <td><a class="btn btn-info" href="<?php echo site_url('admin/category/edit').'/'.$val['ID']?>">Edit</a></td>
                        <td><a class="btn btn-danger cate_delete" href="<?php echo site_url('admin/category/delete_cms').'/'.$val['ID']?>">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>


    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>