document.addEventListener("DOMContentLoaded", function() {
    let quantityInput = document.getElementById("quantity");
    let increaseBtn = document.getElementById("increaseQty");
    let decreaseBtn = document.getElementById("decreaseQty");

    increaseBtn.addEventListener("click", function() {
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    decreaseBtn.addEventListener("click", function() {
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});
