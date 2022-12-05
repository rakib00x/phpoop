function showProductsQuantity(prodAssoc){
    let quantity = 0;
    for (let product in prodAssoc) quantity+=prodAssoc[product];
    $("#cart").text(`(${quantity})`);
}
function getProductsAssoc(){
    let products=false;
    const cookies = document.cookie.split(";");
    for (let i = 0; i<cookies.length; i++) {
        if (cookies[i].includes("products")){
            products = cookies[i]; 
            break;
        }
    }
    if (products!==false) {
        products = products.split("=");
        products = JSON.parse(products[1]);
    }
    else products = {};
    return products;
}
function initializeProductsHTML (prodAssoc){
    let productsHtml="";
    let productsTotalPrice = 0;
    $.post("/cart/GetProducts", {productsAssoc: prodAssoc}, function(data) {
        return data;
    }, "json").done(function(products){
        for (let product in products){
            productsTotalPrice+=parseFloat(products[product]["subtotal"]);
            productsHtml+=`<tr data-product-id="${products[product]["id"]}">
                                <td class="cart_product">
                                    <div class="cart-pic">
                                            <img src="${products[product]["img"]}" class="img-responsive">
                                    </div>
                                </td>
                                <td class="cart_description">
                                    <h4>${products[product]["name"]}</h4>
                                        <p>Web ID: ${products[product]["code"]}</p>
                                </td>
                                <td class="cart_price">
                                    <p>₾${products[product]["price"]}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                            <input class="cart_quantity_input" type="number" name="quantity" value=${products[product]["quantity"]} autocomplete="off" min="1" size="2">
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        ₾${products[product]["subtotal"]}
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="#">
                                         <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>`;
        }
        $("#total-price").text(`₾ ${productsTotalPrice}`);
        $("tbody").html(productsHtml);
    })
}
function deleteProduct(id) {
    let productsAssoc = getProductsAssoc();
    delete productsAssoc[id];
    showProductsQuantity(productsAssoc);
    initializeProductsHTML(productsAssoc);
    document.cookie = `products=${JSON.stringify(productsAssoc)}; max-age=31556926; path=/`;
    if (Object.keys(productsAssoc).length===0) {
        document.cookie = `products=${JSON.stringify(productsAssoc)}; max-age=0; path=/`;
        location.reload();
    }
}
function changeProductQuantity(id, quantity) {
    const productsAssoc = getProductsAssoc();
    productsAssoc[id]=parseInt(quantity);
    document.cookie = `products=${JSON.stringify(productsAssoc)}; max-age=31556926; path=/`;
    showProductsQuantity(productsAssoc);
    initializeProductsHTML(productsAssoc);
}
function addProductInQuantity(id, quantity){
    const productsAssoc = getProductsAssoc();
    if (productsAssoc[id]===undefined) productsAssoc[id]=parseInt(quantity);
    else productsAssoc[id]+=parseInt(quantity);
    showProductsQuantity(productsAssoc);
    document.cookie = `products=${JSON.stringify(productsAssoc)}; max-age=31556926; path=/`;
}
export{
    showProductsQuantity, 
    getProductsAssoc, 
    initializeProductsHTML, 
    changeProductQuantity, 
    deleteProduct,
    addProductInQuantity
};