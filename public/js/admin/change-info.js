$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function update() {
    $(".save-btn").hide();
    $(".delete-btn").hide();
    $(".change-input-value").hide();
    $(".add-img-btn").hide();

    $(".change-btn").show();

    $(".change-btn").click(function () {
        $(this).hide();
        $(this).siblings(".save-btn").show();
        $(this).siblings(".delete-btn").show();

        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-value")
            .show();

        $(this).parent().siblings(".admin-ourWorks-img").hide();
        $(this).siblings(".add-img-btn").show();

        return false;
    });

    // update settings
    $(".save-btn-settings").click(function () {
        const name = $(this).attr("data-name");
        const input = $(this).siblings(".app-doc-meta").find(".change-input-value")[0];
        const value = $(input).siblings().find(".value")[0];


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
                value.innerText = data.response.value;
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

    // update ourWorks
    $(".save-btn-ourWorks").click(function () {
        const input = $(this).siblings(".add-img-btn")[0];
        const img = $(this).parent().siblings(".admin-ourWorks-img")[0];
        const id = $(this)[0].id;

        var fd = new FormData();

        fd.append("photo", input.files[0]);
        fd.append("_method", "PUT");
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/our_work/" + id,
            success: function (data) {
                img.src = data.response.img_url;
            },
            error: function (data) {
                if (data.status == 422) {
                    alert("Неверные данные или размер файла превышает максимально допустимый");
                } else if (data.status == 404) {
                    alert("Не найдено");
                } else if (data.status == 500) {
                    alert("Написать разработчикам");
                }
            },
        });

        $(input).hide();
        $(img).show();

        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(".change-btn").show();
    });
    // update ourWorks

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
