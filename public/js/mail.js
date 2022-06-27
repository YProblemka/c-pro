const form = document.getElementById("footer_form");

form.addEventListener("submit", function (event) {
    event.preventDefault();
    let fd = new FormData(footer_form);

    $.ajax({
        type: "POST",
        cache: false,
        processData: false,
        contentType: false,
        data: fd,
        url: "/email",
        success: function (data) {
            alert("Успешно! Скоро мы с вами свяжемся");
        },
        error: function (data) {
            alert("Что-то пошло не так, попробуйте снова через минуту");
        },
    });
});
