document.addEventListener(
    "DOMContentLoaded",
    function () {
        const minusButton = document.querySelector(".minus-btn");
        const plusButton = document.querySelector(".plus-btn");
        const quantityInput = document.querySelector("#quantity-input");

        // добавляем обработчики событий для кнопок
        minusButton.addEventListener("click", decrementQuantity);
        plusButton.addEventListener("click", incrementQuantity);

        function incrementQuantity() {
            // получаем текущее значение поля количества
            let currentQuantity = parseInt(quantityInput.value);

            // увеличиваем значение на 1, если оно меньше максимального количества товара
            if (currentQuantity < tovar) {
                quantityInput.value = currentQuantity + 1;
            }
        }

        function decrementQuantity() {
            // получаем текущее значение поля количества
            let currentQuantity = parseInt(quantityInput.value);

            // уменьшаем значение на 1, если оно больше 1
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }
    },
    false
);
