let unitPrice = 1000;
let quants = document.getElementById("quantity");
let totalPrice = document.getElementById("totalPrice");
quants.addEventListener("input", calculateTotal);

function calculateTotal(){

    let quantity = parseInt(quants.value);

    if(quantity < 0 || isNaN(quantity)){
        quantity = 0;
        quants.value = 0;
    }

    let total = unitPrice * quantity;

    totalPrice.value = total;

    if(total > 1000){
        alert(" Gift Coupon Earned");
    }
}