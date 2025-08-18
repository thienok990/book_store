$(document).ready(function () {
    $("input[type='number']").on("change", function () {
        const val = $(this).val(); // Số lượng
        const id = $(this).attr("id").replace("quantity-", ""); // Lấy id mà không cần phần "quantity-" trước đó
        
        const price = parseInt(
            $("#price" + id)
                .text()
                .replace(/[^\d]/g, "") // Loại bỏ ký tự không phải số
        );

        // Cập nhật lại giá trị total-price sau khi thay đổi số lượng
        $("#total-price" + id).text(
            (price * val).toLocaleString("vi-VN") + "đ"
        );

        // Gửi yêu cầu AJAX để cập nhật số lượng trên server
        $.ajax({
            url: "http://localhost:8000/cart/" + id,
            method: "PUT",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
            },
            data: {
                quantity: val,
                id: id,
            },
            success: function (response) {
                console.log("Cập nhật thành công:", response);
            },
            error: function (error) {
                console.error("Có lỗi xảy ra:", error);
            },
        });

        // Sau khi thay đổi số lượng, tính lại tổng giỏ hàng
        updateCartTotal();
    });

    // Tính tổng tiền khi checkbox thay đổi
    $("input[type='checkbox']").on("change", function () {
        // Cập nhật lại tổng giỏ hàng mỗi khi checkbox thay đổi
        updateCartTotal();

        // Kiểm tra nếu có ít nhất một checkbox được chọn, thì bật nút
        if ($("input[type='checkbox']:checked").length > 0) {
            $("#btn").removeAttr("disabled");
        } else {
            $("#btn").attr("disabled", true);
        }
    });

    // Hàm tính tổng giỏ hàng
    function updateCartTotal() {
        let totalPrice = 0; // Biến để lưu tổng số tiền

        // Duyệt qua tất cả các checkbox được chọn
        $("input[type='checkbox']:checked").each(function () {
            const id = $(this).val();
            const price = parseInt(
                $("#total-price" + id)
                    .text()
                    .replace(/[^\d]/g, "") // Loại bỏ ký tự không phải số
            );
            totalPrice += price; // Cộng dồn giá trị của từng mục đã chọn
        });

        // Cập nhật tổng tiền
        $("#cart-total").text(totalPrice.toLocaleString("vi-VN") + "đ");
    }
    $(".btnDelete").on("click", function () {
        const id = $(this).data("id");
        const $row = $(this).closest(".cart-item"); // Lấy dòng sản phẩm
        let totalQuantity = parseInt($(".total-quantity").text(), 10);
        $.ajax({
            url: "/cart/" + id,
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
            },
            success: function (response) {
                $row.remove(); // Xóa khỏi DOM
                totalQuantity -= 1; // Giảm số lượng giỏ hàng
                $(".total-quantity").text(totalQuantity); // Cập nhật số lượng giỏ hàng
            },
            error: function (xhr) {
                console.log("Error:", xhr.responseText);
            },
        });
    });
});
