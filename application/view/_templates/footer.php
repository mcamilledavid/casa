<footer class="footer">
    <div class="col-lg-6">
        <ul class="left">
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Terms & Privacy</a></li>
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

<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>