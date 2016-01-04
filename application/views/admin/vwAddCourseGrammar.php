<?php
$this->load->view('admin/vwHeader');
?>

    <script>

        tinymce.init({selector: '#create_grammar',
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste jbimages"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            relative_urls: false,


            height: "500",
            width:650
        });
    </script>

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Course <small>Create Grammar</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/course/grammar_list')?>"><i class="icon-dashboard"></i> Grammar</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Create Page</li>
                </ol>
            </div>
        </div><!-- /.row -->


        <div class="fld">
            <?php echo form_open('admin/course/create_grammar_submit', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <label class="control-label col-sm-3">Lesson</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input class="form-control" value="" name="lesson">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="organization-create-user">Course</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <?php echo form_dropdown('course', $course_dropdown, $course_dropdown_checked, 'id="category-edit-cms" class="form-control"'); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Content</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <textarea id="create_grammar" class="text-counter-js form-control" rows="50" cols="50" maxlength="4900" name="content">
                        <?php
                        echo isset($gram['content']) && !empty($gram['content']) ? $gram['content'] : '';
                        ?>
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Content Preview</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <textarea class="text-counter-js form-control" rows="5" cols="10" maxlength="200" name="preview"></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-1 col-md-2 col-sm-2 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                    <input type="submit" name="btn_submit" class="btn btn-primary" value="Save">
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                    <a href="<?php echo site_url('admin/course/grammar_list');?>" class="btn btn-info" >Cancel</a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>