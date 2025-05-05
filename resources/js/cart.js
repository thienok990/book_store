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
            url: "http://127.0.0.1:8000/cart/" + id,
            method: "PUT",
            data: {
                quantity: val,
                id: id,
                _token: $("meta[name='csrf-token']").attr("content"),
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
        const id = $(this).data("id"); // Lấy ID từ nút delete
        console.log(id); // Kiểm tra ID

        $.ajax({
            url: "http://127.0.0.1:8000/cart/" + id, // Địa chỉ URL xóa
            method: "DELETE", // Phương thức DELETE
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"), // Gửi CSRF token
            },
            success: function (response) {
                console.log("Deleted successfully:", response); // Thành công
                location.reload(); // Reload lại trang
            },
            error: function (xhr) {
                console.log("Error:", xhr.responseText); // Lỗi
            },
        });
    });
});
