<div class="container">
    <div class="row">
        <section id="cart_items">
            <div class="container">
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">
                                    <?php echo $this->langpack["cart"]["item"]?> 
                                </td>
                                <td class="description"></td>
                                <td class="price">
                                    <?php echo $this->langpack['cart']['price']?> 
                                </td>
                                <td class="quantity">
                                    <?php echo $this->langpack['cart']['quantity']?> 
                                </td>
                                <td class="total">
                                    <?php echo $this->langpack['cart']['subtotal']?>  
                                </td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                    </table>
                </div>
                <div class="continue">
                    <span>
                        <a class="btn btn-primary" href="/<?php echo $this->lang.'/cart/checkout'?>">
                            <?php echo $this->langpack['cart']['continue']?>
                        </a>
                    </span>
                    <span id="total-price"></span>
                </div>
            </div>
        </section> <!--/#cart_items-->
    </div>
</div>