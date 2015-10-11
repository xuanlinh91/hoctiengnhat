<div class="row">
    <div class="content well-lg">
        <?php echo form_open('game/chonchu', array('class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
            <div class="form-group text-center">
                <div class="col-lg-4">
                    <?php
                    $options = array(
                        HIRAGANA          => 'Hiragana',
                        KATAKANA         => 'Katakana',
                        KANJI     => 'Kanji'
                    );

                    echo form_dropdown('type', $options, 'hiragana', 'class = "form-control"');
                    ?>
                </div>
                <div class="col-lg-4">
                    <?php
                    $options = array(
                        CHON_CHU_LEVEL_EASY          => 'Easy',
                        CHON_CHU_LEVEL_NORMAL         => 'Normal',
                        CHON_CHU_LEVEL_HARD     => 'Hard'
                    );

                    echo form_dropdown('level', $options, 'easy', 'class = "form-control"');
                    ?>
                </div>
                <div class="col-lg-4">
                    <?php
                    $data = array(
                        'name'          => 'number',
                        'type'          => 'number',
                        'value'         => '',
                        'max'     => '107',
                        'min'     => '5',
                        'class'          => 'form-control',
                        'placeholder'   => 'Nhập số lượng chữ cái, ít nhất là 5'
                    );

                    echo form_input($data);
                    ?>
                </div>
            </div>

        <div class="form-group">
            <div class="col-lg-2 text-left">
                <button type="submit" class="btn-lg btn-info">Start</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
