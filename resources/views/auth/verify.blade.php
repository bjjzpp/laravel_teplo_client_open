@extends('layouts.lkts')

@section('content')
<div class="container">
<a href="{{ route('index') }}">Назад</a><br><br>
    <div class="justify-content-center">
        <div class="col-md-8">
            <div>
                <div><h3>{{ __('Подтверждение адреса Электронной почты') }}</h3></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <b>{{ __('Подтверждения учетной записи на сайте ') }} {{ env('APP_NAME') }}.</b>
                        </div>
                    @endif

                    {{ __('На вашу почту пришла ссылка для подтверждения, вашего адреса электронной почты.<br /> Перейдите по ссылки для активации вашей учетной записи.') }}
                    {{ __('Если вы не получили письмо') }}, <a href="{{ route('verification.resend') }}"><b>{{ __('нажмите здесь, чтобы запросить другой запрос') }}</b></a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
