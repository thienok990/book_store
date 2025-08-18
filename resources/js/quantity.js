document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener("input", () => {
            if (parseInt(input.value) > parseInt(input.max)) {
                input.value = input.max;
            }
            if (parseInt(input.value) < parseInt(input.min)) {
                input.value = input.min;
            }
        });
    });
});
