<?php
    $this->load->view('admin/vwHeader');
?>

    <script>

        tinymce.init({selector: '#edit_cms',
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
                <h1>CMS <small>Edit Page</small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/cms'); ?>"><i class="icon-dashboard"></i> CMS</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Page</li>
                </ol>
            </div>
        </div><!-- /.row -->


        <div class="fld">
                <?php echo form_open('admin/cms/edit_submit', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Title</label>
                        <input type="hidden" value="<?php echo isset($cms['ID']) && !empty($cms['ID']) ? $cms['ID'] : '';?>" name="ID">
                        <div class="col-sm-8 col-md-6 col-lg-8">
                            <input name="TITLE"  type="text" class="form-control" autofocus value="<?php
                                echo isset($cms['TITLE']) && !empty($cms['TITLE']) ? $cms['TITLE'] : '';
                            ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="organization-create-user">Category</label>
                        <div class="col-sm-8 col-md-6 col-lg-8">
                            <?php echo form_dropdown('CATEGORY', $cate_dropdown, $cate_dropdown_checked, 'id="category-edit-cms" class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Thumbnail</label>

                        <div class="col-lg-2 col-sm-3">
                            <img width="100px" id="thumb_img" height="100px" src="<?php echo base_url($cms['THUMB']);?>" />
                        </div>
                        <div class="col-lg-2">
                            <a href="" id="del_thumb" class="btn btn-danger" >Xóa thumbnail</a>
                        </div>

                        <input name="THUMB" id="thumb_link"type="hidden" class="form-control" value="<?php echo $cms['THUMB_HIDDEN'];?>">
                        <div id="upload_file" style="display: none;" class="col-sm-8 col-md-6 col-lg-8">
                            <input type="file" class="form-control" name="myfile" id="myfile">
                        </div>

                    </div>

                    <div class="form-group">
                        <div id="upload_button" style="display: none;" class="col-lg-offset-3 col-lg-8">
                            <input type="button" class="btn btn-default" value="Upload" onclick="doUpload();"/>
                            <input type="button" class="btn btn-default" value="Cancle" onclick="cancleUpload();"/>
                        </div>
                    </div>

                    <img src="/hoctiengnhat/images/progressbar.gif" style="display:none" />

                    <div class="form-group">
                        <div id="progress-group" style="display: none;" class="col-lg-offset-3 col-lg-8" style="display:none">
                            <div class="progress">
                                <div class="progress-bar" style="width: 0%;">
                                </div>
                                <div class="progress-text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Content</label>
                        <div class="col-sm-8 col-md-6 col-lg-8">
                            <textarea id="edit_cms" class="text-counter-js form-control" rows="50" cols="50" maxlength="4900" name="CONTENT">
                                <?php
                                    echo isset($cms['CONTENT']) && !empty($cms['CONTENT']) ? $cms['CONTENT'] : '';
                                ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Content Preview</label>
                        <div class="col-sm-8 col-md-6 col-lg-8">
                            <textarea class="text-counter-js form-control" rows="5" cols="10" maxlength="200" name="PREVIEW"><?php echo isset($cms['PREVIEW']) && !empty($cms['PREVIEW']) ? trim($cms['PREVIEW']) : '';?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Fee</label>
                        <div class="col-sm-8 col-md-6 col-lg-8">
                            <input class="form-control" type="number" value="<?php echo isset($cms['FEE']) && !empty($cms['FEE']) ? $cms['FEE'] : '';?>" name="FEE">
                        </div>
                    </div>


            <div class="form-group">
                                <div class="col-lg-1 col-md-2 col-sm-2 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                                    <input type="submit" name="btn_submit" class="btn btn-primary" value="Save">
                                </div>
                                <div class="col-sm-1 col-md-1 col-lg-1">
                                    <a href="<?php echo site_url('admin/cms');?>" class="btn btn-info" >Cancel</a>
                                </div>
                            </div>
                    <?php echo form_close(); ?>
        </div>

    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>