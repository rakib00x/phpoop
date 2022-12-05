<?php include (ROOT."/views/layouts/header.php"); ?>
        <main>
            <?php if (isset($_COOKIE['products'])): ?>
            <?php include (ROOT."/views/layouts/cart.php"); ?>
            <?php else: ?>
            <?php if(isset($_SESSION['order_success'])):?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                         <div class="alert alert-success">
                          <?php echo $this->langpack['cart']['success']?>
                        </div>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['order_success'])?>
            <?php else: ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                         <div class="alert alert-warning">
                          <strong><?php echo $this->langpack["cart"]["empty"]?>!&nbsp;</strong>
                          <?php echo $this->langpack["cart"]["add4chk"]?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <?php endif; ?>
        </main>
<?php include (ROOT."/views/layouts/footer.php"); ?>
<script type="module" src="/template/js/cart_page.js"></script>