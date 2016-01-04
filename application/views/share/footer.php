<footer>
    <p id="bttop">Back to top</p>
    <p>© 2014 Company, Inc. · <a href="">Privacy</a> · <a href="">Terms</a></p>
</footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/hoctiengnhat/js/jquery.min.js"></script>
<script src="/hoctiengnhat/js/bootstrap.min.js"></script>
<script src="/hoctiengnhat/js/docs.min.js"></script>
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