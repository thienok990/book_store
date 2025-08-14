$(document).ready(function () {
    const $minInput = $('input[name="min_price"]');
    const $maxInput = $('input[name="max_price"]');
    const $form = $("#filterForm");
    let debounceTimer;
    const debounceSubmit = () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            $form.submit();
        }, 500);
    };
    // Khi thay đổi min_price
    $minInput
        .on("input", function () {
            if (parseInt($(this).val()) > parseInt($maxInput.val())) {
                $(this).val($maxInput.val()); // ép bằng max
            }
            $("#minPriceVal").text(Number($(this).val()).toLocaleString());
            debounceSubmit();
        })

    // Khi thay đổi max_price
    $maxInput
        .on("input", function () {
            if (parseInt($(this).val()) < parseInt($minInput.val())) {
                $(this).val($minInput.val()); // ép bằng min
            }
            $("#maxPriceVal").text(Number($(this).val()).toLocaleString());
            debounceSubmit();
        }) // Auto lọc khi thả chuột
    $(".optionSelect, .authorSelect, .categorySelect").on("change", function () {
        $("#filterForm").submit(); // Gửi form ngay khi thay đổi dropdown
    });
});
