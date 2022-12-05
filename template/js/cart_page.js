import {
        showProductsQuantity, 
        getProductsAssoc, 
        initializeProductsHTML, 
        changeProductQuantity, 
        deleteProduct
} from './functions.js';
$(document).ready(function() {
    const productsAssoc = getProductsAssoc();
    if (Object.keys(productsAssoc).length>0){
        initializeProductsHTML(productsAssoc);
    }
    $(document).on('change', '.cart_quantity_input', function(){
        const quantity = $(this).val();
        const productId = $(this).closest("tr").data("product-id");
        changeProductQuantity(productId, quantity);
    });
    $(document).on('click', '.cart_quantity_delete', function(e){
        e.preventDefault();
        const productId = $(this).closest("tr").data("product-id");
        deleteProduct(productId);
    });
});