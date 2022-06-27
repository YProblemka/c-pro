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
    $(".change-input-blog-date").hide();

    $(".change-btn").show();

    $(".change-btn").click(function () {
        $(this).hide();
        $(this).siblings(".save-btn").show();
        $(this).siblings(".delete-btn").show();

        $(this).siblings(".app-doc-meta").find(".change-input-value").show();

        $(this).parent().siblings(".admin-ourWorks-img").hide();
        $(this).parent().siblings(".admin-blog-images-img").hide();
        $(this).parent().siblings(".admin-services-img").hide();
        $(this).siblings("h4").hide();
        $(this).siblings(".app-doc-meta").find(".services-dcp-text").hide();

        $(this).siblings(".add-img-btn").show();
        $(this).siblings(".change-input").show();
        $(this).siblings(".app-doc-meta").find(".services-dcp").show();

        $(this).parent().find(".change-input-blog-date").show();
        $(this).parent().find(".admin-blog-details-img").hide();
        $(this).parent().find(".blog-date-text").hide();

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

    // update blog
    $(".save-btn-blog").click(function () {
        const title_input = $(this).siblings(".change-input")[0];
        const title = $(this).siblings("h4")[0];
        const date_input = $(this)
            .siblings(".app-doc-meta")
            .find(".change-input-blog-date")[0];
        const date = $(this)
            .siblings(".app-doc-meta")
            .find(".admin-blog-date")[0];
        const save_btn = $(this)[0];
        const change_photo_btn = $(this).siblings("a.btn")[0];

        const id = $(this)[0].id;

        var fd = new FormData();

        fd.append("title", title_input.value);
        fd.append("date", date_input.value);
        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/post/" + id,
                success: function (data) {
                    title.innerText = data.response.title;
                    date.innerText = data.response.date;
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
            // add blog
            fd.append("_method", "POST");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/post",
                success: function (data) {
                    title.innerText = data.response.title;
                    date.innerText = data.response.date;
                    save_btn.id = data.response.id;
                    change_photo_btn.href = data.response.change_photo_url;
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
            // add blog
        }
        $(title_input).hide();
        $(date_input).hide();

        $(title).show();
        $(this).parent().find(".blog-date-text").show();
        // $(date).show();

        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(".change-btn").show();
    });
    // update blog

    // update blog-img
    $(".save-btn-blog-images").click(function () {
        const img_input = $(this).siblings(".add-img-btn")[0];
        const img = $(this).parent().siblings(".admin-blog-images-img")[0];
        const post_id = location.href.split("blog-images/")[1];
        const save_btn = $(this)[0];

        const id = $(this)[0].id;

        var fd = new FormData();

        fd.append("post_id", post_id);
        fd.append("photo", img_input.files[0]);
        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/post_img/" + id,
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
        } else {
            // add blog-img
            fd.append("_method", "POST");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/post_img",
                success: function (data) {
                    img.src = data.response.img_url;
                    save_btn.href = data.response.id;
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
            // add blog-img
        }
        $(img_input).hide();
        $(img).show();

        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(".change-btn").show();
    });
    // update blog-img

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

    // add blog
    $(".add-btn-blog").click(function () {
        $(".all-cards").prepend(
            `<div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3">
                    <h4 class="app-doc-title truncate mb-0" title=""></h4>
                    <input type="text" name="name" class="change-input" placeholder="Название услуги"
                        value="">
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li class="blog-date-text">
                                <span class="text-muted">Дата:</span>
                                <span class="admin-blog-date"></span>
                            </li>
                            <input type="text" class="change-input-blog-date" placeholder="Дата"
                                value="">
                        </ul>
                    </div>
                    <button class="change-btn change-btn-blog btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-blog btn btn-primary" id="">Сохранить</button>
                    <a class="btn btn-primary" href="">Изменить
                        фото</a>
                    <button class="delete-btn btn btn-primary" path="post"><i class="far fa-trash-alt"
                            style="color: white;"></i></button>
                </div>
            </div>
        </div>`
        );
        update();
    });
    // add blog

    // add blog-image
    $(".add-btn-blog-images").click(function () {
        $(".all-cards").prepend(
            `<div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <img src="" class="admin-blog-images-img">
                <div class="app-card-body p-3">
                    <input type="file" class="add-img-btn">
                    <button class="change-btn change-btn-blog-images btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-blog-images btn btn-primary" id="">Сохранить</button>
                    <button class="delete-btn btn btn-primary" path=""><i class="far fa-trash-alt"
                            style="color: white;"></i></button>
                </div>
            </div>
        </div>`
        );
        update();
    });
    // add blog-image
});
