<div class="form-message form-success">
    <div class="form-message__icon">
        <img src="/files/icons/green-accept_icon.png" alt="">
    </div>
    <div class="form-message__title">
        <div>@lang('messages.Awesome')!</div>
        <div>@lang('messages.Your application was successfully sent')</div>
    </div>
    <div class="form-message__text">
        @lang('messages.Thank you for your interest for Quadcode.<br>Our team will contact you shortly')
    </div>
    <div class="form-message__actions">
        <a href="{{ route('home') }}" class="custom-button js-close-modal">@lang('messages.OK')</a>
    </div>
</div>


<div class="form-message form-error">
    <div class="form-message__icon">
        <img src="/files/icons/red-cross_icon.png" alt="">
    </div>
    <div class="form-message__title">
        @lang('messages.Oops...<br>Something went wrong')
    </div>
    <div class="form-message__text">
        @lang('messages.Submitting the form failed for some reason. Try again or tell us about yourseld by sending an email directly to')
        <br>
        <a class="link" href="mailto:hr@quadcode.com">hr@quadcode.com</a>
    </div>

    <div class="form-message__actions">
        <a href="{{ route('application', [app()->getLocale()]) }}"
           class="custom-button js-close-modal">@lang('messages.Try again')</a>
    </div>
</div>


<form action="{{ route('application.store') }}" method="post" enctype="multipart/form-data" class="form js-form-validate" novalidate>
    @csrf
    <input type="hidden" name="vacancy_id" value="{{ $vacancy ?? '' }}">
    <div class="form__title">@lang('messages.Submit your application')</div>

    <div class="custom-input is-required js-input-wrap">
        <input type="text" name="first_name" id="first_name" placeholder="@lang('messages.First name')"
               value="{{ old('first_name') }}">
        <div class="form-error">@error('first_name'){{ $message }}@enderror</div>
        <div class="form-placeholder">
            @lang('messages.First name') <span>*</span>
        </div>
    </div>
    <div class="custom-input is-required js-input-wrap">
        <input type="text" name="last_name" id="last_name" placeholder="@lang('messages.Last name')"
               value="{{ old('last_name') }}">
        <div class="form-error">@error('last_name'){{ $message }}@enderror</div>
        <div class="form-placeholder">
            @lang('messages.Last name') <span>*</span>
        </div>
    </div>
    <div class="custom-input is-required js-input-wrap">
        <input type="email" name="email" id="email" placeholder="@lang('messages.Email')" value="{{ old('email') }}">
        <div class="form-error">@error('email'){{ $message }}@enderror</div>
        <div class="form-placeholder">
            @lang('messages.Email') <span>*</span>
        </div>
    </div>
    <div class="custom-input custom-phone is-required js-input-wrap">
        <input type="text" name="phone" id="phone" placeholder="@lang('messages.Phone')" value="{{ old('phone') }}">
        <div class="form-error">@error('phone'){{ $message }}@enderror</div>
        <div class="form-placeholder">
            @lang('messages.Phone') <span>*</span>
        </div>
    </div>

    <div class="custom-textarea js-input-wrap">
        <textarea name="message" id="message" placeholder="@lang('messages.Message')">{{ old('message') }}</textarea>
        <div class="form-error">@error('message'){{ $message }}@enderror</div>
    </div>

    <div class="custom-upload js-input-wrap">
        <div class="custom-upload__inner js-file">
            <div class="custom-upload__file js-file-item">
                <div class="custom-upload__remove js-file-remove"><svg width="10px" height="10px" viewbox="0 0 18 18" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.888889 1L15.1111 15" transform="translate(1 1)" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="2" stroke-linecap="square" />
                        <path d="M0.888889 1L15.1111 15" transform="matrix(-1 0 0 1 17 1)" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="2" stroke-linecap="square" />
                    </svg></div>
            </div>
            <label class="custom-upload__label js-upload-file" for="cv">@lang('messages.Upload your CV')</label>
            <input class="custom-upload__input" name="cv" id="cv" type="file">
        </div>
        <div class="form-error">@error('cv'){{ $message }}@enderror</div>
    </div>

    <div class="custom-checkbox js-input-wrap">
        <input id="sign" type="checkbox" name="terms_agree">
        <label for="sign" class="custom-checkbox__label-box"></label>
        <label for="sign" class="custom-checkbox__label">
            @lang('messages.By using this form you agree with the storage and processing of your data by this website in accordance with our')
            <a href="#">@lang('messages.Privacy Policy#paternal')</a>
        </label>
        <div class="form-error">@error('terms_agree'){{ $message }}@enderror</div>
    </div>

    <input class="custom-button is-full-width js-submit" type="submit" name="submit" value="@lang('messages.Submit')">

</form>

<script>
    $(function () {
        function showError(name, error) {
            var $input = $("[name="+ name + "]");
            $input.addClass('is-invalid');
            var $group = $input.closest('.js-input-wrap');
            $group.addClass('has-error');
            $group.find('.form-error').text(error).show();
        }

        var $form = $('.js-form-validate');

        $form.on('submit', function (event) {
            event.preventDefault();
            var $self = $(this);

            var data = new FormData($self.get(0));

            $.ajax({
                url: '{{ route("application.store") }}',
                method: "POST",
                enctype: 'multipart/form-data',
                processData: false,
                data: data,
                contentType: false,
                cache: false,
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
