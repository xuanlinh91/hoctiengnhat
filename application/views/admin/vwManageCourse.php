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
                <h1>Course <small>Manage Course Module</small></h1>
                <ol class="breadcrumb">
                    <li><a href="Course"><i class="icon-dashboard"></i> Course</a></li>
                    <li class="active"><i class="icon-file-alt"></i> List Course</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo site_url('admin/course/grammar_list');?>">
                            <div class="col-xs-6">
                                <p class="announcement-heading">Grammar</p>
                                <p class="announcement-text">Biên tập ngữ pháp</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo site_url('admin/course/volca_list');?>">
                            <div class="col-xs-6">
                                <p class="announcement-heading">Volcabulary</p>
                                <p class="announcement-text">Biên tập từ vựng</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo site_url('admin/course/kanji_list');?>">
                            <div class="col-xs-6">
                                <p class="announcement-heading">Kanji</p>
                                <p class="announcement-text">Biên tập chữ Hán</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>