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
                <h1>Course <small>Edit Kanji</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/course/kanji_list')?>"><i class="icon-dashboard"></i> Kanji</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Page</li>
                </ol>
            </div>
        </div><!-- /.row -->


        <div class="fld">
            <?php echo form_open('admin/course/update_kanji', array('class' => 'form-horizontal')); ?>
            <input type="hidden" class="form-control" value="<?php echo isset($kanji['ID']) && !empty($kanji['ID']) ? $kanji['ID'] : '';?>" name="ID">
            <div class="form-group">
                <label class="control-label col-sm-3">Hán tự</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($kanji['CHAR']) && !empty($kanji['CHAR']) ? $kanji['CHAR'] : '';?>" name="CHAR">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Âm Hán Việt</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($kanji['AMHV']) && !empty($kanji['AMHV']) ? $kanji['AMHV'] : '';?>" name="AMHV">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nghĩa</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($kanji['NGHIA']) && !empty($kanji['NGHIA']) ? $kanji['NGHIA'] : '';?>" name="NGHIA">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Âm On</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($kanji['ON']) && !empty($kanji['ON']) ? $kanji['ON'] : '';?>" name="ON">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Âm Kun</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="<?php echo isset($kanji['KUN']) && !empty($kanji['KUN']) ? $kanji['KUN'] : '';?>" name="KUN">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="organization-create-user">Course</label>
                <input type="hidden" class="form-control" value="<?php echo isset($kanji['id']) && !empty($kanji['id']) ? $kanji['id'] : '';?>" name="COURSE">
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <?php echo form_dropdown('course', $course_dropdown, $course_dropdown_checked, 'id="category-edit-cms" class="form-control"'); ?>
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