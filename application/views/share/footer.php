<footer>
    <p id="bttop">Back to top</p>
    <p>HocTiengNhat.com © 2014 Company, Inc. · <a href="<?php echo site_url('about')?>">Giới thiệu</a> · <a href="<?php echo site_url('login/register')?>">Đăng ký</a></p>
    Email: xuanlinh91@gmail.com<br>
    Tel: 097 331 6891<br>
    Add: 18 ngõ 87 Nguyễn Khang - Cầu Giấy - Hà Nội
</footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="/hoctiengnhat/js/jquery.min.js"></script>-->
<!--<script src="/hoctiengnhat/js/bootstrap.js"></script>-->
<script src="/hoctiengnhat/js/bootstrap.min.js"></script>
<script src="/hoctiengnhat/js/docs.min.js"></script>
<script src="/hoctiengnhat/js/main.js"></script>

<script type='text/javascript'>
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() != 0) {
                $('#bttop').fadeIn();
            } else {
                $('#bttop').fadeOut();
            }
        });
        $('#bttop').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
        });
    });
</script>

</body></html>