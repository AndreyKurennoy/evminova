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
                    $('#review-form').hide();
                    $('<div class="review-success">Ваш отзыв успешно отправлен на модерацию!</div>').insertBefore($('#review-form'));
                }
            },
            error: function (data2) {
                $('.alert').remove();
                var errors = data2.responseJSON.errors;
                console.log(errors);
                // $(errors).each(e)
            //    прозодимся циклом по всем ошибкам и перед формой выводим их в бутрстаптном варике
                if(errors.email){
                    $('input[name=email]').focus();
                    $('<div class="alert alert-danger">'+ errors.email +'</div>').insertBefore($('input[name=email]'));
                }
                if(errors.name){
                    $('input[name=name]').focus();
                    $('<div style="margin-top: 0;" class="alert alert-danger">'+ errors.name +'</div>').insertBefore($('input[name=name]'));
                }
                if(errors.problem){
                    $('input[name=problem]').focus();
                    $('<div class="alert alert-danger">'+ errors.problem +'</div>').insertBefore($('input[name=problem]'));
                }
                if(errors.body){
                    $('textarea[name=body]').focus();
                    $('<div class="alert alert-danger" style="margin-bottom: 16px; margin-top: 0!important;">'+ errors.body +'</div>').insertBefore($('textarea[name=body]'));
                }
            }
        });
    });

});
