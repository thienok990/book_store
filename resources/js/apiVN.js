$(document).ready(function () {
    // 1. Load danh sách tỉnh
    $.ajax({
        url: "https://provinces.open-api.vn/api/p/",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $.each(data, function (index, province) {
                $("#province").append(
                    `<option value="${province.code}">${province.name}</option>`
                );
            });
        },
        error: function () {
            console.log("Không thể lấy danh sách tỉnh");
        }
    });

    // 2. Khi chọn tỉnh, load danh sách quận/huyện
    $("#province").on("change", function () {
        let provinceCode = $(this).val();
        $("#district").html('<option value="">Chọn quận/huyện</option>');
        $("#ward").html('<option value="">Chọn xã/phường</option>');

        if (provinceCode) {
            $.ajax({
                url: `https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    $.each(data.districts, function (index, district) {
                        $("#district").append(
                            `<option value="${district.code}">${district.name}</option>`
                        );
                    });
                },
                error: function () {
                    console.log("Không thể lấy danh sách quận/huyện");
                }
            });
        }
    });

    // 3. Khi chọn quận/huyện, load danh sách xã/phường
    $("#district").on("change", function () {
        let districtCode = $(this).val();
        $("#ward").html('<option value="">Chọn xã/phường</option>');

        if (districtCode) {
            $.ajax({
                url: `https://provinces.open-api.vn/api/d/${districtCode}?depth=2`,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    $.each(data.wards, function (index, ward) {
                        $("#ward").append(
                            `<option value="${ward.code}">${ward.name}</option>`
                        );
                    });
                },
                error: function () {
                    console.log("Không thể lấy danh sách xã/phường");
                }
            });
        }
    });
    
});