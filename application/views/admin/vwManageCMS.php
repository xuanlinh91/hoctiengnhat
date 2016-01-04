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
                <h1>CMS <small>CMS Module</small></h1>
                <ol class="breadcrumb">
                    <li><a href="CMS"><i class="icon-dashboard"></i> CMS</a></li>
                    <li class="active"><i class="icon-file-alt"></i> List CMS</li>
                    <a href="<?php echo site_url('admin/cms/create')?>" class="btn btn-primary"  style="float:right;">Add New Blog</a>
                    <div style="clear: both;"></div>

                </ol>
            </div>
        </div><!-- /.row -->



        <div class="table-responsive">
            <table class="table table-hover tablesorter">
                <thead>
                <tr>
                    <th class="header">ID<i class="fa fa-sort"></i></th>
                    <th class="header">Title<i class="fa fa-sort"></i></th>
                    <th class="header">Category<i class="fa fa-sort"></i></th>
                    <th class="header">Date<i class="fa fa-sort"></i></th>
                    <th class="header">Author<i class="fa fa-sort"></i></th>
                    <th class="header">Action<i class="fa fa-sort"></i></th>
                    <th class="header">Delete<i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($data_cms as $val){
                    ?>

                    <tr>
                        <td><?php echo $val['ID']; ?></td>
                        <td><?php echo $val['TITLE']; ?></td>
                        <td><?php echo $val['CATEGORY']; ?></td>
                        <td><?php echo $val['DATETIME']; ?></td>
                        <td><?php echo $val['AUTHOR']; ?></td>
                        <td><a class="btn btn-info" href="<?php echo site_url('admin/cms/edit').'/'.$val['ID']?>">Edit</a></td>
                        <td><a class="btn btn-danger cms_delete" href="<?php echo site_url('admin/cms/delete_cms').'/'.$val['ID']?>">Delete</a></td>
                    </tr>
                    <?php
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