import {showProductsQuantity, getProductsAssoc, addProductInQuantity} from './functions.js';
$(document).ready(function() {
   const productsAssoc = getProductsAssoc();
   showProductsQuantity(productsAssoc);
    $(".add-prod").click(function(){
        const p_id = $(this).attr("data-id");
        if (productsAssoc[p_id]===undefined) productsAssoc[p_id] = 1;
        else productsAssoc[p_id]++;
        document.cookie = `products=${JSON.stringify(productsAssoc)}; max-age=31556926; path=/`;
        showProductsQuantity(productsAssoc);
    });
    $(".add-product-quantity").click(function(){
      const productId = $(".product-information").data("product-id");
      const quantity = $("#prod-quantity").val();
      addProductInQuantity(productId, quantity);
    })
});