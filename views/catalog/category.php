<?php include (ROOT."/views/layouts/header.php"); ?>
        <main>
            <div class="container">
                <div class="row">
                   <?php include (ROOT."/views/layouts/categories.php"); ?>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">
                            <?php $ctg_name = false; 
                                if (isset($categoryProducts[0]["ctg_".$this->lang."_name"]))
                                $ctg_name =  $categoryProducts[0]["ctg_".$this->lang."_name"];
                            ?>
                            <?php echo $ctg_name?$ctg_name:$this->langpack['product']['no_ctg'];?>
                            </h2>
                            <?php foreach ($categoryProducts as $product): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img class="img-fluid"src="<?php echo $product['img']?>" alt="<?php echo $product['name']?>" />
                                                <h2>
                                                    <b id="pricePrefix">₾</b><?php echo $product['price']?>
                                                </h2>
                                                <p>
                                                    <a href="<?php echo "/".$this->lang?>/products/<?php echo $product['id']?>">
                                                        <?php echo $product['name']?>
                                                    </a>       
                                                </p>
                                                <button class="btn btn-default add-to-cart add-prod" data-id="<?php echo $product['id']?>">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <?php echo $this->langpack['nav']['to_cart']?>
                                                </button>
                                                <?php if($product['is_new']):?>
                                                    <div class="new">
                                                        <img src="/template/images/product-details/new.jpg" alt="New product">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php echo $pagination->generate();?>
                    </div>
                </div>
            </div>
        </main>
<?php include (ROOT."/views/layouts/footer.php"); ?>