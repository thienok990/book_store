$(document).ready(function () {
    $(".btnAdd").on("click", function () {
        const id = $(this).data("id"); // Lấy ID từ nút Add
        let totalQuantity = parseInt($(".total-quantity").text(), 10);
        let quantity = $("input[name='quantity']").val();
        if (!quantity || isNaN(quantity) || quantity <= 0) {
            quantity = 1;
        }
        $.ajax({
            url: "http://localhost:8000/cart/add/" + id, // Địa chỉ URL add
            method: "POST", // Phương thức Add
            data: { quantity: quantity },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"), // Gửi CSRF token
            },
            success: function (response) {
                if (response.status === "error") {
                    showAlert("Bạn phải đăng nhập", "error"); // Hiển thị thông báo lỗi
                    return;
                } else {
                    $(".total-quantity").text(totalQuantity + 1);
                    showAlert("Thêm vào giỏ hàng thành công!");
                    $("input[name='quantity']").val(1);
                }
            },
        });
    });
});
