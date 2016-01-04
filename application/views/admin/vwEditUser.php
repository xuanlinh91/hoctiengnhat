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
                <h1>Course <small>Edit User</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/course/users_list')?>"><i class="icon-dashboard"></i> Users</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Page</li>
                </ol>
            </div>
        </div><!-- /.row -->


        <div class="fld">
            <?php echo form_open('admin/course/update_grammar', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <label class="control-label col-sm-3">User Name</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['user_name']) && !empty($user['user_name']) ? $user['user_name'] : '';?>" name="user_name">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Password Reset</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input type="password" class="form-control" value="" name="password">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">First Name</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['first_name']) && !empty($user['first_name']) ? $user['first_name'] : '';?>" name="first_name">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Last Name</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['last_name']) && !empty($user['last_name']) ? $user['last_name'] : '';?>" name="last_name">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Email</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['email']) && !empty($user['email']) ? $user['email'] : '';?>" name="email">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Phone Mobile</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['phone_mobile']) && !empty($user['phone_mobile']) ? $user['phone_mobile'] : '';?>" name="phone_mobile">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Status</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['status']) && !empty($user['status']) ? $user['status'] : '';?>" name="status">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-1 col-md-2 col-sm-2 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                    <input type="submit" name="btn_submit" class="btn btn-primary" value="Save">
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                    <a href="<?php echo site_url('admin/users/users_list');?>" class="btn btn-info" >Cancel</a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>