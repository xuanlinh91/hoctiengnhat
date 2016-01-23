<?php
$this->load->view('admin/vwHeader');
?>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>User <small>Edit User</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/user/user_list')?>"><i class="icon-dashboard"></i> User</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Page</li>
                </ol>
            </div>
        </div><!-- /.row -->


        <div class="fld">
            <?php echo form_open('admin/user/edit_submit', array('class' => 'form-horizontal')); ?>
            <input type="hidden" class="form-control" value="<?php echo isset($user['ID']) && !empty($user['ID']) ? $user['ID'] : '';?>" name="ID">
            <div class="form-group">
                <label class="control-label col-sm-3">User Name</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['USERNAME']) && !empty($user['USERNAME']) ? $user['USERNAME'] : '';?>" name="USERNAME">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Password Reset</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <div class="input-group">
                        <input type="password" class="form-control password" name="PASSWORD">
                          <span class="input-group-addon">
                            <input class="show-password" type="checkbox"">
                          </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">First Name</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['FIRSTNAME']) && !empty($user['FIRSTNAME']) ? $user['FIRSTNAME'] : '';?>" name="FIRSTNAME">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Last Name</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($user['LASTNAME']) && !empty($user['LASTNAME']) ? $user['LASTNAME'] : '';?>" name="LASTNAME">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Email</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" type="email" value="<?php echo isset($user['EMAIL']) && !empty($user['EMAIL']) ? $user['EMAIL'] : '';?>" name="EMAIL">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Gold</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" type="number" value="<?php echo isset($user['GOLD']) && !empty($user['GOLD']) ? $user['GOLD'] : '';?>" name="GOLD">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Status</label>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <?php
                    $options = array(
                        '1'  => 'Ban',
                        '0'    => 'Active',
                    );

                    echo form_dropdown('STATUS', $options, isset($user['STATUS']) ? $user['STATUS'] : '0', 'class="form-control"');
                    ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-1 col-md-2 col-sm-2 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                    <input type="submit" name="btn_submit" class="btn btn-primary" value="Save">
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                    <a href="<?php echo site_url('admin/user/user_list');?>" class="btn btn-info" >Cancel</a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>