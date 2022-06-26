$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function update() {
    $(".save-btn").hide();
    $(".delete-btn").hide();
    $(".change-input-value").hide();
    $(".change-input").hide();
    $(".services-dcp").hide();
    $(".add-img-btn").hide();

    $(".change-btn").show();

    $(".change-btn").click(function () {
        $(this).hide();
        $(this).siblings(".save-btn").show();
        $(this).siblings(".delete-btn").show();

        $(this).siblings(".app-doc-meta").find(".change-input-value").show();

        $(this).parent().siblings(".admin-ourWorks-img").hide();
        $(this).parent().siblings(".admin-services-img").hide();
        $(this).siblings("h4").hide();
        $(this).siblings(".app-doc-meta").find(".services-dcp-text").hide();

        $(this).siblings(".add-img-btn").show();
        $(this).siblings(".change-input").show();
        $(this).siblings(".app-doc-meta").find(".services-dcp").show();

        return false;
    });

    // update settings
    $(".save-btn-settings").click(function () {
        const name = $(this).attr("data-name");
        const input = $(this)
            .siblings(".app-doc-meta")
            .find(".change-input-value")[0];
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
                    alert(
                        "Неверные данные или размер файла превышает максимально допустимый"
                    );
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

    // update services
    $(".save-btn-services").click(function () {
        const img_input = $(this).siblings(".add-img-btn")[0];
        const img = $(this).parent().siblings(".admin-services-img")[0];
        const title_input = $(this).siblings(".change-input")[0];
        const title = $(this).siblings("h4")[0];
        const dcp = $(this)
            .siblings(".app-doc-meta")
            .find(".admin-services-dcp")[0];
        const dcp_input = $(this)
            .siblings(".app-doc-meta")
            .find(".services-dcp")[0];
        const id = $(this)[0].id;

        var fd = new FormData();

        fd.append("name", title_input.value);
        fd.append("text", dcp_input.value);
        if (img_input.files[0] != undefined) {
            fd.append("photo", img_input.files[0]);
        }
        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/service/" + id,
                success: function (data) {
                    title.innerText = data.response.name;
                    img.src = data.response.img_url;
                    dcp.innerText = data.response.text;
                },
                error: function (data) {
                    if (data.status == 422) {
                        alert(
                            "Неверные данные или размер файла превышает максимально допустимый"
                        );
                    } else if (data.status == 404) {
                        alert("Не найдено");
                    } else if (data.status == 500) {
                        alert("Написать разработчикам");
                    }
                },
            });
        } else {
            // add service
            fd.append("_method", "POST");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/service",
                success: function (data) {
                    title.innerText = data.response.name;
                    img.src = data.response.img_url;
                    dcp.innerText = data.response.text;
                },
                error: function (data) {
                    if (data.status == 422) {
                        alert(
                            "Неверные данные или размер файла превышает максимально допустимый"
                        );
                    } else if (data.status == 404) {
                        alert("Не найдено");
                    } else if (data.status == 500) {
                        alert("Написать разработчикам");
                    }
                },
            });
            // add service
        }
        $(img_input).hide();
        $(title_input).hide();
        $(dcp_input).hide();

        $(img).show();
        $(title).show();
        $(dcp).show();
        $(this).siblings(".app-doc-meta").find(".services-dcp-text").show();

        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(".change-btn").show();
    });
    // update services

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
    $(".delete-btn").click(function () {
        var closet = $(this).closest(".col-6");
        $.ajax({
            type: "POST",
            data: { _method: "DELETE" },
            url:
                "/action/" +
                $(this)[0].attributes.getNamedItem("path").value +
                "/" +
                $(this).siblings(".save-btn")[0].id,
            success: function (data) {
                closet.remove();
            },
            error: function (data) {
                if (data.status == 404) {
                    alert("Ошибка");
                } else if (data.status == 500) {
                    alert("Написать разработчикам");
                }
            },
        });
    });
    // delete someone
}

$(document).ready(function () {
    update();

    // add service
    $(".add-btn-services").click(function () {
        $(".all-cards").prepend(
            `<div class="col-6 col-md-4 col-xl-3 col-xxl-4">
            <div class="app-card app-card-doc shadow-sm h-100">
                <img src="" class="admin-services-img">
                <div class="app-card-body p-3">
                    <input type="file" class="add-img-btn">
                    <h4 class="app-doc-title truncate mb-0" title=""></h4>
                    <input type="text" name="name" class="change-input" placeholder="Название услуги"
                        value="">
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li class="services-dcp-text">
                                <span class="text-muted">Описание:</span>
                                <span class="admin-services-dcp"></span>
                            </li>
                            <textarea name="services-dcp" class="services-dcp product-dcp" placeholder="Описание"></textarea>
                        </ul>
                    </div>
                    <button class="change-btn change-btn-services btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-services btn btn-primary"
                        id="">Сохранить</button>
                    <button class="delete-btn btn btn-primary" path="service"><i class="far fa-trash-alt"
                            style="color: white;"></i></button>
                </div>
            </div>
        </div>`
        );
        update();
    });
    // add service
});
