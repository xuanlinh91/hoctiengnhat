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
                <h1>Users <small>Manage Users Module</small></h1>
                <ol class="breadcrumb">
                    <li><a href="Users"><i class="icon-dashboard"></i> Users</a></li>
                    <li class="active"><i class="icon-file-alt"></i> List Users</li>
                    <button class="btn btn-primary" type="button" style="float:right;">Add New User</button>
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->



        <div class="table-responsive">
            <table class="table table-hover tablesorter">
                <thead>
                <tr>
                    <th class="header">ID <i class="fa fa-sort"></i></th>
                    <th class="header">UserName <i class="fa fa-sort"></i></th>
                    <th class="header">Email <i class="fa fa-sort"></i></th>
                    <th class="header">First Name <i class="fa fa-sort"></i></th>
                    <th class="header">Last Name <i class="fa fa-sort"></i></th>
                    <th class="header">Action<i class="fa fa-sort"></i></th>
                    <th class="header">Delete<i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($data_user as $val){
                        ?>

                        <tr>
                            <td><?php echo $val['id']; ?></td>
                            <td><?php echo $val['user_name']; ?></td>
                            <td><?php echo $val['email']; ?></td>
                            <td><?php echo $val['first_name']; ?></td>
                            <td><?php echo $val['last_name']; ?></td>
                            <td><a class="btn btn-info" href="<?php echo site_url('admin/users/edit_user').'/'.$val['id']?>">Edit</a></td>
                            <td><a class="btn btn-danger cms_delete" href="<?php echo site_url('admin/users/delete_user').'/'.$val['id']?>">Delete</a></td>
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