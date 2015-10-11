<script type="text/javascript">
    var char = <?php echo $char;?>;
    var page = 'chonchu';
    var timeout = <?php echo $time_out;?>;
</script>
<div class="row">
    <div class="content well-lg">
        <div class="game">
            <?php echo form_open('', array('class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
            <div class="center-character"></div>
            <table class="table">
                <tr>
                    <td><?php
                        echo form_input(array('type' => 'button', 'id' => 'btn_1', 'name' => 'btn-1', 'class' => 'chonchu-click form-control btn btn-info'));
                        ?></td>
                    <td><?php
                        echo form_input(array('type' => 'button', 'id' => 'btn_2', 'name' => 'btn-2', 'class' => 'chonchu-click form-control btn btn-info'));
                        ?></td>
                    <td><?php
                        echo form_input(array('type' => 'button', 'id' => 'btn_3', 'name' => 'btn-3', 'class' => 'chonchu-click form-control btn btn-info'));
                        ?></td>
                    <td><?php
                        echo form_input(array('type' => 'button', 'id' => 'btn_4', 'name' => 'btn-4', 'class' => 'chonchu-click form-control btn btn-info'));
                        ?></td>
                    <td><?php
                        echo form_input(array('type' => 'button', 'id' => 'btn_5', 'name' => 'btn-5', 'class' => 'chonchu-click form-control btn btn-info'));
                        ?></td>
                </tr>
            </table>
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped active"  role="progressbar"
                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">

                </div>
            </div>
            <div class="result">
                <div class="total"></div>
                <div class="true"></div>
            </div>
        </div>
        <div class="result text-center hidden">
            <div class="form-group col-lg-12">
                <label>Bạn đã hoàn thành trò chơi, click nút bên dưới để xem kết quả nhé</label>
            </div>
            <div class="form-group col-lg-6 col-lg-offset-3">
                <?php
                echo form_input(array('type' => 'subtmit', 'id' => 'chonchu-get-result', 'value' => 'Submit', 'class' => 'form-control btn btn-info'));
                ?>            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
