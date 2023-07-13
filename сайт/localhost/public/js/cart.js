function increaseQuantity(button) {
    var quantityInput = button.parentNode.querySelector(".tovar-quantity");
    var currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
    updateTotal();
}

function decreaseQuantity(button) {
    var quantityInput = button.parentNode.querySelector(".tovar-quantity");
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
        updateTotal();
    }
}

function updateTotal() {
    var tovarSums = document.querySelectorAll(".tovar-sum");
    var total = 0;

    tovarSums.forEach(function (tovarSum) {
        var price = parseInt(tovarSum.previousElementSibling.textContent);
        var quantity = parseInt(
            tovarSum.parentNode.querySelector(".tovar-quantity").value
        );
        var sum = price * quantity;
        tovarSum.textContent = sum + " руб.";
        total += sum;
    });

    document.getElementById("total").textContent = total + " руб.";
}
