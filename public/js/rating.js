$(function () {
    $(document).on("click", "a[data-rating]", function (e) {
        e.preventDefault();
        $("#rating_info").css("display", "none");
        $(".loading").css("display", "block");
        // var item = $(this);
        var value = $(this).attr("value");
        console.log(value);
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            dataType: 'json',
            data: ({
                points: value,
                // sheet_id: id,
                // category_id: entityCategory,
                token: token,
                slug: slug
            }),
            success: function (data2) {
                if (data2.success) {
                    $("#Agr_Rating").html(data2.AggregateRating);
                    $("#Count_Rating").html(data2.RatingCount);
                    $(".loading").css("display", "none");
                    // $(item).focus();
                    $(".rating-title").html("Спасибо, Ваш голос учтен!");
                    $(".text-rating").css("display", "none");
                } else {
                    $(".rating-title").html("Вы уже голосовали");
                    $(".loading").css("display", "none");
                }
            }
        });
    });

    $('#review').click(function(){
        var data = $('#review-form').serialize();
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: reviewUrl,
            dataType: 'json',
            data: data,
            success: function (data2) {
                if (data2.success) {
                //    Скрываем форму и выводим блок об успешной отправке отзыва на модерацию
                }
            },
            error: function (data2) {
                var errors = data2.responseJSON.errors;
                // $(errors).each(e)
            //    прозодимся циклом по всем ошибкам и перед формой выводим их в бутрстаптном варике

            }
        });
    });

});
