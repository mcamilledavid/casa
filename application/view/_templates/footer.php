<footer class="footer">
    <div class="col-lg-6">
        <ul class="left">
            <li><a href="<?php echo URL; ?>about">About</a></li>
            <li><a href="<?php echo URL; ?>contact">Contact</a></li>
            <li><a href="<?php echo URL; ?>terms">Terms & Privacy</a></li>
        </ul>
    </div>
    <div class="col-lg-6" align="right">
        <p>SFSU SWE Project. Demonstration Only. Copyright © 2016 Casa.</p>
    </div>
</footer>

<!-- jQuery, loaded in the recommended protocol-less way -->
<!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
<script src="<?php echo URL; ?>js/jquery-3.1.1.min.js"></script>

<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?php echo URL; ?>";
</script>

<script>
    var signup = document.getElementById('popup-signup');
    var login = document.getElementById('popup-login');
    window.onclick = function (event) {
        if (event.target == signup || event.target == login) {
            signup.style.display = "none";
            login.style.display = "none";
        }
    };
</script>

<!-- Google Analytic JavaScript -->
<!--DO NOT TOUCH/EDIT THIS SCRIPT -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87345966-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>

</body>
</html>