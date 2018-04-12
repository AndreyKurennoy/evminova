<div class="row full-width page-margin-top-section padding-bottom-66">
    <div class="row">
        <h2 class="box-header padding-bottom-61">Заказать профилактор</h2>
        <form class="contact-form" id="question-form">
            <div class="row">
                <fieldset class="column column-1-2">
                    <input class="text-input" name="name" type="text" placeholder="Имя ">
                    <input class="text-input" name="phone" type="text" placeholder="Номер телефона " maxlength="15">
                    <input class="text-input" name="email" type="text" placeholder="Email*">
                </fieldset>
                <fieldset class="column column-1-2">
                    <textarea name="message" placeholder="Адрес доставки"></textarea>
                </fieldset>
            </div>
            <div class="row margin-top-30">
                <div class="column column-1-2 align-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="button" id="zakaz" name="submit_zakaz" value="ЗАДАТЬ ВОПРОС" class="more active">
                </div>
            </div>
        </form>
    </div>
</div>