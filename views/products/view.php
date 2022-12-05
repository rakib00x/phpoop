<?php include (ROOT."/views/layouts/header.php"); ?>
        <main>
            <div class="container">
                <div class="row">
                    <?php include (ROOT."/views/layouts/categories.php"); ?>
                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?php echo $product['img']?>" alt="<?php echo $product['name']?>" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information" data-product-id="<?php echo $product['id']?>"><!--/product-information-->
                                        <?php if ($product['is_new']): ?>
                                        <img src="/template/images/product-details/new.jpg" class="newarrival" alt="New product" />
                                        <?php endif; ?>
                                        <h2><?php echo $product['name']?></h2>
                                        <p><?php echo $this->langpack["product"]["code"]?>: <?php echo $product['code']?></p>
                                        <span>
                                            <span><b id="pricePrefix">₾</b><?php echo $product['price'];?></span>
                                            <label><?php echo $this->langpack["product"]["amount"]?>:</label>
                                            <input type="number" value="1" min="1" id="prod-quantity">
                                            <button type="button" class="btn btn-default cart add-product-quantity" data-id="<?php echo $product['id']?>">
                                                <i class="fa fa-shopping-cart"></i>
                                                <?php echo $this->langpack["nav"]["to_cart"]?>
                                            </button>
                                        </span>
                                        <p>
                                            <b><?php echo $this->langpack["product"]["availability"]?>:</b>
                                            &nbsp;
                                            <?php 
                                            if(!$product['availability']) 
                                                echo $this->langpack["product"]["out_of_stock"];
                                            else echo $this->langpack["product"]["in_stock"]; 
                                            ?>
                                        </p>
                                        <p><b><?php echo $this->langpack["product"]["condition"]?>:</b>&nbsp;
                                            <?php 
                                            if($product['is_new']) echo $this->langpack["product"]["cond_new"];
                                            else echo $this->langpack["product"]["cond_used"];
                                            ?>
                                        </p>
                                        <p>
                                            <b><?php echo $this->langpack["product"]["brand"]?>:</b>&nbsp;<?php echo $product['brand'];?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <?php if (!empty($product[$this->lang."_description"])):?>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h2 id="prod-desc">
                                        <?php echo $this->langpack["product"]["description"]?>
                                    </h2>
                                    <p>
                                        <?php echo $product[$this->lang."_description"]?>
                                    </p>
                               
                                </div>
                            </div>
                            <?php endif?>
                        </div><!--/product-details-->
                    </div>
                </div>
            </div>
        </main>
        <br/>
        <br/>
<?php include (ROOT."/views/layouts/footer.php"); ?>