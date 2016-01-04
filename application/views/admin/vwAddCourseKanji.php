<?php
$this->load->view('admin/vwHeader');
?>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Course <small>Create Kanji</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/course/kanji_list')?>"><i class="icon-dashboard"></i> Kanji</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Create Page</li>
                </ol>
            </div>
        </div><!-- /.row -->


        <div class="fld">
            <?php echo form_open('admin/course/create_kanji_submit', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <label class="control-label col-sm-3">Hán tự</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="" name="CHAR">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Âm Hán Việt</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="" name="AMHV">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nghĩa</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="" name="NGHIA">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Âm On</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="" name="ON">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Âm Kun</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="" name="KUN">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="organization-create-user">Course</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <?php echo form_dropdown('COURSE', $course_dropdown, $course_dropdown_checked, 'id="category-edit-cms" class="form-control"'); ?>
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-1 col-md-2 col-sm-2 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                    <input type="submit" name="btn_submit" class="btn btn-primary" value="Save">
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                    <a href="<?php echo site_url('admin/course/kanji_list');?>" class="btn btn-info" >Cancel</a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>