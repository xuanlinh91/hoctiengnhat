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
    //var circle = new ProgressBar.Circle('#example-percent-container', {
    //    color: '#FCB03C',
    //    strokeWidth: 3,
    //    trailWidth: 1,
    //    duration: 1500,
    //    text: {
    //        value: '0'
    //    },
    //    step: function(state, bar) {
    //        bar.setText((bar.value() * 100).toFixed(0));
    //    }
    //});
    //
    //circle.animate(1, function() {
    //    circle.animate(0);
    //})

    setTimeout(function() {
        $(".alert").slideUp();
    }, 2000);

    $("#loginLink").click(function( event ){
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });

    $(".overlayLink").click(function(event){
        event.preventDefault();
        var action = $(this).attr('data-action');

        //$.get( "ajax/" + action, function( data ) {
        //    $( ".login-content" ).html( data );
        //});

        $(".overlay").fadeToggle("fast");
    });

    $(".login-close").click(function(){
        $(".overlay").fadeToggle("fast");
    });

    generate_error_handle(configs.listOfErrors);

    $(document).keyup(function(e) {
        if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) {
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });


    $("#link_back_btn").click(function(){
        var link = window.location.href;
        $("#link_back").val(link);
    });

});



