// $.ajaxSetup({
//     headers: {
//         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     },
// });
function update() {
    $(".save-btn").hide();
    $(".delete-btn").hide();
    $(".change-input-value").hide();

    $(".change-input").hide();
    $(".change-input-price").hide();
    $(".change-input-ename").hide();
    $(".change-list-department").hide();
    $(".change-list-category").hide();
    $(".change-list-maker").hide();
    $(".add-img-btn").hide();
    $(".product-dcp").hide();
    $(".change-btn").show();
    $(".change-btn").click(function () {
        $(this).hide();
        $(this).parent().siblings(".admin-product-img").hide();
        $(this).siblings(".delete-btn").show();

        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-value")
            .show();

        $(this).siblings(".change-input").show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-department")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-category")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-maker")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-ename")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-price")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".product-dcp")
            .show();
        $(this).siblings(".save-btn").show();
        $(this).siblings(".add-img-btn").show();

        return false;
    });

    // update settings
    $(".save-btn-settings").click(function () {
        const name = $(this).attr("data-name");
        const input = $(this).siblings(".app-doc-meta").find(".change-input-value")[0];

        var fd = new FormData();

        fd.append("name", name);
        fd.append("value", input.value);
        fd.append("_method", "PUT");
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/setting/" + name,
            success: function (data) {
                // value.innerHTML = data.response.name;
                alert(data.response);
            },
            error: function (data) {
                if (data.status == 422) {
                    alert("Неверные данные");
                } else if (data.status == 404) {
                    alert("Не найдено");
                } else if (data.status == 500) {
                    alert("Написать разработчикам");
                }
            },
        });
        $(this).hide();
        $(input).hide();
        $(this).siblings(".change-btn").show();
    });
    // update settings

    // example
    // $(".save-btn-settings").click(function () {
    //     var fd = new FormData();
    //     fd.append("name", $(this).siblings(".change-input")[0].value);
    //     maker_name = $(this).siblings("h4").children()[0];
    //     btn = $(this)[0];
    //     if ($(this)[0].id !== "") {
    //         fd.append("_method", "PUT");
    //         $.ajax({
    //             type: "POST",
    //             cache: false,
    //             processData: false,
    //             contentType: false,
    //             data: fd,
    //             url: "/action/maker/" + $(this)[0].id,
    //             success: function (data) {
    //                 maker_name.innerHTML = data.response.name;
    //             },
    //             error: function (data) {
    //                 if (data.status == 422) {
    //                     alert("Неверные данные");
    //                 } else if (data.status == 404) {
    //                     alert("Производитель не найден");
    //                 } else if (data.status == 500) {
    //                     alert("Написать разработчикам");
    //                 }
    //             },
    //         });
    //     } else {
    //         // add maker
    //         fd.append("_method", "POST");
    //         $.ajax({
    //             type: "POST",
    //             cache: false,
    //             processData: false,
    //             contentType: false,
    //             data: fd,
    //             url: "/action/maker",
    //             success: function (data) {
    //                 maker_name.innerHTML = data.response.name;
    //                 btn.id = data.response.id;
    //             },
    //             error: function (data) {
    //                 if (data.status == 422) {
    //                     alert("Неверные данные");
    //                 } else if (data.status == 500) {
    //                     alert("Написать разработчикам");
    //                 }
    //             },
    //         });
    //         // add maker
    //     }
    //     $(this).hide();
    //     $(this).siblings(".delete-btn").hide();
    //     $(this).siblings(".change-input").hide();
    //     $(this).siblings(".change-btn").show();
    // });
    // example

    // delete someone
    // $(".delete-btn").click(function () {
    //     var closet = $(this).closest(".col-6");
    //     $.ajax({
    //         type: "POST",
    //         data: { _method: "DELETE" },
    //         url:
    //             "/action/" +
    //             $(this)[0].attributes.getNamedItem("path").value +
    //             "/" +
    //             $(this).siblings(".save-btn")[0].id,
    //         success: function (data) {
    //             closet.remove();
    //         },
    //         error: function (data) {
    //             if (data.status == 404) {
    //                 alert("Ошибка");
    //             } else if (data.status == 500) {
    //                 alert("Написать разработчикам");
    //             }
    //         },
    //     });
    // });
    // delete someone
}

$(document).ready(function () {
    update();

    // add something
    // $(".add-btn-AAA").click(function () {
    //     $(".all-cards").prepend(
    //         ``
    //     );
    //     update();
    // });
    // add something
});
