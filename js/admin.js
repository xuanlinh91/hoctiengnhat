function generate_error_handle(data) {
    if (data.length > 4) {
        var message = JSON.parse(data);
        for (var k = 0; k < message.length; k++) {
            var name, content;
            if (Array.isArray(message[k])) {
                name = message[k][0].id;
                content = message[k][0].content;
            } else {
                name = message[k].id;
                content = message[k].content;
            }
            content = '<span class="text-danger">' + content + '</span>';
            var $currentInput = jQuery('form [name="' + name + '"]').last();
            var $selector = $currentInput;
            if ($selector.length > 0) {
                if ($selector.is('[type="radio"]')) {
                    $selector = $selector.closest('.radio');
                } else if ($selector.is('[type="checkbox"]')) {
                    $selector = $selector.closest('.checkbox');
                } else if ($selector.closest('.input-group').length > 0) {
                    $selector = $selector.closest('.input-group');
                }
            } else {
                $currentInput = jQuery('form [name="' + name + '[]"]').first();
                if ($currentInput.length > 0) {
                    if ($currentInput.next().hasClass('chosen-container')) {
                        $selector = $currentInput.next();
                    } else {
                        $selector = $currentInput;
                    }
                }
            }

            if ($selector.length > 0) {
                $selector.after(content);
            }
        }
    }
}


jQuery(document).ready(function ($) {
    var errorTimeout = 1000;
    if (typeof configs != 'undefined' && configs.errorFlag > 0) {
        /* Display error message */
        $('#notify-container-top').remove();
        var $notification = jQuery('<div id="notify-container-top" class="notify-container"><div class="notify-message">' + configs.errorMess + '</div></div>');
        var customClass = '';
        if (configs.typeMess == 'success') {
            customClass = 'notify-success';
        } else if (configs.typeMess == 'warning') {
            customClass = 'notify-warning';
        } else {
            customClass = 'notify-error';
        }

        if (customClass != '') {
            $notification.addClass(customClass);
        }

        $('body').prepend($notification);
        $notification.slideDown(function () {
            $notification.click(function () {
                $notification.slideUp(function () {
                    $notification.remove();
                });
            });

            setTimeout(function () {
                $notification.slideUp(function () {
                    $notification.remove();
                });
            }, errorTimeout);
        });

    }

    generate_error_handle(configs.listOfErrors);

    $('.cms_delete').click(function () {
        var redirect_link = $(this).attr('href');
        var removeConfirm = confirm('Bạn có chắc chắn muốn xóa bài viết này?');
        if (removeConfirm) {
                window.location.href = redirect_link;
        } else {
            return false;
        }

    });

    $('.user_delete').click(function () {
        var redirect_link = $(this).attr('href');
        var removeConfirm = confirm('Bạn có chắc chắn muốn xóa user này?');
        if (removeConfirm) {
                window.location.href = redirect_link;
        } else {
            return false;
        }

    });
    $('.show-password').click(function () {
        var pass_input = $('.show-password').parent().parent().find('.password');
        if (pass_input.attr('type') == 'password') {
            pass_input.removeAttr('type');
        } else {
            pass_input.attr('type', 'password');
        }

    });


    $('.publisher_delete').click(function () {
        var redirect_link = $(this).attr('href');
        var removeConfirm = confirm('Bạn có chắc chắn muốn xóa publisher này?');
        if (removeConfirm) {
                window.location.href = redirect_link;
        } else {
            return false;
        }

    });

    $('.cate_delete').click(function () {
        var redirect_link = $(this).attr('href');
        var removeConfirm = confirm('Bạn có chắc chắn muốn xóa mục này? Tất cả bài viết trong mục sẽ bị chuyển sang Home Blog!');
        if (removeConfirm) {
                window.location.href = redirect_link;
        } else {
            return false;
        }

    });

    $('#del_thumb').click(function () {
        $('#thumb_img').hide();
        $('#myfile').val('');
        $('#thumb_link').val('');
        $('.progress-bar').html('');
        $('.progress-bar').css('width', '0%');
        $('.progress-bar').removeClass('progress-bar-success');
        $('#upload_button').show();
        $('#upload_file').show();
        $(this).hide();
        return false;
    });


});


