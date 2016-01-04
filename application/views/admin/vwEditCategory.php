<?php
$this->load->view('admin/vwHeader');
?>
    <script>

        tinymce.init({selector: '#edit_cate',
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
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH;?>upload.js"></script>

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Category <small>Edit Category</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/cms'); ?>"><i class="icon-dashboard"></i> CMS</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Category</li>
                </ol>
            </div>
        </div><!-- /.row -->


        <div class="fld">
            <?php echo form_open('admin/cms/update_cms', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <label class="control-label col-sm-3">ID</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input name="ID"  type="text" class="form-control" disabled value="<?php
                    echo isset($category['ID']) && !empty($category['ID']) ? $category['ID'] : '';
                    ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Title</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <input name="TITLE"  type="text" class="form-control" autofocus value="<?php
                    echo isset($category['CATEGORY']) && !empty($category['CATEGORY']) ? $category['CATEGORY'] : '';
                    ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="organization-create-user">Parent</label>
                <div class="col-sm-8 col-md-6 col-lg-8">
                    <?php echo form_dropdown('PARENT', $cate_dropdown, $cate_dropdown_checked, 'id="category-edit-cms" class="form-control"'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-1 col-lg-offset-3">
                    <input type="submit" name="btn_submit" class="btn btn-primary" value="Save">
                </div>
                <div class="col-sm-1col-md-1 col-lg-1">
                    <a href="<?php echo site_url('admin/cms');?>" class="btn btn-info" >Cancel</a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>