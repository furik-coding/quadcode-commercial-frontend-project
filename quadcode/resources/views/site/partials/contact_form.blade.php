<div class="form-message form-success">
    <div class="form-message__icon">
        <img src="/files/icons/green-accept_icon.png" alt="">
    </div>
    <div class="form-message__inner">
        <div class="form-message__title">
            @lang('messages.Your request was successfully sent')!
        </div>
        <div class="form-message__text">
            @lang('messages.Thank you for your interest for Quadcode.<br>Our team will contact you shortly')
        </div>
        <div class="form-message__actions">
            <a href="{{ route('home') }}" class="custom-button js-close-modal">@lang('messages.OK')</a>
        </div>
    </div>
</div>


<div class="form-message form-error">
    <div class="form-message__icon">    
        <img src="/files/icons/red-cross_icon.png" alt="">
    </div>
    <div class="form-message__inner">
        <div class="form-message__title">
            @lang('messages.Oops...<br>Something went wrong')
        </div>
        <div class="form-message__actions">
            <a href="{{ route('contact', [app()->getLocale()]) }}"
            class="custom-button js-close-modal">@lang('messages.Try again')</a>
        </div>
    </div>
</div>


<form action="{{ route('contact.store') }}" method="post" class="form js-form-validate">
    @csrf
    <div class="form__title">@lang('messages.Enhance your business with industy proven software')</div>

    <div class="custom-input is-required">
        <label for="first_name" class="form-label">@lang('messages.First name')</label>
        <input type="text" name="first_name" id="first_name" placeholder="@lang('messages.First name')"
                value="{{ old('first_name') }}">
        <div class="form-error">
            <div class="form-error__inner">@error('first_name'){{ $message }}@enderror</div>
        </div>
    </div>
    <div class="custom-input is-required">
        <label for="last_name" class="form-label">@lang('messages.Last name')</label>
        <input type="text" name="last_name" id="last_name" placeholder="@lang('messages.Last name')"
                value="{{ old('last_name') }}">
        <div class="form-error">
            <div class="form-error__inner">@error('last_name'){{ $message }}@enderror</div>
        </div>
    </div>
    <div class="custom-input custom-phone is-required">
        <label for="phone" class="form-label">@lang('messages.Phone')</label>
        <input type="text" name="phone" id="phone" placeholder="@lang('messages.Phone')" value="{{ old('phone') }}">
        <div class="form-error">
            <div class="form-error__inner">@error('phone'){{ $message }}@enderror</div>
        </div>
    </div>
    <div class="custom-input is-required">
        <label for="email" class="form-label">@lang('messages.Email')</label>
        <input type="email" name="email" id="email" placeholder="name@email.com" value="{{ old('email') }}">
        <div class="form-error">
            <div class="form-error__inner">@error('email'){{ $message }}@enderror</div>
        </div>
    </div>

    <div class="custom-textarea">
        <label for="message" class="form-label">@lang('messages.Message')</label>
        <textarea name="message" id="message">{{ old('message') }}</textarea>
        <div class="form-error">
            <div class="form-error__inner">@error('message'){{ $message }}@enderror</div>
        </div>
    </div>

    <div class="custom-checkbox">
        <input id="sign" type="checkbox" name="terms_agree">
        <label for="sign" class="custom-checkbox__label-box"></label>
        <label for="sign" class="custom-checkbox__label">
            <span>@lang('messages.I read and agree with') <a href="#" class="link text-underline">@lang('messages.terms and conditions#paternal')</a> @lang('messages.and') <a href="#" class="link text-underline">@lang('messages.privacy policy#paternal')</a> @lang('messages.of this website')</span>
        </label>
        <div class="form-error">
            <div class="form-error__inner">@error('terms_agree'){{ $message }}@enderror</div>
        </div>
    </div>

    <input class="custom-button is-full-width js-submit" type="submit" name="submit" value="@lang('messages.Make a request')">
</form>

<script>
    $(function () {
        function showError(name, error) {
            var $input = $("[name="+ name + "]");
            $input.addClass('is-invalid');
            var $group = $input.closest('.custom-input, .custom-textarea, .custom-checkbox');
            $group.addClass('has-error');
            $group.find('.form-error__inner').text(error);
            $group.find('.form-error').show();
        }

        var $form = $('.js-form-validate');

        $form.show();
        $('.form-message').hide();

        $form.on('submit', function (event) {
            event.preventDefault();
            var $self = $(this);

            $.ajax({
                url: '{{ route("contact.store") }}',
                method: "POST",
                data: $self.serialize(),
                dataType: "json",
                beforeSend: function () {
                    $self.find('.js-submit').attr('disabled', 'disabled');
                },
                success: function (data) {
                    $self.find('.js-submit').attr('disabled', false);
                    if (data.success) {
                        $form.hide();
                        $('.form-success').show();
                    } else {
                        $form.hide();
                        $('.form-error').show();
                    }
                },
                error: function (res) {
                    $self.find('.js-submit').attr('disabled', false);
                    if (res.status === 422) {
                        var data = res.responseJSON.errors;

                        for (let i in data) {
                            showError(i, data[i][0]);
                        }
                    } else {
                        $form.hide();
                        $('.form-error').show();
                    }
                }
            });

        });
    });
</script>
