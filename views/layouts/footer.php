    <footer id="footer"><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © <?php echo date("Y");?></p>
                    <p class="pull-right">Site by </p>
                </div>
            </div>
        </div>
    </footer><!--/Footer-->
    <script src="/template/js/jquery.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>
    <script src="/template/js/jquery.scrollUp.min.js"></script>
    <script type="module" src="/template/js/cart.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/template/js/main.js"></script>
    <?php if(isset($_SESSION['user'])) include_once ROOT."/views/user/logOutWindow.php"?>
</body>
</html>