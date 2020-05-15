@extends('layouts.lkts')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container">
  <a href="{{ route('index') }}">Назад</a><br><br>
    <div class="justify-content-center">
        <div class="col-md-8">
            <div>
                <div><h3>{{ __('Сбросить пароль') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Код проверки') }}</label>

                            <div class="col-md-6">
                                <div class="g-recaptcha" data-sitekey="6Lc5VjQUAAAAAG5soNXQyJZpl4l8vvpZF4IzP-PQ"></div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Отправить ссылку для сброса пароля') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
